<?php

namespace App\Imports;

use App\Models\HotelDeals;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class HotelsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        Log::info('Processing row: ', $row);

        Log::info('Hotel name: ' . ($row['hotelname'] ?? 'NULL'));
        Log::info('Price: ' . ($row['price'] ?? 'NULL'));
        Log::info('Location: ' . ($row['location'] ?? 'NULL'));
        Log::info('Image: ' . ($row['image'] ?? 'NULL'));
        Log::info('Created at: ' . ($row['created_at'] ?? 'NULL'));

        if (empty($row['hotelname']) || empty($row['price']) || empty($row['location']) || empty($row['image'])) {
            Log::warning('Missing required fields in row: ', $row);
            return null;
        }

        $createdAt = isset($row['created_at']) ? $this->convertExcelDate($row['created_at']) : null;

        return new HotelDeals([
            'hotelname' => $row['hotelname'],
            'price' => $row['price'],
            'location' => $row['location'],
            'image' => $row['image'],
            'created_at' => $createdAt,
        ]);
    }

    private function convertExcelDate($excelDate)
    {
        try {
            $date = is_numeric($excelDate) ? Date::excelToDateTimeObject($excelDate) : new Carbon($excelDate);
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            Log::error('Date conversion error: ' . $e->getMessage());
            return null;
        }
    }

    public function chunkSize(): int
    {
        return 100; // Number of rows to process per chunk
    }
}
