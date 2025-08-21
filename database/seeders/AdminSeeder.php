<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkadmin =Admin::where('email','naiyem@gmail.com')->first();
        if(is_null($checkadmin)){
            $user = new Admin();
            $user->name= 'Naiyem Hossain(Super Admin)';
            $user->phone= '01635663575';
            $user->email= 'naiyem@gmail.com';
            $user->status= 'Active';
            $user->password= Hash::make('111111');
            $user->save();
        }
    }
}
