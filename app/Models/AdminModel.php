<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $allowedFields = ['ad_username', 'ad_email', 'ad_password', 'ad_created', 'ad_updated'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('admins');
    }
    
    public function getData($data)
    {
        $this->builder->select('admins.id, roles.role_name, ad_username, ad_email, ad_password');
        $this->builder->join('roles', 'roles.id = admins.role_id');
        $this->builder->where('ad_email', $data);
        return $this->builder->get();
    }
}
