import NoData from "@/Components/NoData";
import Sidebar from "@/Components/Sidebar";
import { Head } from "@inertiajs/react";
import Invite from "./Invite";

export default function Dashboard({ data }) {
    return (
        <main className="overflow-x-hidden">
            <div className="flex justify-between w-screen ">
                <Sidebar
                    header={
                        <>
                            <h2 className="text-xl font-semibold text-white">
                                Notifications
                            </h2>
                        </>
                    }
                    notifications={data}
                />
                <Head title="Notifications" />
                <div className="flex w-full justify-center items-center">
                    <NoData />
                </div>
            </div>
        </main>
    );
}
