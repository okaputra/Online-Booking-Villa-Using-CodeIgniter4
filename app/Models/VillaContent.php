<?php

namespace App\Models;

use CodeIgniter\Model;

class VillaContent extends Model
{
    protected $table = 'VillaContent';
    protected $allowedFields = [
        'id_villa',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'link_maps',
    ];
}
