import React from "react";
import ApplicationLogo from "../Components/ApplicationLogo";
import { Head } from "@inertiajs/react";
import Aside from "@/Components/Aside";
import Sidebar from "@/Components/Sidebar";

const Invite = ({ notificationsData, notificationList }) => {
    return (
        <main className="overflow-x-hidden h-screen">
            <div className="flex justify-between w-screen h-screen ">
                <Sidebar
                    header={
                        <>
                            <h2 className="text-xl font-semibold text-white user-select-none">
                                Notifications
                            </h2>
                        </>
                    }
                    notifications={notificationList}
                />

                <Head title="Notification" />

                <section class=" w-full p-20 mx-auto bg-white dark:bg-gray-900 ">
                    <header>
                        <ApplicationLogo />
                    </header>

                    <main class="mt-8">
                        <h2 class="text-gray-700 dark:text-gray-200">
                            {notificationsData.invited_by}
                        </h2>

                        <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                            <span className="text-blue-300">
                                {notificationsData.invited_by}
                            </span>{" "}
                            has invited you to join the group
                            <span class="font-semibold ">
                                {" "}
                                {notificationsData.groupname}
                            </span>
                            .
                        </p>

                        <button class="px-6 py-2 mt-4 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                            Accept the invite
                        </button>

                        <p class="mt-8 text-gray-600 dark:text-gray-300">
                            Thanks, <br />
                            Meetup team
                        </p>
                    </main>
                </section>
            </div>
        </main>
    );
};

export default Invite;
