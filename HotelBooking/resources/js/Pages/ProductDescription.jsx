import Footer from "@/Components/Footer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import React from "react";

const ProductDescription = ({ product, auth }) => {
    return (
        <>
            <AuthenticatedLayout
                user={auth.user}
                header={
                    <h2 className="font-semibold text-xl text-gray-800leading-tight">
                        Description
                    </h2>
                }
            >
                <Head title="User Management" />

                <div className="flex flex-col items-center border border-blue-700 h-screen w-screen ">
                    <main className="border border-red-600 h-[60vh] w-screen px-16 py-6  flex space-x-4">
                        <div className="flex h-[full] w-[50%] rounded-2xl">
                            <img
                                src={product.image}
                                className="rounded-2xl w-full h-[53vh]"
                            />
                        </div>
                        <div className="flex h-[50v] w-[25%] flex-col space-y-4">
                            <div className="flex w-full rounded-2xl">
                                <img
                                    src={product.hotelImage}
                                    className="rounded-2xl w-full   h-[25.5vh]"
                                />
                            </div>
                            <div className="flex w-full rounded-2xl">
                                <img
                                    src={product.receptionImage}
                                    className="rounded-2xl w-full   h-[25.5vh]"
                                />
                            </div>
                        </div>
                        <div className="flex h-[50vh] w-[25%] flex-col space-y-5">
                            <div className="flex w-full rounded-2xl">
                                <img
                                    src={product.roomImage1}
                                    className="rounded-2xl w-full   h-[25.5vh]"
                                />
                            </div>
                            <div className="flex w-full rounded-2xl">
                                <img
                                    src={product.roomImage2}
                                    className="rounded-2xl w-full  h-[25.5vh]"
                                />
                            </div>
                        </div>
                    </main>

                    <div className="flex flex-col text-start w-screen px-16">
                        <p className="font-poppins font-semibold text-xl">
                            {product.hotelname}
                        </p>
                        <p className=" text-gray-600 ">
                            5 star hotel located in {product.location}
                        </p>
                    </div>
                </div>
            </AuthenticatedLayout>

            <Footer />
        </>
    );
};

export default ProductDescription;
