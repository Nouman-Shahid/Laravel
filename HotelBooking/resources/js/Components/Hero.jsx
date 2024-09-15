import React from "react";
import { useForm } from "@inertiajs/inertia-react";

const Hero = () => {
    const { data, setData, post } = useForm({
        location: "",
        arrivalDate: "",
        departureDate: "",
        travelers: 1,
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/search"); // Adjust the route to your actual endpoint
    };

    return (
        <div>
            <div className="relative inline-block">
                <img
                    src="https://rnb.scene7.com/is/image/roomandboard/category_living_subcat01?size=2400,2400&scl=1"
                    className="w-full h-auto opacity-90 object-cover"
                    alt="Room and Board"
                />
                <div className="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center p-6">
                    <p className="text-center font-poppins text-white font-bold text-4xl md:text-5xl lg:text-6xl shadow-lg">
                        Book Your Stay with InnVite
                    </p>
                    <p className="text-center font-poppins text-white text-lg md:text-xl lg:text-2xl mt-4 shadow-md">
                        1,480,130 rooms around the world waiting for you
                    </p>
                    <form onSubmit={handleSubmit}>
                        <div className="absolute bottom-0 left-1/2 transform -translate-x-1/2 mb-6 w-full max-w-4xl px-4">
                            <div className="bg-white p-6 rounded-lg shadow-lg flex flex-col lg:flex-row gap-4">
                                <div className="flex-1">
                                    <label
                                        htmlFor="location"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Location
                                    </label>
                                    <input
                                        type="text"
                                        required
                                        name="location"
                                        value={data.location}
                                        onChange={handleChange}
                                        className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Enter location"
                                    />
                                </div>
                                <div className="flex-1">
                                    <label
                                        htmlFor="arrival-date"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Arrival Date
                                    </label>
                                    <input
                                        type="date"
                                        required
                                        name="arrivalDate"
                                        value={data.arrivalDate}
                                        onChange={handleChange}
                                        className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div className="flex-1">
                                    <label
                                        htmlFor="departure-date"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Departure Date
                                    </label>
                                    <input
                                        type="date"
                                        required
                                        name="departureDate"
                                        value={data.departureDate}
                                        onChange={handleChange}
                                        className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div className="flex-1">
                                    <label
                                        htmlFor="travelers"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Number of Travelers
                                    </label>
                                    <input
                                        type="number"
                                        name="travelers"
                                        min="1"
                                        value={data.travelers}
                                        onChange={handleChange}
                                        className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="1"
                                    />
                                </div>
                                <div className="flex items-end">
                                    <button
                                        type="submit"
                                        className="w-full bg-[#1D64EC] text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-indigo-700"
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default Hero;
