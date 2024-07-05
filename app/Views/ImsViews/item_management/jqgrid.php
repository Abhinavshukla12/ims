<!-- app/Views/stock/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<!-- jqgrid code goes here  -->
<br>
<div>
    <table id="grid"></table>
    <div id="pager"></div>
</div>
</body>

<style>
body{
    background-color: #046169;
    color: white;
}
</style>
<?= $this->endSection() ?>