import React from "react";
import Footer from "@/Components/Footer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const Cart = ({ bookedHotels, auth }) => {
    return (
        <>
            <AuthenticatedLayout
                user={auth.user}
                header={
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Your Booked Hotels
                    </h2>
                }
            >
                <Head title="Cart" />
                <div className="max-w-7xl mx-auto p-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {bookedHotels.length > 0 ? (
                            bookedHotels.map((item) => (
                                <div
                                    className="bg-white rounded-lg shadow-lg overflow-hidden"
                                    key={item.id}
                                >
                                    <img
                                        className="w-full h-48 object-cover"
                                        src={item.image} // Assuming image URL is in item.deal
                                        alt={item.hotelname}
                                    />
                                    <div className="p-4">
                                        <h3 className="text-lg font-semibold">
                                            {item.hotelname}
                                        </h3>
                                        <p className="text-gray-600">
                                            {item.location}
                                        </p>
                                        <div className="mt-4">
                                            <p className="text-gray-500">
                                                Check-in:{" "}
                                                <span className="font-medium">
                                                    01 Jan 2024
                                                </span>
                                            </p>
                                            <p className="text-gray-500">
                                                Check-out:{" "}
                                                <span className="font-medium">
                                                    05 Jan 2024
                                                </span>
                                            </p>
                                        </div>
                                        <div className="mt-4">
                                            <p className="text-gray-700">
                                                Total:{" "}
                                                <span className="font-bold">
                                                    ${item.price}
                                                </span>
                                            </p>
                                            <p className="text-sm text-gray-500">
                                                Reservation ID:{" "}
                                                <span className="font-medium">
                                                    #123456
                                                </span>
                                            </p>
                                        </div>
                                        <button className="mt-4 bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition">
                                            Cancel Bookings
                                        </button>
                                    </div>
                                </div>
                            ))
                        ) : (
                            <div className="col-span-full text-center">
                                <p className="text-gray-500">
                                    No booked hotels found.
                                </p>
                            </div>
                        )}
                    </div>
                </div>
            </AuthenticatedLayout>
            <Footer />
        </>
    );
};

export default Cart;
