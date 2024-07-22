<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="container mt-3">
    <?php foreach ($aboutContent as $content): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><?= $content['page_title'] ?></h3>
                <?= $content['introductory_paragraphs'] ?>
            </div>
        </div><br>
    <?php endforeach; ?>

    <div class="col-md-12">
        <h3 class="fade-in">Key Features</h3>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php foreach ($aboutContent as $content): ?>
                        <?php 
                        $keyFeatures = explode('\n', $content['key_features']);
                        foreach ($keyFeatures as $feature): ?>
                            <li><?= $feature ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <h3 class="fade-in">Contact Us</h3>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php foreach ($aboutContent as $content): ?>
                        <?php 
                        $contact = explode('\n', $content['contact_us']);
                        foreach ($contact as $contacts): ?>
                            <li><?= $contacts ?></li>
                        <?php endforeach; ?>
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
