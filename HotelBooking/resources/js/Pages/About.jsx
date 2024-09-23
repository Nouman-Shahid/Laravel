import Footer from "@/Components/Footer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard({ auth }) {
    return (
        <>
            <AuthenticatedLayout
                user={auth.user}
                header={
                    <h2 className="font-semibold text-xl text-gray-800  leading-tight">
                        About
                    </h2>
                }
            >
                <Head title="About" />

                <div className="py-12 bg-gray-50">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6">
                                {/* About Us Section */}
                                <section className="mb-8">
                                    <h1 className="text-3xl font-bold text-gray-900 mb-4">
                                        About Us
                                    </h1>
                                    <p className="text-gray-700 mb-6">
                                        Welcome to InnVite, where we are
                                        dedicated to offering a curated
                                        selection of premium hotels around the
                                        globe. Founded in [Year], our mission is
                                        to provide travelers with a seamless
                                        booking experience and exceptional
                                        accommodations.
                                    </p>
                                    <section className="mb-8">
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Our Mission
                                        </h2>
                                        <p className="text-gray-600">
                                            At InnVite, our mission is to make
                                            global travel effortless by
                                            providing top-tier hotel options
                                            that cater to all needs. We believe
                                            in integrity, innovation, and
                                            customer-centricity, and we strive
                                            to deliver a booking experience that
                                            exceeds expectations.
                                        </p>
                                    </section>
                                    <section className="mb-8">
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Our Values
                                        </h2>
                                        <ul className="list-disc list-inside text-gray-600">
                                            <li>
                                                <strong>Integrity:</strong> We
                                                adhere to the highest standards
                                                of integrity and transparency.
                                            </li>
                                            <li>
                                                <strong>Innovation:</strong> We
                                                embrace creativity and
                                                innovation to drive progress.
                                            </li>
                                            <li>
                                                <strong>
                                                    Customer-Centricity:
                                                </strong>{" "}
                                                We put our customers at the
                                                heart of everything we do.
                                            </li>
                                            <li>
                                                <strong>Collaboration:</strong>{" "}
                                                We foster a collaborative
                                                environment to achieve
                                                collective success.
                                            </li>
                                        </ul>
                                    </section>
                                    <section>
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Meet the Team
                                        </h2>
                                        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    John Doe
                                                </h3>
                                                <p className="text-gray-600">
                                                    CEO & Founder
                                                </p>
                                                <p className="mt-2 text-gray-500">
                                                    John is the visionary behind
                                                    InnVite, bringing years of
                                                    experience in the
                                                    hospitality industry and a
                                                    passion for enhancing the
                                                    travel experience.
                                                </p>
                                            </div>
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    Jane Smith
                                                </h3>
                                                <p className="text-gray-600">
                                                    CTO
                                                </p>
                                                <p className="mt-2 text-gray-500">
                                                    Jane leads our technology
                                                    and innovation efforts,
                                                    ensuring our platform
                                                    remains cutting-edge and
                                                    user-friendly in a rapidly
                                                    evolving industry.
                                                </p>
                                            </div>
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    Emily Johnson
                                                </h3>
                                                <p className="text-gray-600">
                                                    Marketing Director
                                                </p>
                                                <p className="mt-2 text-gray-500">
                                                    Emily drives our marketing
                                                    strategy and brand
                                                    development, helping us
                                                    connect with our audience
                                                    and expand our reach across
                                                    the globe.
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                </section>

                                {/* Help Section */}
                                <section className="mb-8">
                                    <h1 className="text-3xl font-bold text-gray-900 mb-4">
                                        How Can We Assist You?
                                    </h1>

                                    {/* FAQs Section */}
                                    <div className="mb-8">
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Frequently Asked Questions
                                        </h2>
                                        <div className="space-y-4">
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    What is InnVite?
                                                </h3>
                                                <p className="text-gray-600 mt-2">
                                                    InnVite is your global hotel
                                                    booking platform, offering a
                                                    curated selection of premium
                                                    hotels around the world.
                                                    Whether you're traveling for
                                                    business or leisure, we make
                                                    it easy to find and book the
                                                    perfect stay.
                                                </p>
                                            </div>
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    How do I make a hotel
                                                    reservation?
                                                </h3>
                                                <p className="text-gray-600 mt-2">
                                                    To make a reservation,
                                                    simply search for your
                                                    desired destination and
                                                    dates on our homepage.
                                                    Browse the available hotels,
                                                    select the one that suits
                                                    your needs, and follow the
                                                    prompts to complete your
                                                    booking.
                                                </p>
                                            </div>
                                            <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                                                <h3 className="text-xl font-semibold text-gray-700">
                                                    Can I modify or cancel my
                                                    booking?
                                                </h3>
                                                <p className="text-gray-600 mt-2">
                                                    Yes, you can modify or
                                                    cancel your booking by
                                                    logging into your account
                                                    and navigating to the 'My
                                                    Bookings' section. Please
                                                    review our cancellation
                                                    policy as some bookings may
                                                    have specific terms.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {/* Contact Information Section */}
                                    <section className="mb-8">
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Contact Us
                                        </h2>
                                        <p className="text-gray-700 mb-4">
                                            If you need further assistance, feel
                                            free to reach out to our customer
                                            support team. We're here to help
                                            with any inquiries or issues you may
                                            have.
                                        </p>
                                        <ul className="list-disc list-inside text-gray-600">
                                            <li>
                                                <strong>Email:</strong>{" "}
                                                support@innvite.com
                                            </li>
                                            <li>
                                                <strong>Phone:</strong> (123)
                                                456-7890
                                            </li>
                                            <li>
                                                <strong>Address:</strong> 456
                                                Travel Lane, Suite 200, City,
                                                State, ZIP
                                            </li>
                                        </ul>
                                    </section>

                                    {/* Support Request Form Section */}
                                    <section>
                                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">
                                            Submit a Support Request
                                        </h2>
                                        <form className="space-y-4">
                                            <div>
                                                <label
                                                    className="block text-gray-700 mb-1"
                                                    htmlFor="name"
                                                >
                                                    Name
                                                </label>
                                                <input
                                                    type="text"
                                                    id="name"
                                                    name="name"
                                                    className="w-full p-2 border border-gray-300 rounded-md"
                                                    placeholder="Your Name"
                                                    required
                                                />
                                            </div>
                                            <div>
                                                <label
                                                    className="block text-gray-700 mb-1"
                                                    htmlFor="email"
                                                >
                                                    Email
                                                </label>
                                                <input
                                                    type="email"
                                                    id="email"
                                                    name="email"
                                                    className="w-full p-2 border border-gray-300 rounded-md"
                                                    placeholder="Your Email"
                                                    required
                                                />
                                            </div>
                                            <div>
                                                <label
                                                    className="block text-gray-700 mb-1"
                                                    htmlFor="message"
                                                >
                                                    Message
                                                </label>
                                                <textarea
                                                    id="message"
                                                    name="message"
                                                    rows="4"
                                                    className="w-full p-2 border border-gray-300 rounded-md"
                                                    placeholder="Describe your issue or request"
                                                    required
                                                ></textarea>
                                            </div>
                                            <button
                                                type="submit"
                                                className="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600"
                                            >
                                                Send Request
                                            </button>
                                        </form>
                                    </section>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>

            <Footer />
        </>
    );
}
