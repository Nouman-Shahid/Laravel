import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import Aside from "@/Components/Aside";
import { useForm } from "@inertiajs/react";

const SearchUser = () => {
    const { data, setData, post } = useForm({
        member_name: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/search");
    };
    return (
        <main className="overflow-x-hidden h-screen">
            <div className="flex justify-between w-screen h-screen ">
                <Aside />
                <Head title="Find Friends" />

                <div className="flex flex-col w-full justify-center items-center border-4 border-red-800">
                    <form
                        onSubmit={handleSubmit}
                        className="flex items-center space-x-2 border border-r-gray-400 w-[70vw] px-3 py-2"
                    >
                        <input
                            type="text"
                            required
                            name="member_name"
                            value={data.member_name}
                            onChange={handleChange}
                            className=" block w-full py-3 border-none text-black rounded-md sm:text-sm"
                            placeholder="Enter user name"
                        />
                        <button
                            type="submit"
                            className="bg-blue-500 text-white py-1 px-3 rounded-xl flex items-center justify-center"
                        >
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </main>
    );
};

export default SearchUser;
