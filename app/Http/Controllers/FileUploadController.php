<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\DB;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class FileUploadController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|mimes:jpg,JPG,png,PNG|max:2048',
        ]);
        
        //$fileName = time().'.'.$request->file->extension();  

       $passname = Passenger::find($request->input('pass_id'))->Name.'.'.$request->file->extension();
         
       $request->file->move(public_path('images'), $passname);
          
       DB::table('passengers')->where('Id', $request->input('pass_id'))->update(['Image' => $passname]);
        /*  
           Write Code Here for
            Store $fileName name in DATABASE from HERE 
       
     */    
      return back();
      
    }
    /*
    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,png|max:2048',
        ]);
        // Check if the file is valid
        if ($request->file('file')->isValid()) {
            // Store the file in the 'uploads' directory on the 'public' disk
            $request->file->storeAs('images', 'public');
            // Return success response
            return back()->with('success', 'File uploaded successfully');
        }
        // Return error response
        return back()->with('error', 'File upload failed');
    }
        */
}
