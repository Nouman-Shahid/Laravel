import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import Aside from "@/Components/Aside";
import { useForm } from "@inertiajs/react";
import { format } from "date-fns";

const SearchUser = ({ results, groupdata }) => {
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

    const [dropdownOpen, setDropdownOpen] = useState({});

    const handleDropdownToggle = (id) => {
        setDropdownOpen((prev) => ({ ...prev, [id]: !prev[id] }));
    };

    return (
        <main className="overflow-x-hidden h-screen bg-gray-800 text-white">
            <div className="flex justify-between w-screen h-screen">
                <Aside />
                <Head title="Find Friends" />

                <div className="flex flex-col w-full py-10 items-center">
                    <form
                        onSubmit={handleSubmit}
                        className="flex items-center space-x-2 border border-gray-600 rounded-xl w-[70vw] px-3 py-2"
                    >
                        <input
                            type="text"
                            required
                            name="member_name"
                            value={data.member_name}
                            onChange={handleChange}
                            className="block w-full py-3 border-none text-black rounded-md sm:text-sm focus:ring-2 focus:ring-blue-400 transition"
                            placeholder="Enter user name"
                        />
                        <button
                            type="submit"
                            className="bg-blue-500 text-white py-1 px-3 rounded-xl flex items-center justify-center transition duration-200 hover:bg-blue-600"
                        >
                            Search
                        </button>
                    </form>

                    <table className="w-[96%] bg-white shadow-md rounded-lg overflow-hidden mt-7">
                        <thead>
                            <tr className="bg-zinc-700">
                                <th className="px-6 py-3">Profile Picture</th>
                                <th className="px-6 py-3">Name</th>
                                <th className="px-6 py-3">Email</th>
                                <th className="px-6 py-3">Day Joined</th>
                                <th className="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {results &&
                                results.map((user) => (
                                    <tr
                                        className="hover:bg-gray-600 text-center bg-gray-700 border border-gray-600"
                                        key={user.id}
                                    >
                                        <td className="px-6 py-3">
                                            <center>
                                                <p className="flex items-center justify-center size-10 bg-[#FF4D4D] text-white rounded-full font-bold">
                                                    {user.name
                                                        .charAt(0)
                                                        .toUpperCase()}
                                                </p>
                                            </center>
                                        </td>
                                        <td className="px-6 py-3">
                                            {user.name}
                                        </td>
                                        <td className="px-6 py-3">
                                            {user.email}
                                        </td>
                                        <td className="px-6 py-3">
                                            {format(
                                                new Date(user.created_at),
                                                "MMM dd, yyyy"
                                            )}
                                        </td>
                                        <td className="px-6 py-3">
                                            <button
                                                onClick={() =>
                                                    handleDropdownToggle(
                                                        user.id
                                                    )
                                                }
                                                className="text-green-500 font-bold hover:underline"
                                            >
                                                Add
                                            </button>
                                            {dropdownOpen[user.id] && (
                                                <div className="absolute my-2 bg-gray-500 rounded-lg shadow-lg p-2">
                                                    <p className="text-white">
                                                        Select a group:
                                                    </p>
                                                    <div className="flex flex-col space-y-2">
                                                        {groupdata &&
                                                            groupdata.map(
                                                                (items) => (
                                                                    <button
                                                                        key={
                                                                            items.code
                                                                        }
                                                                        onClick={() =>
                                                                            post(
                                                                                route(
                                                                                    "invite",
                                                                                    {
                                                                                        userId: user.id,
                                                                                        groupcode:
                                                                                            items.code,
                                                                                    }
                                                                                )
                                                                            )
                                                                        }
                                                                        className="bg-green-600 text-white rounded px-3 py-1"
                                                                    >
                                                                        {
                                                                            items.name
                                                                        }
                                                                    </button>
                                                                )
                                                            )}
                                                    </div>
                                                </div>
                                            )}
                                        </td>
                                    </tr>
                                ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    );
};

export default SearchUser;
