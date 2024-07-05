<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'salary',
        'hire_date',
        'status'
    ];
    
    // Optional: add validation rules
    protected $validationRules = [
        'first_name' => 'required|alpha_space|min_length[2]|max_length[50]',
        'last_name'  => 'required|alpha_space|min_length[2]|max_length[50]',
        'email'      => 'required|valid_email|max_length[100]',
        'phone'      => 'required|numeric|min_length[10]|max_length[15]',
        'position'   => 'required|string|max_length[100]',
        'salary'     => 'required|decimal',
        'hire_date'  => 'required|valid_date',
        'status'     => 'required|in_list[active,inactive]'
    ];
}

?>
