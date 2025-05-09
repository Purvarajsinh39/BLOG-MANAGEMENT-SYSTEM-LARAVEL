<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class ReviewerController extends Controller
{
    public function login()
    {
        return view('reviewer.loginreviewer'); 
    }

    public function check(Request $request)
{
    // Validate input fields
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Find reviewer user
    $reviewer = User::where('email', $request->email)->where('is_reviewer', 1)->first();

    // Debug: Check if reviewer exists
    if (!$reviewer) {
        return back()->with('fail', 'Reviewer email not found');
    }

    // Debug: Check password verification
    if (!Hash::check($request->password, $reviewer->password)) {
        return back()->with('fail', 'Incorrect password');
    }

    // Store session data for reviewer login
    session([
        'reviewer_logged_in' => true,
        'reviewer_name' => $reviewer->name,
        'reviewer_email' => $reviewer->email
    ]);

    return redirect()->route('reviewer.dashboardreviewer')->with('success', 'Welcome, Reviewer!');
}
    

public function dashboard()
{
    if (!session('reviewer_logged_in')) {
        return redirect()->route('reviewer.loginreviewer')->with('fail', 'Please login first.');
    }

    $posts = Post::with('user')->get(); // Fetch posts
    return view('reviewer.dashboardreviewer', compact('posts'));
}


public function logout(Request $request)
{
    Auth::logout(); 
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('reviewer.login')->with('success', 'Logout Successful');
}



public function reviewerDashboard()
    {
        // No need to pass $posts to the view anymore
        return view('reviewer.dashboardreviewer');
    }

    public function approvePost($id)
    {
        $post = Post::findOrFail($id);

        // Change post status to reviewer approved
        $post->status = 'reviewer_approved';
        $post->save();

        return redirect()->route('reviewer.dashboardreviewer')->with('success', 'Post has been approved for admin review.');
    }

    // Method to reject a post
    public function rejectPost($id)
    {
        $post = Post::findOrFail($id);

        // Change post status to rejected
        $post->status = 'rejected';
        $post->save();

        return redirect()->route('reviewer.dashboardreviewer')->with('error', 'Post has been rejected.');
    }



    public function requestreviewer(){
        return view('reviewer.requestreviewer');
    }

    public function viewPdf($id)
{
    $post = Post::with('user')->findOrFail($id);
    $pdf = Pdf::loadView('reviewer.post_pdf', compact('post'));
    return $pdf->stream("post-details-{$post->id}.pdf");
}
public function downloadPDF($id)
{
    $post = Post::with('user')->findOrFail($id);

    $pdf = PDF::loadView('pdf.post', compact('post'));
    return $pdf->download('post_'.$post->id.'.pdf');
}

public function saveSuggestion(Request $request, $id)
{
    $request->validate([
        'suggestion' => 'nullable|string|max:1000'
    ]);

    $post = Post::findOrFail($id);
    $post->suggestion = $request->suggestion;
    $post->save();

    return redirect()->back()->with('success', 'Suggestion saved successfully.');
}
}
