<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Post PDF</title>
    <style>
/* General Styling */
body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 14px;
    margin: 30px;
    color: #2c3e50;
    line-height: 1.6;
    background-color: #ffffff;
}

a {
    color: #0d47a1;
    text-decoration: none;
}

/* Headings */
h1, h2, h3, h4 {
    font-family: DejaVu Sans, sans-serif;
    font-weight: bold;
    color: #1a237e;
}

h2 {
    border-bottom: 2px solid #1a237e;
    padding-bottom: 8px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

h3 {
    margin-top: 30px;
    color: #0d47a1;
    font-size: 16px;
    border-bottom: 1px dashed #bbb;
    padding-bottom: 5px;
}

/* Info blocks */
.info {
    margin-bottom: 12px;
    padding: 10px 15px;
    background: #f0f4ff;
    border-left: 5px solid #3f51b5;
    border-radius: 4px;
}

.info label {
    font-weight: bold;
    display: inline-block;
    width: 130px;
    color: #1a237e;
}

/* Content box */
p.content {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #fcfcfc;
    border-radius: 8px;
    white-space: pre-wrap;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.05);
    margin-top: 15px;
}

/* Header with logo */
.header {
    text-align: center;
    margin-bottom: 40px;
}

.header img {
    width: 70px;
    height: auto;
    opacity: 0.95;
}

.header h1 {
    margin: 10px 0 0;
    font-size: 22px;
    color: #1a237e;
    letter-spacing: 1px;
}

/* Footer */
.footer {
    position: fixed;
    bottom: 30px;
    left: 0;
    right: 0;
    text-align: center;
    font-size: 12px;
    color: #777;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

/* Metadata Table */
.meta-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.meta-table th, .meta-table td {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 13px;
    text-align: left;
}

.meta-table th {
    background-color: #1a237e;
    color: white;
    text-transform: uppercase;
}

.meta-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.meta-table tr:hover {
    background-color: #f1f9ff;
}

/* Page styling */
.section {
    margin-bottom: 40px;
}

hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 20px 0;
}

@page {
    margin: 30px;
}
.suggestion-box {
    border: 1px dashed #f39c12;
    padding: 15px;
    background-color: #fff9e6;
    color: #7a5600;
    font-style: italic;
    border-radius: 6px;
    margin-top: 10px;
    white-space: pre-wrap;
}
    </style>
</head>
<body>
    <div class="header">
        <h1>Laravel 11 Blog - Post Report</h1>
    </div>

    <h2>Post Details</h2>

    <div class="info"><label>ID:</label> <?php echo e($post->id); ?></div>
    <div class="info"><label>Title:</label> <?php echo e($post->title); ?></div>
    <div class="info"><label>Author:</label> <?php echo e($post->user->name); ?></div>
    <div class="info"><label>Status:</label> <?php echo e(ucfirst($post->status)); ?></div>
    <div class="info"><label>Created At:</label> <?php echo e($post->created_at->format('d M Y, h:i A')); ?></div>
    <div class="info"><label>Updated At:</label> <?php echo e($post->updated_at->format('d M Y, h:i A')); ?></div>

    <h3>Content:</h3>
    <p class="content"><?php echo nl2br(e($post->content)); ?></p>

    <div class="footer">
        Generated on <?php echo e(now()->format('d M Y, h:i A')); ?>

    </div>
    <h3>Reviewer Suggestion</h3>
<?php if(!empty($post->suggestion)): ?>
    <p class="suggestion-box"><?php echo e($post->suggestion); ?></p>
<?php else: ?>
    <p class="suggestion-box">No suggestions provided.</p>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\Purvarajsinh\OneDrive\Desktop\COLLEGE WORK\SEM-4\Laravel\Project\Blog-Management\resources\views/reviewer/post_pdf.blade.php ENDPATH**/ ?>