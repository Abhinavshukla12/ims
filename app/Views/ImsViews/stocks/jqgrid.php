<!-- app/Views/stock/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- jqgrid code goes here  -->
 <br>
<div>
    <table id="grid"></table>
    <div id="pager"></div>
</div>
<?= $this->endSection() ?>