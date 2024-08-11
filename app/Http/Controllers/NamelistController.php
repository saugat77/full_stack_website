<?php

namespace App\Http\Controllers;

use App\Imports\NamelistImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade
use App\Models\NamelistModel;
class NamelistController extends Controller
{
    public function index()
    {
        return view('admin.namelist.namelist');
    }

    public function getAllData()
    {
        $data = NamelistModel::all();
        return $data;
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
       $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);
        $import = new NamelistImport();
        $data = Excel::import($import, $request->file('file'));
        return redirect()->back()->with('success', 'File imported successfully!');
    }
}
