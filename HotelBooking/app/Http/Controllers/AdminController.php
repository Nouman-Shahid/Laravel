<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HotelsImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller implements ShouldQueue
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
            // Dispatch the job
            ImportHotelsJob::dispatch($file);

            Log::info('Import job dispatched successfully');
            return Redirect::route('import.form')->with('message', 'Import job started!');
        } catch (\Exception $e) {
            Log::error('Job dispatch error: ' . $e->getMessage());
            return Redirect::route('import.form')->with('message', 'Error dispatching job: ' . $e->getMessage());
        }
    }
}
