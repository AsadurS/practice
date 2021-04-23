<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
  public function store(Request $request)
  {
    
     $request->file('fileToUpload')->storeAs('images',$request->file('fileToUpload')->getClientOriginalName());
  }
}
