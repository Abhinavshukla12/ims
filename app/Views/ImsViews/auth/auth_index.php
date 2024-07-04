<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>

<!-- Include Bootstrap and Font Awesome -->
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFM1vveMqcKn1TwQhHUYSAPaF+Udhssz7mAxk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-NJFl/Nr3gCH0nUh2VS7hP6c5xMBltZef6rv6i0V4c4j+hRc1Q7k+tfnHTSL72p1v" crossorigin="anonymous">

<style>
    /* Global styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
    }

    .main-content {
        margin-top: 50px;
    }

    /* Jumbotron styles */
    .jumbotron {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        border-radius: 15px;
        padding: 50px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .jumbotron h1, .jumbotron p {
        animation: fadeInDown 1s ease-in-out;
        font-weight: 12px;
    }

    /* Features Section */
    .features .feature-icon {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .features .feature-icon i {
        color: #007bff;
        transition: transform 0.3s;
    }

    .features .feature-icon:hover i {
        transform: scale(1.2);
    }

    .features h2 {
        margin-bottom: 40px;
    }

    .features h4 {
        margin-top: 20px;
        color: #333;
    }

    .features p {
        color: #777;
    }

    /* Testimonials Section */
    .testimonials {
        background-color: #f8f9fa;
        padding: 50px 0;
    }

    .testimonials blockquote {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .testimonials blockquote:hover {
        transform: translateY(-10px);
    }

    .testimonials .blockquote-footer {
        font-size: 0.9rem;
        color: #555;
    }

    /* Form Container styles */
    .form-container {
        margin-top: 20px;
        padding: 10px; /* Decreased padding to reduce height */
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .form-container h2 {
        margin-bottom: 20px;
        color: #007bff;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 50px;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
        transform: scale(1.05);
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .jumbotron {
            padding: 30px;
        }

        .features .feature-icon {
            font-size: 2.5rem;
        }

        .features h4 {
            font-size: 1.25rem;
        }

        .features p {
            font-size: 0.9rem;
        }

        .testimonials blockquote {
            padding: 15px;
        }

        .form-container {
            padding: 15px;
        }

        .form-container h2 {
            font-size: 1.5rem;
        }
    }

    /* Separate CSS for Register Container */
    .register-container {
        padding: 10px; /* Adjust padding as needed */
    }

    .register-container h2 {
        color: #007bff;
        margin-bottom: 20px;
    }

    /* Separate CSS for Login Container */
    .login-container {
        padding: 10px; /* Adjust padding as needed */
    }

    .login-container h2 {
        color: #007bff;
        margin-bottom: 20px;
    }
</style>

<!-- HTML Content -->
<div class="container main-content">
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to the Factory Management System</h1>
        <p class="lead">Streamline your factory operations with our advanced management tools.</p>
        <hr class="my-4">
        <p>Manage inventory, track production, and ensure quality with ease.</p>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="container">
            <br>
            <u><h2 class="text-center">Features</h2></u>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h4>Automated Processes</h4>
                    <p>Reduce manual intervention and increase efficiency with automated workflows.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>Real-Time Analytics</h4>
                    <p>Make informed decisions with real-time data and analytics dashboards.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>Secure & Reliable</h4>
                    <p>Ensure data security and system reliability with our robust infrastructure.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials bg-light py-5">
        <div class="container">
        <u><h2 class="text-center">Testimonials</h2></u><br>
            <div class="row">
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"The Factory Management System has transformed our operations. It's user-friendly and incredibly efficient."</p>
                        <br><footer class="blockquote-footer">John Doe, <cite title="Source Title">ABC Manufacturing</cite></footer>
                    </blockquote>
                </div>
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"We have seen a significant improvement in our productivity and quality control since implementing this system."</p>
                        <br><footer class="blockquote-footer">Jane Smith, <cite title="Source Title">XYZ Industries</cite></footer>
                    </blockquote>
                </div>
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"A must-have for any factory looking to streamline their processes and improve overall efficiency."</p>
                        <br><footer class="blockquote-footer">Mike Johnson, <cite title="Source Title">LMN Corp</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration and Login Section -->
    <div class="container my-5">
        <div class="row justify-content-between">
            <div class="col-md-5 register-container">
                <h2>User Registration</h2>
                <form action="<?= site_url('ims/register') ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
            <div class="col-md-5 login-container">
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
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>