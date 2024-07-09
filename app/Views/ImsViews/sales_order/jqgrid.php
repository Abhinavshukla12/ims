<!-- app/Views/sales_order/index.php -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<!-- Include jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<!-- Include jsPDF autoTable plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.19/jspdf.plugin.autotable.min.js"></script>
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