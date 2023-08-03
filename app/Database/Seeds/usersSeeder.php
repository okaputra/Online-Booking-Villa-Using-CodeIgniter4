<?php

namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run(){
        $data = [
            [
                'username' =>'admin@admin.com',
                'name' =>'ADMIN',
                'address' =>'Jakarta Selatan',
                'no_wa' =>'+6287818818181',
                'password' => password_hash('123456789', PASSWORD_DEFAULT),
                'akses' =>1,
            ],
            [
                'username' =>'user@user.com' ,
                'name' =>'USER',
                'address' =>'Jakarta Utara',
                'no_wa' =>'+6287919919191',
                'password' => password_hash('123456789', PASSWORD_DEFAULT),
                'akses' =>0,
            ],
        ];
        $this->db->table('Users')->insertBatch($data);
     }
}