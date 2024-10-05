import React from "react";
import Aside from "./Aside";

const Sidebar = ({ header, data }) => {
    console.log("Sidebar data:", data); // Log the data to check its type
    return (
        <>
            <sidebar className="flex">
                <Aside />
                <div className="h-screen overflow-y-auto bg-white border-l border-r sm:w-64 w-60 dark:bg-gray-900 dark:border-gray-700">
                    {header && (
                        <header className="bg-blue-900 shadow">
                            <div className="mx-auto max-w-7xl px-4 py-6 flex justify-between items-center">
                                {header}
                            </div>
                        </header>
                    )}

                    <form action="#" className="flex items-center">
                        <input
                            type="text"
                            placeholder="Search "
                            className="py-2 px-5 border border-gray-300 rounded-l-md"
                        />
                        <button
                            type="submit"
                            className="bg-blue-500 text-white rounded-r-md px-1 py-[0.3rem] hover:bg-blue-600"
                        >
                            <img
                                src="https://img.icons8.com/?size=80&id=xB6YTTrNiYGH&format=png"
                                alt=""
                            />
                        </button>
                    </form>

                    <div className="mt-8 space-y-4">
                        {Array.isArray(data) ? (
                            data.map((item) => (
                                <a
                                    key={item.code} // Add a key prop for each item
                                    href={`/group/${item.code}`}
                                    className="flex items-center w-full px-5 py-2 transition-colors duration-200 dark:hover:bg-gray-800 gap-x-2 hover:bg-gray-100 focus:outline-none"
                                >
                                    <img
                                        className="object-cover w-8 h-8 rounded-full"
                                        src={item.groupimage}
                                    />
                                    <div className="text-left rtl:text-right">
                                        <h1 className="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                            {item.name}
                                        </h1>
                                        <p className="text-xs text-gray-500 dark:text-gray-400">
                                            {item.created_at}
                                        </p>
                                    </div>
                                </a>
                            ))
                        ) : (
                            <p>No data available.</p> // Fallback message if data is not an array
                        )}
                    </div>
                </div>
            </sidebar>
        </>
    );
};

export default Sidebar;
