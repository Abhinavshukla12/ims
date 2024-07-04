<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<!-- Main content -->
<div class="container main-content">
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to the Factory Management System</h1>
        <p class="lead">Streamline your factory operations with our advanced management tools.</p>
        <hr class="my-4">
        <p>Manage inventory, track production, and ensure quality with ease.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
    </div>

    <div class="row text-center">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Inventory Management">
                <div class="card-body">
                    <h4 class="card-title">Inventory Management</h4>
                    <p class="card-text">Keep track of raw materials and finished products with our inventory management module.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Production Tracking">
                <div class="card-body">
                    <h4 class="card-title">Production Tracking</h4>
                    <p class="card-text">Monitor production processes and optimize efficiency with our real-time tracking tools.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Quality Assurance">
                <div class="card-body">
                    <h4 class="card-title">Quality Assurance</h4>
                    <p class="card-text">Ensure high standards and compliance with our quality assurance tools.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="container">
            <h2 class="text-center">Features</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="feature-icon text-primary">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Automated Processes</h4>
                    <p>Reduce manual intervention and increase efficiency with automated workflows.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-icon text-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Real-Time Analytics</h4>
                    <p>Make informed decisions with real-time data and analytics dashboards.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-icon text-primary">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Secure & Reliable</h4>
                    <p>Ensure data security and system reliability with our robust infrastructure.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials bg-light">
        <div class="container">
            <h2 class="text-center">Testimonials</h2>
            <div class="row">
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"The Factory Management System has transformed our operations. It's user-friendly and incredibly efficient."</p>
                        <footer class="blockquote-footer">John Doe, <cite title="Source Title">ABC Manufacturing</cite></footer>
                    </blockquote>
                </div>
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"We have seen a significant improvement in our productivity and quality control since implementing this system."</p>
                        <footer class="blockquote-footer">Jane Smith, <cite title="Source Title">XYZ Industries</cite></footer>
                    </blockquote>
                </div>
                <div class="col-md-4 testimonial text-center">
                    <blockquote class="blockquote">
                        <p class="mb-0">"A must-have for any factory looking to streamline their processes and improve overall efficiency."</p>
                        <footer class="blockquote-footer">Mike Johnson, <cite title="Source Title">LMN Corp</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="register-container form-container">
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

<style>
    body {
    background-color: #f8f9fa; /* Change the background color */
}

.container {
    margin-top: 50px;
}

.row {
    display: flex;
    justify-content: space-between;
}

.form-container {
    background: #ffffff; /* Background color of the form container */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 48%;
}

.register-container {
    height: auto; /* Adjust height if needed */
}

.login-container {
    height: auto; /* Adjust height if needed */
}

.form-group {
    margin-bottom: 15px;
}

.btn-block {
    width: 100%;
}

h2 {
    margin-bottom: 20px;
}

p {
    margin: 10px 0;
}

</style>
<?= $this->endSection() ?>