<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token">
    <title>IMS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/css/layout/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_transaction/stocks/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_transaction/purchase_order/main.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/plugins/css/ui.multiselect.min.css" />
    <!-- Bootstrap css  -->
    <?php
    if (isset($css)) {
        foreach ($css as $style):
            echo '<link href="' . base_url('' . $style) . '" rel="stylesheet">';
        endforeach;
    }
    ?>
</head>
<body>
<div class="sidebar">
    <a href="<?=base_url('ims/home')?>">Home</a>
    <div class="dropdown">
        <a href="javascript:void(0)">Inventory Transactions</a>
        <div class="dropdown-content">
            <a href="<?=base_url('ims/stocks')?>">Stocks</a>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js" ></script>
  <script type="text/javascript">
        $.ajaxPrefilter(function (options, originalData, xhr) {
            var data = "<?php echo  csrf_token(). '=' . csrf_hash(); ?>" + "&random=" + Math.random();
            if (options.data) {
                options.data += "&" + data;
            } else {
                options.data = data;
            }
        });
    </script>

    <!-- Load custom JS -->
    <?php
    if (isset($js)) {
        foreach ($js as $script):
            echo '<script src="' . base_url('' . $script) . '"></script>';
        endforeach;
    }
    ?>
</body>

</html>
