<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomCategoryModel extends Model
{
    protected $table = 'room_categories';
    protected $allowedFields = ['catr_name', 'catr_slug', 'catr_created', 'catr_updated'];
    protected $useTimestamps = false;
}
