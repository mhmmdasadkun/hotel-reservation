<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomFacilityModel extends Model
{
    protected $table = 'room_facilities';
    protected $allowedFields = ['facr_name', 'facr_created', 'facr_updated'];
    protected $useTimestamps = false;
}
