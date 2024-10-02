import Navbar from "@/Components/Navbar";
import NavLink from "@/Components/NavLink";
import { Head } from "@inertiajs/react";

export default function Welcome({ auth }) {
    return (
        <main className="flex flex-col min-h-screen h-auto justify-between overflow-x-hidden">
            <Head title="Chat" />
            <header className="bg-gray-50">
                <Navbar auth={auth} />
            </header>

            <section class="bg-gray-100 ">
                <div class="flex flex-col lg:flex-row lg:items-stretch lg:min-h-[800px]">
                    <div class="relative flex items-center justify-center w-full lg:order-2 lg:w-7/12">
                        <div class="absolute bottom-0 right-0 hidden lg:block">
                            <img
                                className="object-contain w-auto h-48"
                                src="https://cdn.rareblocks.xyz/collection/celebration/images/hero/3/curved-lines.png"
                                alt=""
                            />
                        </div>

                        <div class="relative px-4 pt-24 pb-16 text-center sm:px-6 md:px-24 2xl:px-32 lg:py-24 lg:text-left">
                            <h1 class="text-4xl font-bold text-black sm:text-6xl xl:text-7xl">
                                <span className="text-red-500">
                                    Instant Chats
                                </span>
                                <br />
                                <span className="text-blue-500">
                                    Connect & Share!
                                </span>
                            </h1>
                            <p class="mt-8 text-xl text-black">
                                Start chatting now! Discover new perspectives
                                and make friends in a welcoming online
                                community.
                            </p>

                            <div class="border border-red-300 flex justify-between items-center p-6 bg-red-50 mt-5 rounded-2xl">
                                <h2 class="text-xl flex items-center font-semibold text-gray-600">
                                    Connect effortlessly with friends and family
                                </h2>
                                <div class="px-8 py-4 transition-all duration-200 bg-orange-500 rounded-full hover:bg-orange-600 focus:bg-orange-600">
                                    <NavLink href={route("dashboard")}>
                                        <p className="text-white">
                                            Get Started
                                        </p>
                                    </NavLink>
                                </div>
                            </div>

                            <p class="mt-5 text-base text-black">
                                Ready to Chat? Sign up today and start your
                                journey with us!
                            </p>
                        </div>
                    </div>

                    <div class="relative w-full overflow-hidden lg:order-1 h-96 lg:h-auto lg:w-5/12">
                        <div class="absolute inset-0">
                            <img
                                class="object-cover w-full h-full scale-150"
                                src="https://cdn.rareblocks.xyz/collection/celebration/images/hero/3/man-working-on-laptop.jpg"
                                alt=""
                            />
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

                        <div class="absolute bottom-0 left-0">
                            <div class="p-4 sm:p-6 lg:p-8">
                                <div class="flex items-center">
                                    <svg
                                        class="w-10 h-10 text-orange-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <h2 class="font-bold text-white text-3xl ml-2.5">
                                        100K+ Engaged!
                                    </h2>
                                </div>
                                <p class="max-w-xs mt-1.5 text-xl text-white">
                                    Experience the difference with our seamless
                                    chat platform.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    );
}
