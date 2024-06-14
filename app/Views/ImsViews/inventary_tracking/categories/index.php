<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<div class="content">
    <div class="section">
        <main>
    <section class="category">
      <img src="https://picsum.photos/id/1015/400/200" alt="Category 1">
      <h2>Category 1</h2>
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1016/400/200" alt="Category 2">
      <h2>Category 2</h2>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1018/400/200" alt="Category 3">
      <h2>Category 3</h2>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <!-- Add more categories as needed -->
  </main>
    </div>
</div>
<?= $this->endSection() ?>