import React from "react";

const ProductCard = ({ image, price, title }) => {
    let subicons = [
        {
            name: "18 sqm",
            icon: "https://cdn-icons-png.flaticon.com/128/6046/6046118.png",
        },
        {
            name: "2 people",
            icon: "https://cdn-icons-png.flaticon.com/128/2118/2118701.png",
        },
        {
            name: "queen bed",
            icon: "https://cdn-icons-png.flaticon.com/128/9567/9567116.png",
        },
    ];
    return (
        <>
            <div className="flex bg-white border border-gray-200 mt-10 h-[40vh] p-2  rounded-2xl ">
                <img src={image} alt="" className="w-[30%] rounded-l-2xl" />
                <div className="flex flex-col bg-white w-[70%] rounded-r-2xl p-5">
                    <p className="font-poppins font-bold text-gray-600">
                        {title}
                    </p>
                    <p className="font-poppins  text-gray-600 mt-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consequuntur, modi excepturi. Dolores, obcaecati tempora
                        fuga iste eaque, numquam cupiditate dolor facere
                        sapiente commodi laborum itaque quasi voluptatibus,
                        iusto vitae omnis. sapiente commodi laborum itaque quasi
                        voluptatibus, iusto vitae omnis.
                    </p>
                    <div className="flex space-x-10 ">
                        {subicons.map((items) => (
                            <div className="flex space-x-2 items-center mt-5">
                                <img src={items.icon} className="size-[3vh]" />
                                <p className="text-gray-600">{items.name}</p>
                            </div>
                        ))}
                    </div>

                    <div className="flex mt-6 justify-between w-full ">
                        <p className="text-gray-400">
                            Non-refundable, Breakfast included
                        </p>
                        <a
                            href=""
                            className="px-4 py-3 bg-blue-600 text-white rounded-3xl"
                        >
                            Book now for ${price}
                        </a>
                    </div>
                </div>
            </div>
        </>
    );
};

export default ProductCard;
