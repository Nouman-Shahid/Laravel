<?php

namespace App\Imports;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\HotelDeals;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HotelsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        Log::info('Processing row: ', $row);

        $createdAt = isset($row['created_at']) ? $this->convertExcelDate($row['created_at']) : null;

        return new HotelDeals([
            'id' => $row['id'],
            'hotelname' => $row['hotelname'] ?? null,
            'price' => $row['price'] ?? null,
            'location' => $row['location'] ?? null,
            'image' => $row['image'] ?? null,
            'hotelImage' => $row['hotelImage'] ?? null,
            'receptionImage' => $row['receptionImage'] ?? null,
            'roomImage1' => $row['roomImage1'] ?? null,
            'roomImage2' => $row['roomImage2'] ?? null,
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
}
