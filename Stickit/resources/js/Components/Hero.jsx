import React from "react";
import { Link } from "@inertiajs/react";
import ParticlesComponent from "@/Components/ParticlesComponent";
import { Typewriter } from "react-simple-typewriter";
const Hero = () => {
    return (
        <section className="relative min-h-[90vh] flex items-center justify-center bg-white overflow-hidden">
            <div className="absolute inset-0 z-0">
                <ParticlesComponent />
            </div>

            <div className="relative z-10 max-w-7xl px-4 py-16 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center justify-center gap-12">
                <div className="text-center lg:text-center max-w-2xl bg-purple-50 drop-shadow-xl  p-8">
                    <h1 className="text-5xl font-extrabold text-blue-700 sm:text-6xl leading-tight mb-6">
                        Stickit lets you capture
                        <span className="text-blue-500">
                            {" "}
                            <Typewriter
                                words={[
                                    "to-dos",
                                    "thoughts",
                                    "quotes",
                                    "ideas",
                                ]}
                                loop={5}
                                cursor
                                cursorStyle="|"
                                typeSpeed={70}
                                deleteSpeed={100}
                                delaySpeed={2000}
                            />
                        </span>
                    </h1>
                    <p className="text-gray-600 text-lg mb-8">
                        Organize your ideas, capture your thoughts, and stay
                        productive with Stickit – your perfect sticky notes
                        companion.
                    </p>
                    <Link
                        href={route("login")}
                        className="inline-block rounded-md bg-blue-700 px-8 py-2 text-white font-semibold hover:bg-blue-800 transition transform hover:scale-105"
                    >
                        Get Started
                    </Link>
                </div>

                {/* <div className="flex justify-center lg:justify-end w-full max-w-lg">
                    <img
                        src="https://cms.boardmix.com/images/whiteboard/sticky-note-board-collaborative.png"
                        alt="Sticky Notes Illustration"
                        className="w-full h-72 drop-shadow-lg"
                    />
                </div> */}
            </div>
        </section>
    );
};

export default Hero;
