import NoData from "@/Components/NoData";
import Sidebar from "@/Components/Sidebar";
import { Head } from "@inertiajs/react";

export default function Dashboard({ messages }) {
    return (
        <main className="overflow-x-hidden">
            <div className="flex justify-between w-screen ">
                <Sidebar
                    header={
                        <h2 className="text-xl font-semibold  text-white">
                            Chats
                        </h2>
                    }
                />
                <Head title="Chats" />
                <div className="flex w-full justify-center items-center">
                    {messages ? <div>Messages</div> : <NoData />}
                </div>
            </div>
        </main>
    );
}
