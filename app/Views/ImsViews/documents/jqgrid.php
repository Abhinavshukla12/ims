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
#grid{
    background-color: #81b1ce;
}
#pager{
    background-color: #81b1ce;
}
</style>
<?= $this->endSection() ?>