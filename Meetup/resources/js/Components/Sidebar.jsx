import React, { useState } from "react";
import Aside from "./Aside";

const Sidebar = ({ header, data }) => {
    const [selectedGroup, setSelectedGroup] = useState(null); // Track selected group

    const handleGroupClick = (code) => {
        setSelectedGroup(code); // Update selected group on click
    };

    // Get the current pathname to check against
    const currentPath = window.location.pathname;

    return (
        <sidebar className="flex ">
            <Aside />
            <div className="h-screen overflow-y-auto sm:w-64 w-60 bg-gray-800">
                {header && (
                    <header>
                        <div className="mx-auto max-w-7xl px-3 py-6 flex justify-between items-center">
                            {header}
                        </div>
                    </header>
                )}

                <form action="#" className="flex items-center px-2">
                    <input
                        type="text"
                        placeholder="Search"
                        className="py-2 px-5 w-full  rounded-md"
                    />
                </form>

                <div className="mt-8 space-y-1">
                    {Array.isArray(data) ? (
                        data.map((item) => (
                            <a
                                href={`/groups/${item.code}`}
                                key={item.code}
                                className={`flex items-center .custom-inward-curve w-full px-5 py-2 transition-colors duration-200 gap-x-2 focus:outline-none ${
                                    selectedGroup === item.code ||
                                    currentPath === `/groups/${item.code}`
                                        ? "bg-[#31363F]"
                                        : "hover:bg-[#31363F]"
                                }`}
                                onClick={() => handleGroupClick(item.code)}
                            >
                                <img
                                    className="object-cover w-8 h-8 rounded-full"
                                    src={item.groupimage}
                                    alt={item.name}
                                />
                                <div className="text-left rtl:text-right">
                                    <h1 className="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                        {item.name}
                                    </h1>
                                    <p className="text-xs text-gray-500 dark:text-gray-300">
                                        {item.created_at}
                                    </p>
                                </div>
                            </a>
                        ))
                    ) : (
                        <p>No data available.</p>
                    )}
                </div>
            </div>
        </sidebar>
    );
};

export default Sidebar;
