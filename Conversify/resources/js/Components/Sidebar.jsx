import React from "react";
import Aside from "./Aside";

const Sidebar = ({ header }) => {
    return (
        <>
            <sidebar class="flex">
                <Aside />
                <div class="h-screen  overflow-y-auto bg-white border-l border-r sm:w-64 w-60 dark:bg-gray-900 dark:border-gray-700">
                    {header && (
                        <header className="bg-blue-900 shadow">
                            <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
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
                        <button class="flex items-center w-full px-5 py-2 transition-colors duration-200 dark:hover:bg-gray-800 gap-x-2 hover:bg-gray-100 focus:outline-none">
                            <img
                                class="object-cover w-8 h-8 rounded-full"
                                src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&h=764&q=80"
                                alt=""
                            />

                            <div class="text-left rtl:text-right">
                                <h1 class="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                    Amelia. Anderson
                                </h1>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    3 hours ago
                                </p>
                            </div>
                        </button>

                        <button class="flex items-center w-full px-5 py-2 transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-gray-800 gap-x-2 focus:outline-none">
                            <div class="relative">
                                <img
                                    class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1608174386344-80898cec6beb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&h=687&q=80"
                                    alt=""
                                />
                                <span class="h-2 w-2 rounded-full bg-emerald-500 absolute right-0.5 ring-1 ring-white bottom-0"></span>
                            </div>

                            <div class="text-left rtl:text-right">
                                <h1 class="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                    Junior REIS
                                </h1>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    online
                                </p>
                            </div>
                        </button>
                    </div>
                </div>
            </sidebar>
        </>
    );
};

export default Sidebar;
