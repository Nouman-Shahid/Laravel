import React from "react";
import { Head } from "@inertiajs/react";
import Sidebar from "@/Components/Sidebar";
import NoData from "@/Components/NoData";
import Messages from "./Messages";

const ChatRoom = ({ groupsMadeByUser, groupsMadeByOtherUser }) => {
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
                                    src="https://img.icons8.com/?size=48&id=102544&format=png"
                                    className="h-8"
                                    alt="Add group"
                                />
                            </a>
                        </>
                    }
                    groupsMadeByUser={groupsMadeByUser}
                    groupsMadeByOtherUser={groupsMadeByOtherUser}
                />
                <Head title="Chats" />
                <div className="flex w-full justify-center items-center">
                    <div className="flex flex-col">
                        <NoData />
                    </div>
                </div>
            </div>
        </main>
    );
};

export default ChatRoom;
