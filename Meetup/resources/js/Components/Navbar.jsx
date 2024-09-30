import React from "react";
import NavLink from "@/Components/NavLink";
import { Link, usePage } from "@inertiajs/react";
import ApplicationLogo from "./ApplicationLogo";
import Dropdown from "@/Components/Dropdown";

const Navbar = ({ auth }) => {
    return (
        <header className="flex items-end justify-between py-3 px-8 text-black border border-gray-300 w-screen">
            <div className="flex items-end justify-between w-auto space-x-10">
                <ApplicationLogo />
                <div className="space-x-8 sm:-my-px sm:ms-10 sm:flex py-1">
                    <NavLink
                        href={route("home")}
                        active={route().current("home")}
                    >
                        Home
                    </NavLink>
                    <NavLink
                        href={route("dashboard")}
                        active={route().current("dashboard")}
                    >
                        About
                    </NavLink>
                    <NavLink
                        href={route("dashboard")}
                        active={route().current("dashboard")}
                    >
                        Help
                    </NavLink>
                </div>
            </div>

            <nav className="flex items-center space-x-5">
                {auth.user ? (
                    <div className="relative">
                        <Dropdown>
                            <Dropdown.Trigger>
                                <span className="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        className="inline-flex font-poppins border border-blue-500 items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {auth.user.name}

                                        <svg
                                            className="ms-2 -me-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fillRule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clipRule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </Dropdown.Trigger>

                            <Dropdown.Content>
                                <Dropdown.Link href={route("profile.edit")}>
                                    {" "}
                                    Profile
                                </Dropdown.Link>
                                <Dropdown.Link
                                    href={route("logout")}
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </Dropdown.Link>
                            </Dropdown.Content>
                        </Dropdown>
                    </div>
                ) : (
                    <>
                        <Link
                            href={route("register")}
                            className="px-8 py-2 text-[#1D64EC] rounded-3xl font-semibold bg-white ring-1 ring-transparent transition hover:bg-gray-100 border border-[#1D64EC]"
                        >
                            Sign up
                        </Link>
                        <Link
                            href={route("login")}
                            className="px-8 py-2 text-gray-50 rounded-3xl font-semibold bg-[#1D64EC] ring-1 ring-transparent transition hover:bg-blue-700 border border-[#1D64EC]"
                        >
                            Log in
                        </Link>
                    </>
                )}
            </nav>
        </header>
    );
};

export default Navbar;
