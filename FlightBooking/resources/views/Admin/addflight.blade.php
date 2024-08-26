@extends('layouts.main')
@extends('components.navbar')
@section('title', 'Admin')
@extends('components.sidebar')

@section('content')

    <div class="isolate bg-gray-50 px-6 py-2 sm:py-4 lg:px-[20vh] ">

        <div class="mx-auto max-w-4xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Add Flight </h2>

        </div>
        <form action="{{ route('addflight') }}" method="POST" class="mx-auto mt-4 max-w-xl sm:mt-20">
            @csrf
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-black">Depart Date</label>
                    <div class="mt-2.5">
                        <input type="date" name="depart" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-black">Arrival Date</label>
                    <div class="mt-2.5">
                        <input type="date" name="arrival" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="company" class="block text-sm font-semibold leading-6 text-black">Origin</label>
                    <div class="mt-2.5">
                        <input type="text" name="origin" required placeholder="Enter Origin"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Destination</label>
                    <div class="mt-2.5">
                        <input type="text" name="destination" required placeholder="Enter Destination"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Amount</label>
                    <div class="mt-2.5">
                        <input type="number" name="amount" placeholder="Enter Amount" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                    </div>
                </div>

            </div>
            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-green-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add
                </button>
            </div>
        </form>

    </div>
@endsection


@extends('components.footer')
