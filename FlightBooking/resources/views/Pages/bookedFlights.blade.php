@extends('layouts.main')
@extends('Components.navbar')
@section('title', 'Bookings')
@section('navbarbtns')
    <div class="flex space-x-5 justify-center items-center">


        <a href="{{ route('logout') }}" class="bg-blue-500 rounded-xl hover:bg-blue-600 p-2 text-white text-semibold">
            Logout
        </a>
        <a href="{{ route('bookedFlights') }}">
            <img src="https://cdn-icons-png.flaticon.com/128/2570/2570687.png" class="size-[5vh]">
        </a>
        <p
            class="bg-orange-500 rounded-[50%] size-[6vh] flex items-center justify-center font-semibold text-[3.5vh] text-white cursor-pointer">
            {{ substr(Auth::user()->name, 0, 1) }}
        </p>
    </div>

@endsection


@section('content')
    <div class="flex flex-col w-screen bg-slate-100 h-auto justify-start items-start ">

        <p class="px-7 text-[5vh] font-semibold my-5 underline">Booked Flights</p>

        @foreach ($data as $item => $booking)
            <div class="flex w-[75%] h-[45vh] border border-gray-400 m-5 p-3 justify-between ">
                <div class="flex  w-[30%]">
                    <img src={{ $booking->image }} class='w-full'>
                </div>
                <div class="flex flex-col 400 w-[80%] justify-between">
                    <div class="flex flex-col h-[5vh] px-3">
                        <p>
                            <span class="font-bold text-gray-700">{{ $booking->origin }}</span> -
                            <span class="font-bold text-gray-700">{{ $booking->destination }}</span>
                        </p>
                        <p class="font-bold text-gray-600 text-[2vh]">
                            Flight: Economy
                        </p>

                    </div>
                    <div class="flex h-[20vh] justify-between px-3">
                        <div class="flex flex-col justify-center w-[10vw]  space-y-3">
                            <div class="flex items-center space-x-1">
                                <img src="https://cdn-icons-png.flaticon.com/128/15635/15635783.png" class="size-[3vh]">
                                <p class="text-[1.5vh] font-semibold">Take off</p>
                            </div>
                            <p class="font-bold text-gray-600 text-[2vh]">
                                {{ \Carbon\Carbon::parse($booking->depart)->format('M d, Y') }}
                            </p>
                            <p class="font-bold">7:30 AM</p>
                            <p class="text-[1.8vh]">Airport: <span class="font-semibold">MXP</span> </p>
                        </div>

                        <div class="flex items-center mt-4">
                            <hr class="w-40 h-[0.1vh] mx-auto my-4 bg-gray-400 border-0 rounded md:my-10 ">
                        </div>

                        <div class="flex flex-col  justify-center items-center  w-[10vw] space-y-3">
                            <div class="flex items-center space-x-1">
                                <img src="https://cdn-icons-png.flaticon.com/128/76/76510.png" class="size-[6vh]">
                            </div>
                            <img src="https://img.icons8.com/?size=40&id=53046&format=png" class="size-[3vh]" />
                            <p class="text-[1.8vh]">7h 30m <span class="font-semibold">(Nonstop)</span> </p>
                        </div>
                        <div class="flex items-center mt-4">
                            <hr class="w-40 h-[0.1vh] mx-auto my-4 bg-gray-400 border-0 rounded md:my-10 ">
                        </div>



                        <div class="flex flex-col  items-end justify-center  w-[10vw] space-y-3">
                            <div class="flex items-center space-x-2">
                                <img src="https://cdn-icons-png.flaticon.com/128/4538/4538767.png" class="size-[3vh]">
                                <p class="text-[1.5vh] font-semibold">Landing</p>
                            </div>
                            <p class="font-bold text-gray-600 text-[2vh]">
                                {{ \Carbon\Carbon::parse($booking->arrival)->format('M d, Y') }}
                            </p>
                            <p class="font-bold">3:00 PM</p>
                            <p class="text-[1.8vh]">Airport: <span class="font-semibold">MAD</span> </p>
                        </div>




                    </div>


                    <div class="flex  h-[10vh] px-3 justify-between">

                        <div class="flex flex-col ">
                            <p class="text-gray-500 text-[2vh]">Price : <span class="text-red-600 font-bold">PKR
                                    {{ $booking->amount }}</span></p>
                            <p class="text-gray-500 text-[2vh]">Travelers: 1</p>
                            <p class="text-gray-500 text-[2vh]">Round trip</p>
                        </div>

                        <div class="flex  items-end ">

                            <a href="{{ route('cancelflight', ['id' => $booking->id]) }}"
                                class="p-3 bg-red-500 hover:bg-red-600 text-white font-semibold">
                                Cancel Flight
                            </a>

                        </div>

                    </div>


                </div>

            </div>
        @endforeach
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


@extends('Components.footer')
