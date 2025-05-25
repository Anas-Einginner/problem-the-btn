<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Stage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
          
        //     Stage::create([
        //     'name' => 'المرحلة الإبتدائية',
        //     'tag' =>'p',
        // ]);Stage::create([
        //     'name' => 'المرحلة الإعدادية',
        //     'tag' =>'m',
        // ]);
        // Stage::create([
        //     'name' => 'المرحلة الثانوية',
        //     'tag' =>'h',
        // ]); 
        // info('Seeding done');
      // $stagep =Stage::getTagById('h');
      // Grade::create([
      //   'name' =>'الصف الثاني عشر',
      //   'stage_id'=>$stagep,
      //   'tag'=>'12',

      // ]);
  
}
}