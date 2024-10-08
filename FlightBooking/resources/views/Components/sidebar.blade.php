@section('sidebar')
    {{-- sidebar --}}
    <div class="flex flex-col w-[18vw] text-white bg-[#111127] h-screen p-5">
        <div class="flex">
            <p class="font-mono text-[3vh] ">Admin Panel</p>
        </div>

        <div class="flex mt-10">
            <ul class="w-full space-y-5">
                <a href="{{ route('admin.admindashboard') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=XnHBz2LnhELw&format=png" class="size-[3vh]">
                    <li>Dasboard</li>
                </a>
                <a href="{{ route('admin.flights') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=64&id=46906&format=png" class="size-[3vh]">
                    <li>Flight Tickets</li>
                </a>
                <a href="{{ route('admin.userdata') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=K7ebDTcbruY8&format=png" class="size-[3vh]">
                    <li>Users Data</li>
                </a>
                <a href="{{ route('admin.bookedFlights') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=80&id=SgATUH6y3S3X&format=png" class="size-[3vh]">
                    <li>Booked Flights</li>
                </a>
                <a href=""class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=64&id=42850&format=png" class="size-[3vh]">
                    <li>Settings</li>
                </a>
                <a href="{{ route('view.home') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=13925&format=png" class="size-[3vh]">
                    <li>Logout</li>
                </a>
            </ul>
        </div>
    </div>
@endsection
