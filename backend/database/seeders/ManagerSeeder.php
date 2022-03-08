<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->truncate();

        $datas = [
            [
                'owner'     => 0,
                'email'     => 'chankan77@gmail.com',
                'password'  => 'password',
            ],
            [
                'owner'     => 0,
                'email'     => 'sasaki.r.0809@gmail.com',
                'password'  => 'ofp12345',
            ],
        ];

        foreach($datas as $data) {
            $manage = new Manager();
            $manage->owner = $data['owner'];
            $manage->email = $data['email'];
            $manage->password = Hash::make($data['password']);
            $manage->save();
        }
    }
}
