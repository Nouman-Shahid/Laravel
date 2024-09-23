import React from "react";
import Footer from "@/Components/Footer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const SearchedResults = ({ results, count, auth }) => {
    return (
        <>
            <AuthenticatedLayout
                user={auth.user}
                header={
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Your Search
                    </h2>
                }
            >
                <Head title="Searched Results" />
                <div className="p-6 max-w-7xl mx-auto mb-10">
                    <p className="text-md font-bold mb-4 text-gray-500 ">
                        Total Results: {count}
                    </p>
                    <div className="grid grid-cols-1 gap-6">
                        {results.map((result) => (
                            <div
                                key={result.id}
                                className="bg-white border border-gray-200 rounded-lg shadow-md flex"
                            >
                                <img
                                    src={result.image}
                                    alt={result.hotelname}
                                    className="w-1/3 h-[full] object-cover rounded-l-lg"
                                />
                                <div className="flex-1 p-4 flex flex-col">
                                    <div className="flex-1">
                                        <h2 className="text-lg font-semibold mb-2">
                                            {result.hotelname}
                                        </h2>
                                        <p className="text-gray-600 mb-4">
                                            {result.location}
                                        </p>
                                        <p className="text-xl font-bold text-gray-900 mb-4">
                                            from ${result.price}/night
                                        </p>
                                        <p className="text-gray-700 mb-4">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur ac orci odio. Pellentesque
                                            habitant morbi tristique senectus et
                                            netus et malesuada fames ac turpis
                                            egestas.
                                        </p>
                                    </div>
                                    <div className="flex justify-end mt-auto">
                                        <a
                                            href={`/checkout/${result.id}`}
                                            className="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600"
                                        >
                                            Book Hotel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </AuthenticatedLayout>

            <Footer />
        </>
    );
};

export default SearchedResults;
