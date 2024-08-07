<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demands = Demand:: // Use the relationship name
            latest()
            ->when(request('active'), function ($query) {
                if (request('active') === '2') {
                    return $query->where('active', false);
                }
                return $query->where('active', request('active'));
            })
            ->get();

        return $demands;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function activeCount()
    {
        $demands = Demand::countActiveDemands();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $validated = request()->validate([
            'name' => 'required',
            'country' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'number_of_people_needed' => 'required',
            'active' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',

        ]);
        $demand = Demand::create([
            'name' => $validated['name'],
            'country' => $validated['country'],
            'salary' => $validated['salary'],
            'description' => $validated['description'],
            'number_of_people_needed' => $validated['number_of_people_needed'],
            'active' => $validated['active'],
        ]);
        if(request()->file('image')){

            $image = request()->file('image');
            $this->updateImage($image,$demand);
        }
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Demand $demand)
    {
        return $demand;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Demand $demand)
    {
        $validated = request()->validate([
            'name' => 'required',
            'country' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'number_of_people_needed' => 'required',
            'active' => 'required',
            'image' => 'nullable',

        ]);
        $demand->update([
            'name' => $validated['name'],
            'country' => $validated['country'],
            'salary' => $validated['salary'],
            'description' => $validated['description'],
            'number_of_people_needed' => $validated['number_of_people_needed'],
            'active' => $validated['active'],
        ]);
        if(request()->file('image')){
            $image = request()->file('image');
            $this->updateImage($image,$demand);
        }
        return response()->json(['message' => 'success']);

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImage($image, $demand)
    {

        $link = Storage::disk('public')->put('demands', $image);


        // Update the image_path attribute of the demand model
        $demand->image = $link;
        $demand->save();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demand $demand)
    {
        //
    }
}
