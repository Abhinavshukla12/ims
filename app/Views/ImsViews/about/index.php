<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- About Page Content -->
<div class="content about-page">
    <div class="section">
        <h1>About Us</h1>
        <p class="lead">Welcome to our company! We are dedicated to delivering the best products and services to our customers.</p>

        <div class="mission">
            <h2>Our Mission</h2>
            <p>Our mission is to innovate and lead in our industry, providing top-quality solutions that meet our clients' needs.</p>
        </div>
        
        <div class="history">
            <h2>History</h2>
            <p>Founded in [Year], our company has grown from a small startup to a leading player in the market, thanks to our commitment to excellence and customer satisfaction.</p>
        </div>
        
        <div class="team">
            <h2>Our Team</h2>
            <div class="team-intro">
                <p>We are proud to have a team of dedicated professionals who are experts in their respective fields, working tirelessly to achieve our company's goals.</p>
            </div>
            <div class="team-members">
                <div class="team-member">
                    <div class="team-member-inner">
                        <img src="<?=base_url('assets/img/about/user/user1.avif')?>" alt="John Doe">
                        <h3>John Doe</h3>
                        <p>CEO</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="team-member-inner">
                        <img src="<?=base_url('assets/img/about/user/user2.avif')?>" alt="Jane Smith">
                        <h3>Jane Smith</h3>
                        <p>CTO</p>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
        
        <div class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or need more information, please don't hesitate to contact us at <a href="mailto:info@company.com">info@company.com</a> or call us at <a href="tel:+123456789">+123456789</a>.</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
