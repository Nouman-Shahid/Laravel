import React from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";

const NavBar = ({ auth }) => {
    return (
        <>
            <header className=" flex items-center justify-between py-3 px-3 text-black border border-gray-500">
                <div className="flex items-center justify-between w-[40vw] ">
                    <ApplicationLogo />
                    <ul className="flex text-[2.8vh] space-x-6 hover:text-gray-400 transitionn font-poppins ">
                        <a href="" className=" hover:text-gray-700">
                            Home
                        </a>
                        <a href="" className=" hover:text-gray-700">
                            About
                        </a>
                        <a href="" className=" hover:text-gray-700">
                            Deals
                        </a>
                        <a href="" className=" hover:text-gray-700">
                            Help
                        </a>
                        <a href="" className=" hover:text-gray-700">
                            Contact
                        </a>
                    </ul>
                </div>

                <nav className=" flex justify-end space-x-2 ">
                    {auth.user ? (
                        <Link
                            href={route("dashboard")}
                            className=" px-8  py-2 text-[#1D64EC] rounded-3xl font-semibold bg-white ring-1 ring-transparent transition hover:bg-gray-100  border border-[#1D64EC]"
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route("register")}
                                className=" px-8  py-2 text-[#1D64EC] rounded-3xl font-semibold bg-white ring-1 ring-transparent transition hover:bg-gray-100  border border-[#1D64EC]"
                            >
                                Sign up
                            </Link>
                            <Link
                                href={route("login")}
                                className=" px-8  py-2 text-gray-50 rounded-3xl font-semibold bg-[#1D64EC] ring-1 ring-transparent transition hover:bg-blue-700 border border-[#1D64EC]"
                            >
                                Log in
                            </Link>
                        </>
                    )}
                </nav>
            </header>
        </>
    );
};

export default NavBar;
