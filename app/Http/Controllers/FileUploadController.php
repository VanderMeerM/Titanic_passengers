<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);
        // Check if the file is valid
        if ($request->file('file')->isValid()) {
            // Store the file in the 'uploads' directory on the 'public' disk
            $filePath = $request->file('file')->store('images', 'public');
            // Return success response
            return back()->with('success', 'File uploaded successfully');
        }
        // Return error response
        return back()->with('error', 'File upload failed');
    }
}
