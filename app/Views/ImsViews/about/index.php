<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- About Page Content -->
<div class="content">
    <div class="about-page section">
        <h1>About Us</h1>
        <p>Welcome to <strong>[Your Company Name]</strong>! We are passionate about delivering the best services and products to our customers. Our journey has been one of innovation, dedication, and customer satisfaction.</p>
        
        <section class="mission">
            <h2>Our Mission</h2>
            <p>Our mission is to deliver high-quality products that bring value to our clients and improve their daily lives. We strive to exceed customer expectations through continuous improvement and customer interaction.</p>
        </section>
        
        <section class="team">
            <h2>Our Team</h2>
            <div class="team-members">
                <div class="team-member">
                    <img src="/path/to/ceo.jpg" alt="CEO">
                    <h3>Jane Doe</h3>
                    <p>Chief Executive Officer</p>
                </div>
                <div class="team-member">
                    <img src="/path/to/cto.jpg" alt="CTO">
                    <h3>John Smith</h3>
                    <p>Chief Technology Officer</p>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </section>
        
        <section class="history">
            <h2>Our History</h2>
            <p>Founded in <strong>[Year]</strong>, <strong>[Your Company Name]</strong> has grown from a small startup to a leading company in the industry. Our milestones include:</p>
            <ul>
                <li><strong>[Year]</strong> - Company founded</li>
                <li><strong>[Year]</strong> - Launched our first product</li>
                <li><strong>[Year]</strong> - Expanded to new markets</li>
                <!-- Add more milestones as needed -->
            </ul>
        </section>
        
        <section class="values">
            <h2>Our Values</h2>
            <p>We uphold the following core values:</p>
            <ul>
                <li>Integrity</li>
                <li>Innovation</li>
                <li>Customer Focus</li>
                <li>Teamwork</li>
                <li>Excellence</li>
            </ul>
        </section>
        
        <section class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to <a href="/contact">contact us</a>. We are always here to assist you.</p>
        </section>
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
    margin-bottom: 6px;
    padding: 20px;
    border: 2px solid black;
    border-radius: 10px;
    background-color: #dfe6e2;
}

h1, h2 {
    color: #0056b3;
}

p {
    margin-bottom: 20px;
}

/* Team Section Styles */
.team-members {
    display: flex;
    flex-wrap: wrap;
}

.team-member {
    margin: 10px;
    text-align: center;
}

.team-member img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.team-member h3 {
    margin-top: 10px;
    margin-bottom: 5px;
}
</style>

<?= $this->endSection() ?>
