@extends('layouts.main')
@section('title', 'Admin')
@extends('components.sidebar')

{{-- Dashboard --}}
@section('content')

    <div class="flex flex-col w-[82vw] bg-slate-100 h-auto justify-start items-center mt-20">


        <div class="flex w-[94%] justify-between items-center">
            <p class="text-[3vh] font-bold">Booked Flights</p>
        </div>

        <table class=" w-[96%] bg-white shadow-md rounded-lg overflow-hidden mt-7">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="px-6 py-3 border-b border-gray-300">Id</th>
                    <th class="px-6 py-3 border-b border-gray-300"> User Id</th>
                    <th class="px-6 py-3 border-b border-gray-300">User Email</th>
                    <th class="px-6 py-3 border-b border-gray-300">Flight Id</th>
                    <th class="px-6 py-3 border-b border-gray-300">Booked Date</th>
                    <th class="px-6 py-3 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $bookedFlights)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="px-6 py-3 border-b border-gray-300">{{ $bookedFlights->id }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $bookedFlights->user_id }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $bookedFlights->user_email }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $bookedFlights->flight_id }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">
                            {{ \Carbon\Carbon::parse($bookedFlights->created_at)->format('M d, Y') }}</td>
                        <td><a href="{{ route('admin.deletebookedFlights', ['id' => $bookedFlights->id]) }}"
                                class="bg-red-600 text-white py-1 px-2">Cancel Flight</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-16">

            {{ $data->links() }}
        </div>

        <x-alert />
    </div>
@endsection
