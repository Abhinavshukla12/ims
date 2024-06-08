<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<div class="content">
    <div class="section">
        <h1>Contact</h1>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <form action="<?=base_url('submit')?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= old('name') ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>">
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message"><?= old('message') ?></textarea>
            </div>
            <div>
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
