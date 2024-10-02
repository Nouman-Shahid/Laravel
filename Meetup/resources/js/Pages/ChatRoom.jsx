import React from "react";
import { Head } from "@inertiajs/react";
import Sidebar from "@/Components/Sidebar";
import NoData from "@/Components/NoData";
import Messages from "./Profile/Messages";

const ChatRoom = ({ messages, data }) => {
    return (
        <main className="overflow-x-hidden">
            <div className="flex justify-between w-screen">
                <Sidebar
                    header={
                        <>
                            <h2 className="text-xl font-semibold text-white">
                                Groups
                            </h2>
                            <a
                                href={route("groupform")}
                                className="your-class-name"
                            >
                                <img
                                    src="images/icons/icon-add.png"
                                    className="h-8"
                                    alt="Add group"
                                />
                            </a>
                        </>
                    }
                    data={data}
                />
                <Head title="Chats" />
                <div className="flex w-full justify-start items-start">
                    <div className="flex flex-col">
                        <Messages messages={messages} />
                        {/* {messages ? <>message</> : <NoData />} */}
                    </div>
                </div>
            </div>
        </main>
    );
};

export default ChatRoom;
