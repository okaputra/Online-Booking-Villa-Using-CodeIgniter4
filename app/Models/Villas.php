<?php

namespace App\Models;

use CodeIgniter\Model;

class Villas extends Model
{
    protected $table = 'villas';
    protected $allowedFields = [
        'villa_name',
        'description',
        'rooms',
        'beds',
        'baths',
        'square_feet',
        'price',
        'thumbnail',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function search($query){
        $builder = $this->db->table('villas');
        $builder->like('villa_name', $query);
        $builder->orLike('description', $query);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_available_villas()
    {
        $builder = $this->db->table('villas');
        $builder->select('*');
        $builder->whereNotIn('id', function($subQuery) {
            $subQuery->select('id_villa')->from('Booking')->where('status', 'Paid');
        });
        return $builder->get()->getResultArray();
    }
}
