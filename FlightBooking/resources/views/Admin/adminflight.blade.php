@extends('layouts.main')
@section('title', 'Admin')
@extends('Components.navbar')

@extends('components.sidebar')

{{-- Dashboard --}}
@section('content')

    <div class="flex flex-col w-[82vw] bg-slate-100 h-screen justify-start items-center mt-20">


        <div class="flex w-[94%] justify-between items-center">
            <p class="text-[3vh] font-bold">Flight's Data</p>
            <a href="{{ route('addform') }}" class="bg-green-500 p-2 text-white font-bold">Add New</a>
        </div>

        <table class=" w-[96%] bg-white shadow-md rounded-lg overflow-hidden mt-7">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="px-6 py-3 border-b border-gray-300">Id</th>
                    <th class="px-6 py-3 border-b border-gray-300"> Origin</th>
                    <th class="px-6 py-3 border-b border-gray-300">Destination</th>
                    <th class="px-6 py-3 border-b border-gray-300">Amount</th>
                    <th class="px-6 py-3 border-b border-gray-300">Depart</th>
                    <th class="px-6 py-3 border-b border-gray-300">Arrival</th>
                    <th class="px-6 py-3 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $flights)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->id }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->origin }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->destination }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->amount }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->depart }}</td>
                        <td class="px-6 py-3 border-b border-gray-300">{{ $flights->arrival }}</td>
                        <td><a href="{{ route('deleteflight', ['id' => $flights->id]) }}"
                                class="bg-red-600 text-white py-1 px-2">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-16">

            {{ $data->links() }}
        </div>

    </div>
@endsection

@extends('components.footer')
