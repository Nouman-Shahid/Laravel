import Sidebar from "@/Components/Sidebar";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard() {
    return (
        <main className="overflow-x-hidden">
            <div className="flex justify-between w-screen ">
                <Sidebar
                    header={
                        <h2 className="text-xl font-semibold leading-tight text-white">
                            Chats
                        </h2>
                    }
                />
                <Head title="Chats" />
            </div>
        </main>
    );
}
