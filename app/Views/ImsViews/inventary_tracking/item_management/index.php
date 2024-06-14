<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<div class="content">
    <div class="section">
        <h2 id="main-heading">Item Management</h2>
        <!-- jqgrid code goes here  -->
        <div>
            <table id="grid"></table>
            <div id="pager"></div>
        </div>
        
        <div class="item_management-info">
            <!-- Placeholder for company information -->
            <h2>Item Management Information <i class="fa-solid fa-arrow-right"></i> Hints</h2>
            <div id="item_management-details">
                <h3><i class="fa-solid fa-square-plus"></i>  In these button you can create new Stocks</h3>
                <h3><i class="fa-solid fa-pen"></i>  In these button you can edit the order, <br> It's working after selecting</h3>
                <h3><i class="fa-solid fa-trash"></i>  In these button you can delete the order, <br> It's working after selecting</h3>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>