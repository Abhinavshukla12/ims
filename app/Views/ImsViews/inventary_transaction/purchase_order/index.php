<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<div class="content">
    <div class="section">
        <!-- jqgrid code goes here  -->
        <div>
            <table id="grid"></table>
            <div id="pager"></div>
        </div>
    </div>
</div>
<style>
.section{
    margin-top: 20px;
    margin-left: 20px;
}
</style>
<?= $this->endSection() ?>