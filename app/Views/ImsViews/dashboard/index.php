<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Home Page Content -->
<div class="content">
    <div class="section home-section">
        <h1>Welcome to the Inventory Management System</h1>
        <p>Manage your inventory efficiently and effectively.</p>
        
        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search products, suppliers, orders..." />
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
        
        <!-- Cards Section -->
        <div class="cards">
            <div class="card">
                <div class="icon"><i class="fas fa-box"></i></div>
                <h2>Products</h2>
                <p>View and manage your products.</p>
                <a href="/products" class="btn">Go to Products</a>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-truck"></i></div>
                <h2>Suppliers</h2>
                <p>View and manage your suppliers.</p>
                <a href="/suppliers" class="btn">Go to Suppliers</a>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                <h2>Orders</h2>
                <p>View and manage your orders.</p>
                <a href="/orders" class="btn">Go to Orders</a>
            </div>
        </div>
        
        <!-- Recent Activity Section -->
        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <ul>
                <li><i class="fas fa-box"></i> Added new product "Product A"</li>
                <li><i class="fas fa-truck"></i> Supplier "Supplier B" updated their information</li>
                <li><i class="fas fa-shopping-cart"></i> Order #1234 has been shipped</li>
            </ul>
        </div>
        
        <!-- User Profile Section -->
        <div class="user-profile">
            <img src="<?=base_url('assets/img/about/user/user1.avif')?>" alt="Profile Picture">
            <div class="user-info">
                <h3>John Doe</h3>
                <p>Admin</p>
                <a href="/profile" class="btn">View Profile</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
