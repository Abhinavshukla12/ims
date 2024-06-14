<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Example content -->
<div class="content">
    <div class="section">
        <main>
    <section class="category">
      <img src="https://picsum.photos/id/1015/400/200" alt="Category 1">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1016/400/200" alt="Category 2">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1018/400/200" alt="Category 4">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1015/400/200" alt="Category 5">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1016/400/200" alt="Category 6">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1018/400/200" alt="Category 7">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section><section class="category">
      <img src="https://picsum.photos/id/1015/400/200" alt="Category 8">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <section class="category">
      <img src="https://picsum.photos/id/1016/400/200" alt="Category 9">
      <br>
      <div class="btn-container">
        <button class="btn btn-view">View</button>
        <button class="btn btn-manage">Manage</button>
      </div>
    </section>
    <!-- Add more categories as needed -->
  </main>
    </div>
</div>

<style>
  main {
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
  }

  .category {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    position: relative;
  }

  .category:hover {
    transform: translateY(-5px);
  }

  .category h2 {
    margin-top: 0;
    color: #333;
  }

  .category img {
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
  }

  .btn-container {
    display: flex;
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
  }

  .btn {
    flex: 1;
    padding: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-view {
    background-color: #7a7676;
    color: #fff;
    margin-right: 10px;
  }

  .btn-manage {
    background-color: #7a7676;
    color: #fff;
  }
</style>
<?= $this->endSection() ?>