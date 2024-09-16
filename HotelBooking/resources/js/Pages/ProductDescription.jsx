import Footer from "@/Components/Footer";
import ProductCard from "@/Components/ProductCard";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import React from "react";

const ProductDescription = ({ product, auth }) => {
    let icons = [
        {
            name: "Wifi",
            icon: "https://cdn-icons-png.flaticon.com/128/11530/11530392.png",
        },
        {
            name: "Air Conditioning",
            icon: "https://cdn-icons-png.flaticon.com/128/959/959711.png",
        },
        {
            name: "Private Bathroom",
            icon: "https://cdn-icons-png.flaticon.com/128/1018/1018552.png",
        },
        {
            name: "Key Card Access",
            icon: "https://cdn-icons-png.flaticon.com/128/657/657076.png",
        },
        {
            name: "Free Parking",
            icon: "https://cdn-icons-png.flaticon.com/128/905/905535.png",
        },
        {
            name: "Free Food",
            icon: "https://cdn-icons-png.flaticon.com/128/1046/1046857.png",
        },
        {
            name: "24 hour service",
            icon: "https://cdn-icons-png.flaticon.com/128/899/899054.png",
        },
    ];

    return (
        <>
            <AuthenticatedLayout
                user={auth.user}
                header={
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Description
                    </h2>
                }
            >
                <Head title="Product Description" />

                <div className="flex flex-col items-center h-auto w-screen  ">
                    <main className=" h-[60vh] w-screen px-16 py-6  flex space-x-4">
                        <div className="flex h-[full] w-[50%] rounded-2xl">
                            <img
                                src={product.image}
                                className="rounded-2xl w-full h-[53vh]"
                            />
                        </div>
                        <div className="flex h-[50v] w-[25%] flex-col space-y-4">
                            <div className="flex w-full rounded-2xl">
                                <img
                                    src={product.hotel_Image}
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
                        <div className="flex w-full justify-between">
                            <p className="text-gray-600 ">
                                5 star hotel located in {product.location}
                            </p>
                            <div className="flex items-center space-x-4 ">
                                <div>
                                    <p className="text-sm text-green-600 font-semibold">
                                        Excellent
                                    </p>
                                    <p className="text-sm text-gray-400">
                                        1,920 reviews
                                    </p>
                                </div>
                                <div>
                                    <p className="bg-yellow-100 px-4 rounded-3xl text-red-700 font-semibold">
                                        9.6
                                    </p>
                                </div>
                            </div>
                        </div>

                        <p className="font-poppins font-semibold text-xl mt-10">
                            Property Overview
                        </p>
                        <div className="flex  w-full h-[40vh] mt-3 justify-between">
                            <div className=" w-[60%] flex-col flex space-y-5 py-7 ">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Eaque ullam aliquid dicta
                                    ea culpa distinctio est dolores officia.
                                    Nisi, quasi?
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Sint necessitatibus
                                    ratione hic velit reprehenderit iusto vel in
                                    pariatur omnis eius voluptates similique,
                                    quibusdam laboriosam vitae amet. Officia
                                    distinctio ab corporis et ducimus, autem
                                    enim odit aperiam minus, aut rem porro?
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Sint necessitatibus
                                    ratione hic velit reprehenderit iusto vel in
                                    pariatur omnis eius voluptates similique,
                                    enim odit aperiam minus, aut rem porro?
                                </p>
                            </div>

                            <div className="border border-gray-400 bg-zinc-50 rounded-3xl w-[30%] flex flex-col flex-wrap p-5 ">
                                {icons.map((items) => (
                                    <div className="flex space-x-4 items-center mt-5">
                                        <img
                                            src={items.icon}
                                            className="size-[3vh]"
                                        />
                                        <p className="text-gray-600">
                                            {items.name}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>

                    <div className="flex flex-col  w-full h-auto mt-16 bg-zinc-50 p-10">
                        <p className="font-poppins font-semibold text-xl">
                            Rooms
                        </p>

                        <ProductCard
                            productId={product.id}
                            image={product.image}
                            price={product.price}
                            title={`Double Fancy Room`}
                        />
                        <ProductCard
                            productId={product.id}
                            image={product.roomImage1}
                            price={product.price}
                            title={`Double Standard Room`}
                        />
                    </div>
                </div>
            </AuthenticatedLayout>

            <Footer />
        </>
    );
};

export default ProductDescription;
