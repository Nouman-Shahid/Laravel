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

    <div class="flex flex-col w-screen bg-slate-100 h-auto justify-start items-center">

        <div class="relative inline-block">
            <img src="https://www.qatarairways.com/content/dam/images/renditions/horizontal-1/campaigns/global/destinations-promo/hn-summer-destinations-europe.jpg"
                alt="Europe Destination" class="block w-full h-auto ">
            <p class="absolute top-10 left-8 text-gray-200 text-[5vh] font-mono font-semibold p-4">Embark on a new adventure
                <br>
                to
                Europe
            </p>
            <p class="absolute top-60 left-8 text-gray-50 bg-gray-800 bg-opacity-55 text-[2.8vh] font-mono font-bold p-4">
                Fares starting from PKR
                135,000*</p>


            <a href=""
                class="absolute top-80 left-8 bg-transparent font-semi hover:bg-gray-50 hover:text-gray-800 border-white border-[0.4vh] 
                p-2 text-[2.8vh] text-white rounded-2xl">
                See Deals</a>

        </div>



        {{-- Search Flight Form --}}
        <div class="flex flex-col bg-[#FFFFFF] p-8 mt-[-10vh] z-50">

            <div class="flex space-x-2 items-center">
                <img src="https://img.icons8.com/?size=40&id=53046&format=png" class="size-[4.5vh]">
                <p>Book a flight</p>

            </div>

            <div class="flex space-x-5 mt-5">
                <form action="" method="POST" class="border-[0.3vh] border-gray-300 p-2">
                    @csrf
                    <input type="text" name="origin" placeholder="From" required class="p-2 h-[7vh]">
                    <input type="text" name="destination" placeholder="To" required class="p-2 h-[7vh]">
                    <input type="date" name="depart" required class="p-2 h-[7vh]">
                    <input type="date" name="arrival" required class="p-2 h-[7vh]">
                    <input type="number" min="1" name="travelers" required placeholder="Travelers"
                        class="p-2 h-[7vh]">

                    <button type="submit"
                        class="bg-[#8E2157] hover:bg-[#7e2351] py-3 px-8 rounded-2xl text-white font-semibold">Submit</button>
                </form>
            </div>

        </div>



        <p class="text-[4vh] mt-14 w-screen flex justify-start py-3 px-10 ">Our latest flight deals</p>


        {{-- Flight Deals --}}
        <div class="flex items-center justify-between h-auto w-[80%] flex-wrap gap-8 mt-8 py-16">
            @foreach ($data as $flights)
                <div
                    class="relative bg-white shadow-lg rounded-lg h-auto w-[50vh] cursor-pointer overflow-hidden group transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-2xl">
                    <div class="relative">
                        <img src="{{ $flights->image }}" alt="Flight Image"
                            class="w-full h-64 object-cover rounded-t-lg group-hover:opacity-80 transition-opacity duration-300">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-20 group-hover:opacity-40 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="p-6 bg-gradient-to-t from-gray-50 to-white">
                        <h2
                            class="text-2xl font-bold text-gray-800 mb-3 transition-transform duration-300 group-hover:translate-x-1 group-hover:text-blue-600">
                            {{ $flights->origin }} to {{ $flights->destination }}
                        </h2>
                        <p class="text-gray-700 mb-3">
                            <span class="font-semibold text-blue-600">Amount:</span>
                            <span class="text-red-600 font-bold">PKR {{ number_format($flights->amount, 2) }}</span>
                        </p>
                        <p class="text-gray-700 mb-3">
                            <span class="font-semibold text-blue-600">Departure:</span>
                            {{ \Carbon\Carbon::parse($flights->depart)->format('M d, Y') }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold text-blue-600">Arrival:</span>
                            {{ \Carbon\Carbon::parse($flights->arrival)->format('M d, Y') }}
                        </p>
                    </div>
                    <div class=" p-4">
                        <a href="{{ route('user.Singleflights', ['id' => $flights->id]) }}"
                            class="block bg-blue-600 text-white text-center py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
            <hr class="w-full h-[0.1vh] mx-auto my-4 bg-gray-400 border-0 rounded ">


            <div class="flex flex-col space-y-3 bg-gradient-to-t from-gray-50 to-white p-5">
                <h2 class="font-bold text-gray-700 text-[3vh]">Why AirPlan?</h2>
                <p>It is no longer an uphill battle to get the lowest airfare and book tickets online. AirPlan is all
                    about making travel
                    easy, affordable and simple. From international flights to domestic flights; from early morning flights
                    to late night flights,
                    from cheap flights to luxurious ones. AirPlan helps you complete your flight booking in just a few
                    clicks. Your online
                    flight booking experience is seamless with our features.</p>

            </div>
            <div class="flex flex-col  space-y-3 bg-gradient-to-t from-gray-50 to-white p-5">
                <h2 class="font-bold text-gray-700 text-[3vh]">What are the benefits of booking flights online with
                    AirPlan?</h2>
                <p>Get the best flight fares with exciting flight offers on your air ticket when you
                    book
                    with AirPlan. Unmissable sales and deals like Travel Max Sale, Big Travel Sale,
                    AirPlan Tatkaal, etc. offer never-seen-before discounts that help you book flights
                    at affordable rates. Best flight discounts await you when you book with
                    bank cards like ICICI, Bank of Baroda, HDFC, Axis, Kotak etc.</p>
            </div>
            <div class="flex flex-col  space-y-3 bg-gradient-to-t from-gray-50 to-white p-5">
                <h2 class="font-bold text-gray-700 text-[3vh]">What’s more?</h2>
                <p>Flight ticket booking or planning your travel is made simpler with our round trip and multicity options.
                    When you hit enter, your search list page shows the results for both onward and return in a split screen
                    format letting you choose flights in one go for a round trip. The multicity search page shows a list of
                    complete itineraries that removes the hassle of you calculating time, transfers and layovers letting you
                    finish your online flight booking. To ensure you get the best price we highlight offers, sales and other
                    promotions on the checkout page. Post booking, our portal allows for easy cancellations or amendments
                    without having to make calls to the airlines.</p>
            </div>

        </div>

    </div>











    </div>
@endsection

@extends('Components.footer')
