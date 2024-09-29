@extends('layouts.main')
@section('title', 'Admin')

@extends('components.sidebar')

{{-- Dashboard --}}
@section('content')

    <div class="flex flex-col w-[82vw] bg-slate-100 h-auto justify-start items-center mt-20">


        <div class="flex w-[94%] justify-between items-center">
            <p class="text-[3vh] font-bold">Hotel's Data</p>
            <a href="{{ route('import.form') }}" class="bg-green-500 p-2 text-white font-bold">Add New</a>
        </div>

        <table class=" w-[96%] bg-white shadow-md rounded-lg overflow-hidden mt-7">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="px-6 py-3 border-b border-gray-300">Id</th>
                    <th class="px-6 py-3 border-b border-gray-300">Image</th>
                    <th class="px-6 py-3 border-b border-gray-300"> Hotel Name</th>
                    <th class="px-6 py-3 border-b border-gray-300">Location</th>
                    <th class="px-6 py-3 border-b border-gray-300">Price</th>
                    <th class="px-6 py-3 border-b border-gray-300">Created At</th>
                    <th class="px-6 py-3 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $hotelsdata)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="px-6 py-3 border-b border-gray-300">{{ $hotelsdata->id }}</td>
                        <td class="px-6 py-3 border-b border-gray-300 size-36">
                            <img src={{ $hotelsdata->image }}>
                        </td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $hotelsdata->hotelname }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $hotelsdata->location }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $hotelsdata->price }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">
                            {{ \Carbon\Carbon::parse($hotelsdata->created_at)->format('M d, Y') }}
                        </td>

                        <td><a href="{{ route('deletehoteldata', ['id' => $hotelsdata->id]) }}"
                                class="bg-red-600 text-white py-1 px-2">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6">

            {{ $data->links() }}
        </div>

        <x-alert />


    </div>
@endsection