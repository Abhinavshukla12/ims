<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="fade-in">About Page</h1>
            <p>Welcome to our Management System! This system is designed to help you manage various aspects of your business efficiently.</p>
            <p>With this system, you can keep track of:</p>
            <ul>
                <li>Stocks</li>
                <li>Sales</li>
                <li>Purchases</li>
                <li>Items</li>
                <li>Suppliers</li>
                <li>Documents</li>
                <li>Warehouses</li>
            </ul>
            <p>Each module provides comprehensive features to manage your data effectively. We hope this system helps streamline your business operations and improve productivity.</p>
            <p>For any inquiries or support, please contact our support team.</p>
        </div>
    </div>
    
    <div class="row mt-2 justify-content-center">
        <div class="col-md-4 d-flex">
            <div class="card shadow-sm mission-card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Our Mission</h5>
                    <p class="card-text">To provide the best tools for business management, enhancing productivity and efficiency.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card shadow-sm vision-card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Our Vision</h5>
                    <p class="card-text">To be the leading provider of business management solutions worldwide.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card shadow-sm values-card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Our Values</h5>
                    <p class="card-text">Innovation, Excellence, Integrity, and Customer Satisfaction.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="fade-in">Key Features</h2>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>Real-time stock management</li>
                        <li>Comprehensive sales tracking</li>
                        <li>Efficient purchase order processing</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Detailed item catalog management</li>
                        <li>Supplier relationship management</li>
                        <li>Document management and storage</li>
                        <li>Warehouse management</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
/* Change background color */
body {
    background-color: #f8f9fa; /* Light gray */
}

#main {
    background-color: wheat;
}

#main-data {
    background-color: wheat;
    margin-bottom: 20px; /* Add margin bottom for gap between data blocks */
}

/* Change text color and font weight */
h1, h2, h3, h5 {
    color: black; /* Dark gray */
    font-weight: 500;
    font-size: 28px;
}

p {
    font-weight: 300;
}

/* Add animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.fade-in {
    animation: fadeIn 1s ease-in-out;
}

.card {
    margin-top: 20px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.card-title {
    margin-bottom: 15px;
    font-size: 1.25rem;
}

.card-text {
    font-size: 1rem;
    color: #555;
}

/* Custom background colors for mission, vision, and values cards */
.mission-card {
    background-color: #d1ecf1; /* Light blue */
}

.vision-card {
    background-color: #d4edda; /* Light green */
}

.values-card {
    background-color: #f8d7da; /* Light red */
}

/* Ensure all cards are the same height */
.mission-card, .vision-card, .values-card {
    height: 100%;
}
</style>
<?= $this->endSection() ?>
