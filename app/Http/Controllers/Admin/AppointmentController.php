<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::with('client:id,first_name,last_name','status:id,name,color')
                        ->when(request('status'), function($query){
                            return $query->where('status_id',Status::find(request('status'))->id);
                        })
                        ->latest()->paginate(5);
        return $appointments;
    }
    public function getStatus(){
        $statuses = Status::withCount('appointments')->get();
        return $statuses;
    }
}
