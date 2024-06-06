<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token">
    <title>file-tracking-system</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/css/layout/main.css')?>" rel="stylesheet">
</head>
<body>
<div class="sidebar">
    <a href="<?=base_url('ims/home')?>">Home</a>
    <div class="dropdown">
        <a href="javascript:void(0)">Inventory Transactions</a>
        <div class="dropdown-content">
            <a href="<?=base_url('ims/stock_in')?>">Stock In</a>
            <a href="<?=base_url('ims/stock_out')?>">Stock Out</a>
            <a href="<?=base_url('ims/purchase_order')?>">Purchase Orders</a>
            <a href="<?=base_url('ims/sales_order')?>">Sales Orders</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="javascript:void(0)">Inventory Tracking</a>
        <div class="dropdown-content">
            <a href="#service1">Item Management</a>
            <a href="#service2">Stock Levels</a>
            <a href="#service3">Categories</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="javascript:void(0)">Supplier Management</a>
        <div class="dropdown-content">
            <a href="#service1">Supplier Database</a>
            <a href="#service2">Supplier Performance</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="javascript:void(0)">Warehouse Management</a>
        <div class="dropdown-content">
            <a href="#service1">location Management</a>
            <a href="#service2">Picking Management</a>
            <a href="#service2">Packing Management</a>
            <a href="#service2">Shipping Management</a>
            <a href="#service2">Receiving Management</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="javascript:void(0)">Document Management</a>
        <div class="dropdown-content">
            <a href="#service1">Invoices</a>
            <a href="#service2">Purchase Orders</a>
            <a href="#service3">Shipping Documents</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="javascript:void(0)">Your Profile</a>
        <div class="dropdown-content">
            <a href="#service1">Sign Up</a>
            <a href="#service2">Login</a>
            <a href="#service3">Change Password</a>
        </div>
    </div>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="#contact">Logout</a>
</div>

  <!-- the main content goes here -->
  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>


  <!-- jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/js/dashboard/index/main.js')?>"></script>

</body>

</html>
