<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<body>
 <div class="content">
    <div class="container">
        <div class="grid">
            <!-- jqgrid code goes here  -->
            <div>
                <table id="grid"></table>
                <div id="pager"></div>
            </div>
        </div>
        <div class="right-column">
            <div class="second">
                <h1>second div</h1>
            </div>
            <div class="third">
                <h1>third div</h1>
            </div>
        </div>
    </div>
</div>
</body>
<style>
body {
    background-color: grey;
    margin: 0; /* Ensure there is no margin on the body */
    height: 100vh; /* Set the height of the body to full viewport height */
    display: flex;
    flex-direction: column;
}
.content {
    flex: 1; /* Allow the content to grow and take available space */
}
.container {
    display: flex;
    justify-content: flex-start; /* Align items to the start */
    gap: 20px; /* Add 20px gap between grid and right-column */
    margin-top: 15px;
}
.grid {
    margin-left: 10px;
}
.right-column {
    display: flex;
    flex-direction: column; /* Arrange second and third divs in a column */
    width: 400px; /* Adjust width as needed */
}
.second, .third {
    background-color: #f1f1f1;
    margin-bottom: 10px; /* Add space between second and third divs */
    height: 280px; /* Set height to 280px */
    border: 2px solid #000; /* Add a solid border */
    border-radius: 15px; /* Add a border-radius for curly borders */
    box-sizing: border-box; /* Ensure padding and border are included in the element's total width and height */
    width: 608px;
}
.third {
    background-color: #f1f1f1;
}
</style>
<?= $this->endSection() ?>