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

    public function getAllData(Request $request)
    {
            $search = $request->input('search', ''); // Get search query from request
            $perPage = $request->input('per_page', 20); // Number of items per page

            $query = NamelistModel::query();

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('fullname', 'like', "%{$search}%")
                    ->orWhere('passport_no', 'like', "%{$search}%")
                    ->orWhere('dob', 'like', "%{$search}%")
                    ->orWhere('doe', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
                });
            }

            $data = $query->paginate($perPage);

    return response()->json($data);
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
