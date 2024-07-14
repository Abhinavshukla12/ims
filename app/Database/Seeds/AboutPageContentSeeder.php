<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AboutPageContentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'page_title' => 'About Our Factory',
                'introductory_paragraphs' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero sed tellus aliquet, nec gravida elit eleifend. Ut dapibus dui non magna tincidunt ultrices. Sed sed lobortis turpis, et tincidunt libero. Phasellus vestibulum quam nec lorem varius, sed tincidunt sem fermentum.',
                'key_features' => '1. Advanced Production Facilities\n2. Quality Control Standards\n3. Sustainable Practices\n4. Employee Welfare Programs\n5. Innovation in Technology',
                'contact_us' => 'For more information, contact us at info@example.com',
            ],
            [
                'page_title' => 'Mission and Vision',
                'introductory_paragraphs' => 'Our mission is to deliver high-quality products while adhering to ethical standards. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et sodales mauris. Nullam eget justo vel tortor sollicitudin aliquam. Phasellus tincidunt purus nec lectus ullamcorper, a faucibus sapien consequat. Mauris dapibus euismod metus, a congue lorem eleifend sed.',
                'key_features' => '1. Ethical Manufacturing\n2. Innovation in Product Development\n3. Environmental Responsibility\n4. Community Engagement\n5. Customer Satisfaction',
                'contact_us' => 'Contact us to learn more about our mission and vision.',
            ],
            [
                'page_title' => 'Our Team',
                'introductory_paragraphs' => 'Meet our dedicated team of professionals who drive our factory forward. Sed euismod, magna at iaculis pretium, risus nulla bibendum turpis, a lacinia magna est at tortor. Aliquam volutpat vel arcu a lobortis. Integer eu mauris a orci molestie varius. In sit amet lobortis sem. Nam ut convallis libero.',
                'key_features' => '1. Expertise in Industry\n2. Team Collaboration\n3. Continuous Learning\n4. Leadership Development\n5. Cultural Diversity',
                'contact_us' => 'Interested in joining our team? Reach out to hr@example.com',
            ],
        ];

        // Uncomment the following line to truncate the table before seeding
        // $this->db->table('about_page_content')->truncate();

        // Insert seed data
        $this->db->table('about_page_content')->insertBatch($data);
    }
}
