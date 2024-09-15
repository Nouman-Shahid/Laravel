<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HotelsImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function import(Request $request)
    {
        // Validate file
        $request->validate([
            'file' => 'required|mimes:xlsx|max:2048',
        ]);

        $file = $request->file('file');

        Log::info('Received file: ' . $file->getClientOriginalName());

        try {
            Excel::import(new HotelsImport, $file);
            Log::info('File imported successfully');
            return Redirect::route('import.form')->with('message', 'File imported successfully!');
        } catch (\Exception $e) {
            Log::error('File import error: ' . $e->getMessage());
            return Redirect::route('import.form')->with('message', 'Error importing file: ' . $e->getMessage());
        }
    }
}
