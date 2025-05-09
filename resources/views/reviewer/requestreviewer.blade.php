<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body {
          background-color: #f4f6f9;
          font-family: 'Arial', sans-serif;
      }

      .navbar {
          background: linear-gradient(45deg, #007bff, #0056b3);
          padding: 15px;
      }

      .navbar-brand {
          color: white !important;
          font-weight: bold;
          font-size: 22px;
      }

      .navbar-nav .nav-link {
          color: white !important;
          font-size: 16px;
          transition: color 0.3s;
      }

      .nav-link:hover {
          color: #ffd700 !important;
          text-shadow: 0px 0px 5px rgba(255, 215, 0, 0.7);
      }

      .container {
          margin-top: 30px;
          padding: 20px;
          background: white;
          border-radius: 12px;
          box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      }

      .table th {
          background-color: #007bff;
          color: white;
          text-align: center;
          font-size: 16px;
      }

      .table td {
          text-align: center;
          vertical-align: middle;
      }

      .table tbody tr:hover {
          background-color: #f1f1f1;
          cursor: pointer;
      }

      .btn-success, .btn-danger {
          padding: 8px 16px;
          font-size: 14px;
          border-radius: 8px;
          transition: 0.3s;
          margin: 0 5px;
      }

      .btn-success {
          background: linear-gradient(45deg, #28a745, #218838);
          border: none;
      }

      .btn-success:hover {
          background: linear-gradient(45deg, #218838, #1e7e34);
          transform: translateY(-2px);
          box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      }

      .btn-danger {
          background: linear-gradient(45deg, #dc3545, #a71d2a);
          border: none;
      }

      .btn-danger:hover {
          background: linear-gradient(45deg, #a71d2a, #780b1a);
          transform: translateY(-2px);
          box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      }
      textarea.form-control {
    resize: vertical;
    min-height: 60px;
    border-radius: 6px;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: #000;
    font-weight: 600;
}

.btn-warning:hover {
    background-color: #e0a800;
    color: white;
}
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Laravel 11 Blog Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.register') }}">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reviewer.dashboardreviewer') }}">Dashboard</a></li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @if(Auth::check())  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <img src="/images/profile/pic1.jpg" width="20" alt="">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('reviewer.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('reviewer.loginreviewer') }}">Logout</a></li>
            @endif
        </ul>
    </div>
</nav>

<!-- Main content -->
<div class="container">
    <h2>Pending Posts</h2>

    <!-- Query the posts in Blade -->
    @php
        $posts = \App\Models\Post::where('status', 'pending')->with('user')->get();
    @endphp

    @if($posts->isEmpty())
        <p>No posts are pending for review.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>PDF</th>
                    <th>Suggestion</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ Str::limit($post->content, 100) }}</td>
        <td>{{ $post->user->name }}</td>
        <td>
            <a href="{{ route('reviewer.viewpdf', $post->id) }}" class="btn btn-primary" target="_blank">View PDF</a>
        </td>
        <td>
             <!-- Suggestion Form -->
             <form action="{{ route('reviewer.suggest', $post->id) }}" method="POST">
                @csrf
                <textarea name="suggestion" rows="3" class="form-control mb-2" placeholder="Write suggestion...">{{ old('suggestion', $post->suggestion) }}</textarea>
                <button type="submit" class="btn btn-warning btn-sm btn-block">Save Suggestion</button>
            </form>
        </td>
        <td>
            <a href="{{ route('reviewer.approve', $post->id) }}" class="btn btn-success">Approve</a><br><br>
            <a href="{{ route('reviewer.reject', $post->id) }}" class="btn btn-danger">Reject</a><br><br>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>
