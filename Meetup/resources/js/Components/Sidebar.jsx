import React from "react";
import Aside from "./Aside";

const Sidebar = ({ header, data }) => {
    return (
        <>
            <sidebar class="flex">
                <Aside />
                <div class="h-screen  overflow-y-auto bg-white border-l border-r sm:w-64 w-60 dark:bg-gray-900 dark:border-gray-700">
                    {header && (
                        <header className="bg-blue-900 shadow">
                            <div className="mx-auto max-w-7xl px-4 py-6  flex justify-between items-center">
                                {header}
                            </div>
                        </header>
                    )}

                    <form action="#" class="flex items-center">
                        <input
                            type="text"
                            placeholder="Search "
                            class="py-2 px-5 border border-gray-300 rounded-l-md "
                        />
                        <button
                            type="submit"
                            class="bg-blue-500 text-white rounded-r-md px-1 py-[0.3rem]  hover:bg-blue-600"
                        >
                            <img
                                src="https://img.icons8.com/?size=80&id=xB6YTTrNiYGH&format=png"
                                alt=""
                            />
                        </button>
                    </form>

                    <div class="mt-8 space-y-4">
                        {data.map((item) => (
                            <a
                                href={`/group/${item.id}`}
                                class="flex items-center w-full px-5 py-2 transition-colors duration-200 dark:hover:bg-gray-800 gap-x-2 hover:bg-gray-100 focus:outline-none"
                            >
                                <img
                                    class="object-cover w-8 h-8 rounded-full"
                                    src={item.groupimage}
                                />

                                <div class="text-left rtl:text-right">
                                    <h1 class="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                        {item.name}
                                    </h1>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {item.created_at}
                                    </p>
                                </div>
                            </a>
                        ))}
                    </div>
                </div>
            </sidebar>
        </>
    );
};

export default Sidebar;
