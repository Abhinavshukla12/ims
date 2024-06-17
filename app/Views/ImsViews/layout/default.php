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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0ac4f2;
            color: black;
            padding: 15px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .brand a{
            color: black;
            font-size: 1.5em;
            font-weight: bold;
            margin-right: 20px;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin-right: 20px;
        }
        .navbar ul li:last-child {
            margin-right: 0;
        }
        .navbar ul li a {
            color: black;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .navbar ul li a:hover {
            background-color: #08596e;
        }
        /* Secondary Navbar Styles */
        .navbar-secondary {
            background-color: #05f782;
            padding: 10px;
            display: flex;
            justify-content: center;
        }
        .navbar-secondary ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar-secondary ul li {
            margin-right: 10px;
        }
        .navbar-secondary ul li:last-child {
            margin-right: 0;
        }
        .navbar-secondary ul li a {
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .navbar-secondary ul li a:hover {
            background-color: #08a358;
        }
    </style>
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
    <!-- Primary Navbar -->
    <div class="navbar">
        <div class="brand"><a href="<?=base_url('ims/home')?>">Manangement System</a></div> <!-- Navbar Brand -->
        <div class="navbar-primary">
            <ul>
                <li><a href="<?=base_url('ims/home')?>">Home</a></li>
                <li><a href="<?=base_url('ims/about')?>">About</a></li>
                <li><a href="<?=base_url('ims/categories')?>">Categories</a></li>
                <li><a href="<?=base_url('ims/contact')?>">Contact</a></li>
                <li><a href="<?=base_url('ims/profile')?>">Profile</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Secondary Navbar -->
    <div class="navbar-secondary">
        <ul>
            <li><a href="<?=base_url('ims/stock')?>">Stocks Management</a></li>
            <li><a href="<?=base_url('ims/purchase_order')?>">Purchase Orders</a></li>
            <li><a href="<?=base_url('ims/sales_order')?>">Sales Orders</a></li>
            <li><a href="<?=base_url('ims/item_management')?>">Item Management</a></li>
            <li><a href="<?=base_url('ims/supplier_database')?>">Supplier Database</a></li>
            <li><a href="<?=base_url('ims/warehouse')?>">Warehouse Management</a></li>
            <li><a href="<?=base_url('ims/document')?>">Document Management</a></li>
            <li><a href="<?=base_url('ims/settings')?>">Settings</a></li>
            <li><a href="<?=base_url('ims/logout')?>">Logout</a></li>
        </ul>
    </div>

    <!-- the main content goes here -->
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
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
