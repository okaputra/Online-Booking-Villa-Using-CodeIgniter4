<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $table = 'Booking';
    protected $allowedFields = [
        'id_villa',
        'id_user',
        'start_date',
        'end_date',
        'duration',
        'price',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    
    public function villa()
    {
        return $this->belongsTo(Villas::class);
    }
}
