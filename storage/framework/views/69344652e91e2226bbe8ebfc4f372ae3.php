<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<head>
    <!-- Add your CSS styles here to style the tiles -->
    <style>
body {
    background-color: #f9fafb;
    font-family: 'Arial', sans-serif;
    
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.navbar {
    background: linear-gradient(45deg, #6a11cb, #2575fc);
}

.navbar-brand {
    color: white !important;
    font-weight: bold;
    font-size: 22px;
}

.navbar-nav .nav-link {
    color: white !important;
    font-size: 18px;
    margin-right: 15px;
    transition: 0.3s;
}

.navbar-nav .nav-link:hover {
    color: #ffd700 !important;
}

.post-tile {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.post-tile:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
}

.post-title {
    font-size: 22px;
    font-weight: bold;
    color: #333;
}

.post-content {
    font-size: 16px;
    color: #555;
}

.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.03);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
}

.card img {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    height: 200px;
    object-fit: cover;
}

.card-body {
    background: #ffffff;
    padding: 20px;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
}

.card-subtitle {
    font-size: 14px;
    color: #666;
}

.card-text {
    font-size: 14px;
    color: #777;
}

h1 {
    color: #333;
    font-size: 28px;
    font-weight: bold;
}

body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }

        .about-section {
            max-width: 1000px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .about-section h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            color: #333;
        }

        .about-section h3 {
            margin-top: 30px;
            color: #2c3e50;
            font-size: 24px;
        }

        .about-section p,
        .about-section ul {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
        }

        .about-section ul {
            padding-left: 20px;
        }

        .about-section ul li {
            margin-bottom: 10px;
        }

        .highlight {
            font-weight: bold;
            color: #2a7ae4;
        }

        @media screen and (max-width: 768px) {
            .about-section {
                padding: 20px 30px;
            }

            .about-section h2 {
                font-size: 28px;
            }

            .about-section h3 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><b>Laravel 11 Blog Site</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left side links -->
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('user.aboutus')); ?>">AboutUs</a>
      </li>
    </ul>

    <!-- Right side link -->
    <!-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/user/login">Login</a>
      </li>
    </ul> -->
  </div>
</nav>
<section class="about-section">
        <h2>About Us</h2>
        <p>
            Welcome to our <span class="highlight">Blog Management System</span>, a full-featured web application developed as part of our college project using the powerful Laravel 11.x framework.
            This system is designed to simplify the process of creating, reviewing, and publishing blog posts in a structured and efficient way.
        </p>

        <h3>🎯 Project Objective</h3>
        <p>
            The main objective of this project is to build a role-based blog system where:
        </p>
        <ul>
            <li><span class="highlight">Users</span> can write and manage their blog posts.</li>
            <li><span class="highlight">Reviewers</span> can approve or reject posts submitted by users.</li>
            <li><span class="highlight">Admins</span> have the final approval authority and manage all posts and users.</li>
        </ul>

        <h3>🛠️ Technologies Used</h3>
        <ul>
            <li><strong>Backend:</strong> Laravel 11.x (PHP Framework)</li>
            <li><strong>Frontend:</strong> Blade Templating Engine, HTML5, CSS3, Bootstrap</li>
            <li><strong>Database:</strong> MySQL</li>
       
        </ul>

        <h3>👨‍💻 About the Developers</h3>
        <p>
            We are students from <span class="highlight">LJKU</span>, currently pursuing our Bachelor of Computer Applications (BCA). This project is part of our curriculum and reflects our understanding of web development, MVC architecture, database integration, and Laravel's core concepts.
        </p>

        <h3>📌 Key Features</h3>
        <ul>
            <li>Role-based access control (User, Reviewer, Admin)</li>
            <li>Multi-stage post approval workflow</li>
            <li>Responsive user interface</li>
            <li>CRUD operations for blog posts</li>
            <li>Secure authentication and authorization</li>
        </ul>

        <p>
            We developed this system to not only fulfill academic requirements but also to showcase our teamwork, coding skills, and dedication to building real-world web applications. Thank you for visiting!
        </p>
    </section>
</body>
</html><?php /**PATH C:\Users\Purvarajsinh\OneDrive\Desktop\COLLEGE WORK\SEM-4\Laravel\Project\Blog-Management\resources\views/user/aboutus.blade.php ENDPATH**/ ?>