import ApplicationLogo from "@/Components/ApplicationLogo";
import Footer from "@/Components/Footer";
import Hero from "@/Components/Hero";
import NavBar from "@/Components/Navbar";
import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth, hotelData, hotelDeals }) {
    return (
        <>
            <Head title="Home" />

            <NavBar auth={auth} />

            <Hero />

            <div className="flex flex-col p-10">
                <p className="font-poppins text-[3vh] font-semibold mx-10 my-8">
                    Popular Destinations
                </p>

                <div className="flex space-x-10 justify-center items-center">
                    <div className=" h-[50vh] w-[20vw] relative">
                        <img
                            src={hotelData[0].images}
                            className="h-full rounded-2xl  w-full object-cover"
                            alt="Destination"
                        />
                        <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                            {hotelData[0]?.destinations || "No data"}
                        </p>
                    </div>

                    <div className="flex flex-col justify-between h-[50vh] w-[20vw] space-y-6">
                        <div className=" h-[26vh] relative">
                            <img
                                src={hotelData[1].images}
                                className="w-full rounded-2xl  h-full object-cover"
                                alt="Destination"
                            />
                            <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                                {hotelData[1]?.destinations || "No data"}
                            </p>
                        </div>
                        <div className=" h-[20vh] relative">
                            <img
                                src={hotelData[4].images}
                                className="w-full rounded-2xl  h-full object-cover"
                                alt="Destination"
                            />
                            <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                                {hotelData[4]?.destinations || "No data"}
                            </p>
                        </div>
                    </div>

                    <div className="h-[50vh] w-[20vw] relative">
                        <img
                            src={hotelData[2].images}
                            className="h-full rounded-2xl  w-full object-cover"
                            alt="Destination"
                        />
                        <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                            {hotelData[2]?.destinations || "No data"}
                        </p>
                    </div>

                    <div className="flex flex-col justify-between h-[50vh] w-[20vw] space-y-6">
                        <div className=" h-[20vh] relative">
                            <img
                                src={hotelData[5].images}
                                className="w-full h-full rounded-2xl object-cover"
                                alt="Destination"
                            />
                            <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                                {hotelData[5]?.destinations || "No data"}
                            </p>
                        </div>
                        <div className=" h-[26vh] relative">
                            <img
                                src={hotelData[3].images}
                                className="w-full h-full rounded-2xl object-cover"
                                alt="Destination"
                            />
                            <p className="absolute left-5 bottom-10 px-5 py-1 bg-white text-text font-poppins font-semibold opacity-80">
                                {hotelData[3]?.destinations || "No data"}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div className="flex p-10 flex-col">
                <p className="font-poppins text-[3vh] font-semibold mx-10 my-8">
                    Hotels loved by guests
                </p>

                <div className="flex space-x-10 justify-center items-center">
                    {hotelDeals.map((item) => (
                        <a
                            key={item.id}
                            href={`/room/id/${item.id}`}
                            className="flex flex-col hover:scale-105 cursor-pointer transition border border-gray-300 h-[35vh] w-[15.5vw] rounded-2xl p-1 bg-[#F4F4F4] relative"
                        >
                            <img
                                src={item.image}
                                className="h-[60%] w-full rounded-2xl"
                                alt={item.hotelname}
                            />
                            <div className="flex flex-col p-2 space-y-1">
                                <p className="font-poppins font-semibold text-gray-700">
                                    {item.hotelname}
                                </p>
                                <p className="font-poppins text-gray-500">
                                    {item.location}
                                </p>
                                <p className="font-poppins font-semibold">
                                    from {item.price}/night
                                </p>
                            </div>
                            <button className="absolute right-2 bottom-2 bg-blue-500 text-white rounded-full py-2 px-3 hover:bg-blue-600 transition">
                                ➔
                            </button>
                        </a>
                    ))}
                </div>
            </div>

            <div className="flex flex-col space-y-4 bg-slate-50 p-10 mx-10 mt-10">
                <p className="font-poppins font-bold">Why InnVite?</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Obcaecati velit mollitia ullam placeat eos accusantium totam
                    rerum eligendi quas alias pariatur voluptate, maiores, sit
                    autem voluptatem et corrupti quam consequatur. Velit et
                    alias error? Numquam quod molestias animi vero placeat.
                </p>
            </div>

            <Footer />
        </>
    );
}
