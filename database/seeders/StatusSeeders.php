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
        ['name' => 'Scheduled','slug' => 'SCHEDULED'],
        ['name' => 'Confirmed','slug' => 'CONFIRMED'],
        ['name' => 'Cancelled','slug' => 'CANCELLED'],
        ];
        foreach($statuses as $status){
            Status::firstOrCreate($status);
        }

    }
}
