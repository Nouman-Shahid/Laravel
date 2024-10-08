@extends('layouts.main')
@extends('Components.navbar')
@section('title', 'Home')

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
    <div class="bg-gray-100  p-10 mb-28 w-screen h-screen ">
        <p class="text-[4vh] font-semibold text-gray-700 my-10 ml-10 underline">Flight Details</p>
        <div class="mx-auto px-4 sm:px-6 lg:px-8  ">
            <div class="flex flex-col md:flex-row m-6 bg-white p-5  ">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300  mb-4">
                        <img class="w-full h-full object-cover" src={{ $data->image }} alt="Product Image">
                    </div>

                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $data->origin }} to
                        {{ $data->destination }}</h2>
                    <p class="text-gray-600  text-sm mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                        ante justo. Integer euismod libero id mauris malesuada tincidunt.
                    </p>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700 ">Price:</span>
                            <span class="text-red-600 font-bold ">PKR {{ $data->amount }}</span>
                        </div>

                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-700">Timmings:</span>
                        <div>
                            <span class="font-bold text-gray-700 ">Depart: {{ $data->depart }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 ">Arrival: {{ $data->arrival }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 ">Travelers: 1</span>
                        </div>
                    </div>

                    <div>
                        <span class="font-bold text-gray-700 ">Flight Description:</span>
                        <p class="text-gray-600 text-sm mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                            sed ante justo. Integer euismod libero id mauris malesuada tincidunt. Vivamus commodo nulla ut
                            lorem rhoncus aliquet. Duis dapibus augue vel ipsum pretium, et venenatis sem blandit. Quisque
                            ut erat vitae nisi ultrices placerat non eget velit. Integer ornare mi sed ipsum lacinia, non
                            sagittis mauris blandit. Morbi fermentum libero vel nisl suscipit, nec tincidunt mi consectetur.
                        </p>
                    </div>
                    <div class="flex -mx-2 mb-4 mt-14">
                        <div class="w-1/2 px-2">
                            <form action="{{ route('checkout', ['id' => $data->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name='_token' value="{{ csrf_token() }}">
                                <button
                                    class="w-full bg-green-500  text-white py-2 px-4 rounded-full font-bold hover:bg-green-600">
                                    Book Flight
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('user.flights') }}"
                            class="w-[24vw] bg-gray-400 text-gray-800 flex justify-center dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-500 ">
                            See more deals</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection











@extends('Components.footer')
