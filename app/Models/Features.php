<?php

namespace App\Models;

use CodeIgniter\Model;

class Features extends Model
{
    protected $table = 'Features';
    protected $allowedFields = [
        'id_villa',
        'features_name',
    ];
}
