import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import Sidebar from "@/Components/Sidebar";
import NoData from "@/Components/NoData";
import Messages from "./Messages";
import GroupDetails from "@/Components/GroupDetails";

const SingleChat = ({
    grouplist,
    groupdata,
    initialMessages,
    userId,
    count,
    totalusers,
}) => {
    const [messages, setMessages] = useState(initialMessages || []);

    return (
        <main className="overflow-x-hidden h-screen">
            <div className="flex justify-between w-screen h-screen ">
                <Sidebar
                    header={
                        <>
                            <h2 className="text-xl font-semibold text-white user-select-none">
                                Groups
                            </h2>
                            <a href={route("groupform")}>
                                <img
                                    src="https://img.icons8.com/?size=48&id=102544&format=png"
                                    className="h-8"
                                    alt="Add group"
                                />
                            </a>
                        </>
                    }
                    data={grouplist}
                />
                <Head title="Chats" />
                {groupdata ? (
                    <div className="flex w-full justify-start items-center">
                        <div className="flex flex-col">
                            <Messages
                                messages={messages} // Use the messages state
                                userId={userId}
                                setMessages={setMessages} // Pass the state updater function
                            />
                        </div>
                    </div>
                ) : (
                    <div className="flex w-full justify-center items-center">
                        <div className="flex flex-col">
                            <NoData />
                        </div>
                    </div>
                )}

                <GroupDetails
                    groupdata={groupdata}
                    count={count}
                    totalusers={totalusers}
                />
            </div>
        </main>
    );
};

export default SingleChat;
