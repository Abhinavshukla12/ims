<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutPageContentModel extends Model
{
    protected $table = 'about_page_content';
    protected $primaryKey = 'id';
    protected $allowedFields = ['page_title', 'introductory_paragraphs', 'key_features', 'contact_us'];
}