@extends('layouts.main')
@extends('components.navbar')
@section('title', 'Admin')
@extends('components.sidebar')

{{-- Dashboard --}}
@section('content')

    <div class="flex w-[94%] justify-between items-center">
        <p class="text-[3vh] font-bold">User's Data</p>
        <a href="{{ route('addform') }}" class="bg-green-500 p-2 text-white font-bold">Add New</a>
    </div>

    <table class=" w-[96%] bg-white shadow-md rounded-lg overflow-hidden mt-7">
        <thead>
            <tr class="bg-gray-200 text-center">
                <th class="px-6 py-3 border-b border-gray-300">Id</th>
                <th class="px-6 py-3 border-b border-gray-300"> Name</th>
                <th class="px-6 py-3 border-b border-gray-300">Email</th>
                <th class="px-6 py-3 border-b border-gray-300">Create At</th>
                <th class="px-6 py-3 border-b border-gray-300">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item => $user)
                <tr class="hover:bg-gray-50 text-center">
                    <td class="px-6 py-3 border-b border-gray-300">{{ $user->id }}</td>
                    <td class="px-6 py-3 border-b border-gray-300">{{ $user->name }}</td>
                    <td class="px-6 py-3 border-b border-gray-300">{{ $user->email }}</td>
                    <td class="px-6 py-3 border-b border-gray-300">{{ $user->created_at }}</td>
                    <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"
                            class="bg-red-600 text-white py-1 px-2">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-16">

        {{ $data->links() }}
    </div>
@endsection

@extends('components.footer')
