<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        // Store the uploaded file temporarily
        $path = $request->file('file')->store('uploads');

        // Load the XLSX file
        $spreadsheet = IOFactory::load(storage_path('app/' . $path));
        $sheet = $spreadsheet->getActiveSheet();

        LazyCollection::make(function () use ($sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $data = [];
                foreach ($row->getCellIterator() as $cell) {
                    $data[] = $cell->getValue();
                }
                yield $data;
            }
        })->skip(1)->chunk(1000)->each(function (LazyCollection $chunk) {
            $records = $chunk->map(function ($row) {
                return [
                    'hotelname' => $row[1] ?? null,
                    'price' => $row[2] ?? null,
                    'location' => $row[3] ?? null,
                    'image' => $row[4] ?? null,
                ];
            })->toArray();

            Offers::insert($records); // Bulk insert
        });

        // Optional: Delete the file after processing
        Storage::delete($path);

        return redirect()->back()->with('message', 'Import successful')->with('message_type', 'success');
    }
}
