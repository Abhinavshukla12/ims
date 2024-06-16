<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<body>
 <div class="content">
    <div class="grid">
        <!-- jqgrid code goes here  -->
        <div>
            <table id="grid"></table>
            <div id="pager"></div>
        </div>
    </div>
</div>
 </body>
<style>
body{
    background-color: grey;
}
.grid{
    margin-top: 15px;
    margin-left: 10px;
}
</style>
<?= $this->endSection() ?>