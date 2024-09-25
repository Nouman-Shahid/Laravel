<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdminController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        // Storing file in temporarily location
        $path = $request->file('file')->store('uploads');

        // Loading the XLSX file from temporary location
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

            Offers::insert($records); // Bulk records are inserted
        });

        //Deleting the file after processing
        Storage::delete($path);

        return redirect()->back()->with('message', 'Import successful')->with('message_type', 'success');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }



    public function showDashboard()
    {
        // Fetch data 
        // where function Role() is a scope defined in admin model
        $userCount = User::where('role', 'user')->count();
        $hotelCount = Offers::count();
        $bookedhotelCount = User::count();

        return view('admin.admindashboard', [
            'userCount' => $userCount,
            'hotelCount' => $hotelCount,
            'bookedhotelCount' => $bookedhotelCount,
        ]);
    }




    //User Data Read
    public function showUsers()
    {
        $data = User::where('role', 'user')->paginate(9);

        return view('admin.adminuser', ['data' => $data]);
    }

    // Delete User Data
    public function deleteUserData(string $id)
    {
        User::where('id', $id)->delete();

        $message = "User with id: {$id} removed successfully";
        return redirect()->route("admin.userdata")->with('success', $message);
    }

    //Hotel Data Read
    public function showHotelData()
    {
        $data = Offers::paginate(3);

        return view('admin.adminhoteldata', ['data' => $data]);
    }

    // Delete Hotel Data
    public function deleteHotelData(string $id)
    {
        Offers::where('id', $id)->delete();

        $message = "User with id: {$id} removed successfully";
        return redirect()->route("admin.hoteldata")->with('success', $message);
    }
}
