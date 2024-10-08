@section('sidebar')
    <div class="flex flex-col w-[18vw] text-white bg-[#111127] h-screen p-5">
        <div class="flex">
            <p class="font-mono text-[3vh] ">Admin Panel</p>
        </div>

        <div class="flex mt-10">
            <ul class="w-full space-y-5">
                <a href="{{ route('admindashboard') }}" class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=XnHBz2LnhELw&format=png" class="size-[3vh]">
                    <li>Dasboard</li>
                </a>
                <a href="{{ route('admin.hoteldata') }}" class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=64&id=42824&format=png" class="size-[3vh]">
                    <li>Hotels Deals</li>
                </a>
                <a href="{{ route('admin.bookedhoteldata') }}"
                    class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=64&id=46906&format=png" class="size-[3vh]">
                    <li>Booked Hotels</li>
                </a>
                <a href="{{ route('admin.userdata') }}" class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=K7ebDTcbruY8&format=png" class="size-[3vh]">
                    <li>Users Data</li>
                </a>
                <a href="{{ route('import.form') }}"class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=80&id=SgATUH6y3S3X&format=png" class="size-[3vh]">
                    <li>Import Data</li>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=64&id=42850&format=png" class="size-[3vh]">
                    <li>Settings</li>
                </a>
                <a href="{{ route('logout') }}" class="flex hover:bg-blue-800 items-center h-[5vh] space-x-4">
                    <img src="https://img.icons8.com/?size=48&id=13925&format=png" class="size-[3vh]">
                    <li>Logout</li>
                </a>
            </ul>
        </div>
    </div>
@endsection
