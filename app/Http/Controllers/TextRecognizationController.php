<?php

namespace App\Http\Controllers;
use thiagoalessio\TesseractOCR\TesseractOCR;


use Illuminate\Http\Request;

class TextRecognizationController extends Controller
{
    public function tesseract_ocr(){
        echo (new TesseractOCR('clean.jpeg'))->run();
    }
}
