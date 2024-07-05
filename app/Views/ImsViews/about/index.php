<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2>About Us</h2>
            <?= $aboutContent['introductory_paragraphs'] ?>
        </div>
    </div>
    <div class="col-md-12">
        <h2 class="fade-in">Key Features</h2>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php 
                    // Explode key features string by newline and display each feature as list item
                    $keyFeatures = explode("\n", $aboutContent['key_features']);
                    foreach ($keyFeatures as $feature): ?>
                        <li><?= $feature ?></li>
                    <?php endforeach; ?>
                 </ul>
            </div>
        </div>
    </div>
</div>
</body>
<style>
/* Your CSS styles */
body{
    background-color: #046169;
    color: white;
}
</style>
<?= $this->endSection() ?>
