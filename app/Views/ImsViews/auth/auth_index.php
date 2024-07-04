<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootswatch Zephyr Theme CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/zephyr/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 70%;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.15);
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 1rem 0;
        }

        .form-container h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .form-group label {
            color: #fff;
        }

        .btn-primary {
            background: #2575fc;
            border: none;
        }

        .btn-primary:hover {
            background: #1b63d6;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .login-container, .register-container {
            flex: 1;
            margin: 1rem;
        }

        @media (max-width: 768px) {
            .login-container, .register-container {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-between">
            <div class="login-container form-container">
                <h2>User Login</h2>
                <?php if(session()->has('error')): ?>
                    <p style="color: red;"><?= session('error') ?></p>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <p style="color: green;"><?= session('success') ?></p>
                <?php endif; ?>
                <form action="<?= site_url('ims/login') ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
            <div class="register-container form-container">
                <h2>User Registration</h2>
                <form action="<?= site_url('ims/register') ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
