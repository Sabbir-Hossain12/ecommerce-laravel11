<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $admin= new Admin;
      $admin->name='Admin';
      $admin->email='admin@admin.com';
      $admin->type='SuperAdmin';
      $admin->password=Hash::make('123456');
      $admin->mobile='01999999999';
      
      
      
      
      $admin->save();
      
      
    }
}
