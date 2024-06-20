<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootswatch Zephyr Theme CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/zephyr/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 4rem;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 2rem;
        }

        .form-container h2 {
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .btn-primary {
            border-radius: 0.25rem;
            padding: 0.5rem 2rem;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1rem;
            }

            .btn-primary {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2>User Registration</h2>
                    <!-- Error and success messages remain the same -->
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
                    <p class="mt-3 text-center">Already have an account? <a href="<?= site_url('ims/login') ?>">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
