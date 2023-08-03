<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username','name','address','no_wa','password','created_at'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
