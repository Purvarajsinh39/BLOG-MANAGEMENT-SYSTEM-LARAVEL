<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer Login</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Full-page background styling */
        body {
            background: url('https://plus.unsplash.com/premium_photo-1684581214880-2043e5bc8b8b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Glassmorphism effect for form container */
        .container {
            max-width: 400px;
            background: rgba(255, 255, 255, 0.2); /* Glass effect */
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 2;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Title Styling */
        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Label Styling */
        .form-group label {
            font-weight: bold;
            color: #333;
        }

        /* Input Fields */
        .form-control {
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 10px;
            background: rgba(255, 255, 255, 0.5);
            color: #333;
            transition: 0.3s;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0px 0px 10px rgba(102, 126, 234, 0.8);
        }

        /* Submit Button */
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 18px;
            width: 100%;
            transition: 0.3s;
            color: white;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #5640c4, #4c2f91);
            transform: translateY(-2px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Alert Messages */
        .alert-danger, .alert-success {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Adjust for small screens */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Reviewer Login</h2>

    <?php if(session('fail')): ?>
        <div class="alert alert-danger"><?php echo e(session('fail')); ?></div>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('reviewer.check')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <a href="<?php echo e(route('user.login')); ?>" class="admin-link" style="float: left;">You Want to Login as User ?</a>
        <a href="<?php echo e(route('admin.loginadmin')); ?>" class="admin-link" style="float: left;">You Want to Login as Admin ?</a>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php /**PATH C:\Users\Purvarajsinh\OneDrive\Desktop\COLLEGE WORK\SEM-4\Laravel\Project\Blog-Management\resources\views/reviewer/loginreviewer.blade.php ENDPATH**/ ?>