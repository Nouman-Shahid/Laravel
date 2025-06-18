import React from "react";
import { StickyNote, Clock, CheckCircle } from "lucide-react";
import { Link, usePage } from "@inertiajs/react";

const Sidebar = () => {
    const { component } = usePage();
    const { pendingCount } = usePage().props;

    return (
        <div className="flex flex-col w-[20%] h-[91vh] bg-white border-r shadow-lg">
            <div className="p-6 text-blue-600 font-bold text-2xl border-b">
                Stickit
            </div>
            <nav className="flex-1 flex flex-col p-4 gap-4 text-gray-700">
                <SidebarItem
                    icon={<StickyNote />}
                    label="All Notes"
                    href={route("dashboard")}
                    active={component === "Dashboard"}
                />
                <SidebarItem
                    icon={<Clock />}
                    label="Pending"
                    href={route("pending")}
                    active={component === "PendingNotes"}
                    pendingCount={pendingCount}
                />
                <SidebarItem
                    icon={<CheckCircle />}
                    label="Completed"
                    href={route("completed")}
                    active={component === "CompletedNotes"}
                />
            </nav>
            <div className="p-4 text-sm text-gray-500 border-t">
                © 2025 Stickit
            </div>
        </div>
    );
};

const SidebarItem = ({ icon, label, href, active, pendingCount }) => {
    return (
        <Link
            href={href}
            className={`flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-all
                ${
                    active
                        ? "bg-blue-100 text-blue-600 font-semibold"
                        : "hover:bg-blue-100 hover:text-blue-600"
                }
            `}
        >
            {icon}
            <span className="text-base">{label}</span>
            {pendingCount > 0 && (
                <span className="relative -right-16 bg-red-600 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full">
                    {pendingCount}
                </span>
            )}
        </Link>
    );
};

export default Sidebar;
