import React from "react";
import ApplicationLogo from "../Components/ApplicationLogo";
import { Head } from "@inertiajs/react";
import Aside from "@/Components/Aside";
import Sidebar from "@/Components/Sidebar";
import NavLink from "@/Components/NavLink";

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

                <section class=" w-full p-20 mx-auto bg-[#1E272C] ">
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
                            </span>
                            has invited you to join the group{" "}
                            <span class="font-semibold ">
                                {notificationsData.groupname}
                            </span>
                            .
                        </p>

                        <NavLink
                            href={`/invite-accept/${notificationsData.id}`}
                        >
                            <p className="py-1 px-4 text-white bg-green-600 w-fit mt-5 rounded-2xl">
                                Accept the invite
                            </p>
                        </NavLink>

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
