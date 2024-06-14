<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Home Page Content -->
<div class="content">
    <!-- Dashboard Overview Section -->
    <div class="section dashboard-overview">
        <h1>Welcome to the Management System</h1>
        <div class="stats">
            <div class="stat-item">
                <h2>Total Products</h2>
                <p><?= $totalProducts ?></p>
            </div>
            <div class="stat-item">
                <h2>Low Stock Items</h2>
                <p><?= $lowStockCount ?></p>
            </div>
            <div class="stat-item">
                <h2>Total Stock Value</h2>
                <p>₹<?= number_format($totalStockValue, 2) ?></p>
            </div>
        </div>
    </div>

    <!-- Recent Stock Items Section -->
    <div class="section recent-stocks">
        <h2>Recent Stock Items</h2>
        <ul class="stock-list">
            <?php foreach ($recentStocks as $stock): ?>
                <li>
                    <?= esc($stock['name']) ?> - ₹<?= number_format($stock['price'], 2) ?> - <?= $stock['count'] ?> units
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Notifications Section -->
    <div class="section notifications">
        <h2>Notifications</h2>
        <ul class="notification-list">
            <li>System maintenance scheduled for June 15, 2024</li>
            <li>New feature: Bulk product upload</li>
            <li>Reminder: Quarterly stock audit due on June 30, 2024</li>
        </ul>
    </div>

    <!-- User Profile and Settings -->
    <div class="section user-profile-settings">
        <h2>User Profile</h2>
        <div class="profile">
            <img src="<?=base_url('assets/img/dashboard/user/user1.avif')?>" alt="User Profile Picture" class="profile-pic">
            <div class="profile-details">
                <p>Name: John Doe</p>
                <p>Email: john.doe@example.com</p>
                <a href="/profile" class="profile-link">View Profile</a>
                <a href="/settings" class="profile-link">Account Settings</a>
            </div>
        </div>
    </div>
</div>
<style>
    /* General Styles */
/* General Styles */
body {
    font-family: sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #eef2f7;
    color: #333;
}

.content {
    max-width: 100%;
    /* margin: 20px auto; */
    padding: 20px;
    background: #757877;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Section Styles */
.section {
    margin-bottom: 30px;
    padding: 20px;
    border: 2px solid black;
    border-radius: 8px;
    background-color: #dfe6e2;
}

h1, h2 {
    color: #444;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

h2 {
    font-size: 1.8em;
    margin-bottom: 15px;
}

/* Dashboard Overview Section */
.dashboard-overview .stats {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.stat-item {
    flex: 1;
    margin: 10px;
    padding: 20px;
    text-align: center;
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.5s ease, box-shadow 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.stat-item h2 {
    margin-bottom: 10px;
    font-size: 1.5em;
    color: #555;
}

.stat-item p {
    font-size: 1.2em;
    font-weight: bold;
    color: #007bff;
}

/* Recent Stock Items Section */
.recent-stocks .stock-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.stock-list li {
    padding: 10px 15px;
    margin-bottom: 5px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.stock-list li:hover {
    background: #f1f1f1;
}

/* Notifications Section */
.notifications .notification-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.notification-list li {
    padding: 10px 15px;
    margin-bottom: 5px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.notification-list li:hover {
    background: #f1f1f1;
}

/* User Profile and Settings Section */
.user-profile-settings .profile {
    display: flex;
    align-items: center;
}

.profile-pic {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
    object-fit: cover;
    border: 2px solid #ddd;
    transition: border 0.3s ease;
}

.profile-pic:hover {
    border: 2px solid black;
}

.profile-details p {
    margin: 5px 0;
}

.profile-link {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    text-decoration: none;
    color: #fff;
    background: linear-gradient(115deg, #0056b3, #004080);
    border-radius: 5px;
    transition: background 0.3s ease, transform 0.5s ease;
}

.profile-link:hover {
    background: linear-gradient(135deg, #0056b3, #004080);
    transform: translateY(-3px);
}

</style>
<?= $this->endSection() ?>