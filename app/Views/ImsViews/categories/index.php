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
            </section>
            <section class="category">
                <img src="https://picsum.photos/id/1015/400/200" alt="Category 8">
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
/* General Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: grey;
}

.content {
    max-width: 100%;
    padding: 20px;
}

/* Section Styles */
.section {
    margin-bottom: 10px;
    padding: 20px;
    border: 5px solid black;
    border-radius: 8px;
    background-color: #dfe6e2;
}

/* Main Grid Layout */
main {
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
}

/* Category Styles */
.category {
    background-color: wheat;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px black;
    transition: transform 0.3s ease;
    position: relative;
}

.category:hover {
    transform: translateY(-5px);
}

.category img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Button Container Styles */
.btn-container {
    display: flex;
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
}

/* Button Styles */
.btn {
    flex: 1;
    padding: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-view {
    background-color: #0a75fa;
    color: #fff;
    margin-right: 10px;
    margin-top: 5px;
}

.btn-manage {
    background-color: #07ba13;
    color: #fff;
    margin-top: 5px;
}
</style>
<?= $this->endSection() ?>
