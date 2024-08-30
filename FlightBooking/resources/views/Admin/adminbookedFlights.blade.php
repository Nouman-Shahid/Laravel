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
        <div class="flex w-full h-full justify-end items-end pr-5">

            @if (session('success'))
                <div id="alert-1"
                    class="flex items-center p-4 my-4 border border-red-800 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>

                </div>

                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('alert-1');
                        if (alert) {
                            alert.style.opacity = 0;
                            setTimeout(() => alert.style.display = 'none', 500);
                        }
                    }, 5000);
                </script>
            @endif
        </div>
    </div>
@endsection
