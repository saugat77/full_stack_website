<?php

namespace App\Http\Controllers;
use App\Models\ResumeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index() {
        $cv = ResumeModel::all();
        return $cv;
    }
    public function store(Request $req){

        $createCv = new ResumeModel;
        $createCv->full_name = $req->input('fullName');
    $createCv->father_name = $req->input('fatherName');
    $createCv->ward = $req->input('ward');
    $createCv->district = $req->input('district');
    $createCv->dob = $req->input('Dob');
    $createCv->passport_number = $req->input('passportNumber');
    $createCv->issued_at = $req->input('issuedAt');
    $createCv->expiry_date = $req->input('expiredAt');
    $createCv->worked_as = $req->input('workedAs');
    $createCv->years_of_experience = $req->input('experience');
    $createCv->worked_at = $req->input('workedAt');
    if(request()->file('pp_image')){
        $image = request()->file('pp_image');
        $this->updateImage($image,$createCv);
    }
        $createCv->save();

       return response()->json($createCv);
    }
    public function edit(ResumeModel $resume){
        return $resume;
    }
    public function update(ResumeModel $resume, Request $req){
        dd($req);
        $resume->full_name = $req->input('fullName');
        $resume->father_name = $req->input('fatherName');
        $resume->ward = $req->input('ward');
        $resume->district = $req->input('district');
        $resume->dob = $req->input('Dob');
        $resume->passport_number = $req->input('passportNumber');
        $resume->issued_at = $req->input('issuedAt');
        $resume->expiry_date = $req->input('expiredAt');
        $resume->worked_as = $req->input('workedAs');
        $resume->years_of_experience = $req->input('experience');
        $resume->worked_at = $req->input('expiredAt');
        if(request()->file('pp_image')){
            $image = request()->file('pp_image');
            $this->updateImage($image,$createCv);
        }
            $resume->update();

       return response()->json($resume);
    }
    public function updateImage($image, $resume)
    {

        $link = Storage::disk('public')->put('resume', $image);


        // Update the image_path attribute of the demand model
        $resume->pp_size_image = $link;
        dd($link);
        $resume->update();
    }
}
