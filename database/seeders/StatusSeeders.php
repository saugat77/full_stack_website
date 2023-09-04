<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $statuses =  [
        ['name' => 'Scheduled','color' => 'primary'],
        ['name' => 'Closed','color' => 'success'],
        ['name' => 'Cancelled','color' => 'danger'],
        ];
        foreach($statuses as $status){
            Status::firstOrCreate($status);
        }

    }
}
