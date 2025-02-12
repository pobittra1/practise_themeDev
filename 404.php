<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .error-container {
            text-align: center;
            max-width: 500px;
        }

        .error-code {
            font-size: 100px;
            font-weight: bold;
            color: #dc3545;
        }

        .error-text {
            font-size: 22px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h2 class="error-text">Oops! Page Not Found</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="index.html" class="btn btn-primary mt-3">Go Back Home</a>
    </div>
</body>

</html>