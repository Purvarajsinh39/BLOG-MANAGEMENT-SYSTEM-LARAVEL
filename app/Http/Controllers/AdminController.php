<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.loginadmin'); 
    }

    public function check(Request $request)
{
    // Validate input fields
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Find admin user
    $admin = User::where('email', $request->email)->where('is_admin', 1)->first();

    // Debug: Check if admin exists
    if (!$admin) {
        return back()->with('fail', 'Admin email not found');
    }

    // Debug: Check password verification
    if (!Hash::check($request->password, $admin->password)) {
        return back()->with('fail', 'Incorrect password');
    }

    // Store session data for admin login
    session([
        'admin_logged_in' => true,
        'admin_name' => $admin->name,
        'admin_email' => $admin->email
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
}
    

public function dashboard()
{
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.loginadmin')->with('fail', 'Please login first.');
    }

    // Query the posts with the required status and related user
    $posts = Post::with('user')->get(); // Fetch posts


    // Pass the posts to the view
    return view('admin.dashboardadmin', compact('posts'));
}
    public function logout(Request $request) {
        Auth::logout(); // Logout user
        $request->session()->flush(); // Purge session
        return redirect('/admin/loginadmin'); // Redirect to login page
    }
    
    
    public function adminDashboard()
    {
        return view('admin.dashboardadmin');

    }

    public function approvePost($id)
{
    // Find the post by ID
    $post = Post::findOrFail($id);

    // Update the status to 'approved'
    $post->status = 'published';
    $post->save();

    // Redirect back with a success message
    return redirect()->route('admin.dashboard')->with('success', 'Post approved successfully');
    
}



public function rejectPost($id)
{
    // Find the post by ID
    $post = Post::findOrFail($id);

    // Update the status to 'rejected'
    $post->status = 'rejected';
    $post->save();

    // Redirect back with a success message
    return redirect()->route('admin.dashboardadmin')->with('error', 'Post rejected');
}


    public function requestadmin(){
        return view('admin.requestadmin');
    }

}
