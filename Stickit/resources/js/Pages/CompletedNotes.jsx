import Navbar from "@/Components/Navbar";
import Sidebar from "@/Components/Sidebar";
import { Head, router } from "@inertiajs/react";
import React from "react";
import moment from "moment";
import { Trash2, CheckCircle } from "lucide-react";

const CompletedNotes = ({ notes = [], auth }) => {
    return (
        <div>
            <Head title="Completed Notes" />
            <Navbar auth={auth} />

            <div className="flex">
                <Sidebar />

                <div className="flex w-full p-14 bg-gray-50 h-[91vh] overflow-y-auto ">
                    <div className="flex flex-wrap gap-4 px-4  justify-center">
                        {notes.map((item) => (
                            <div
                                key={item.id}
                                className="flex flex-col border-2 h-64 w-64 shadow-xl"
                                style={{
                                    backgroundColor: `#${
                                        item.color || "A7F3D0"
                                    }`,
                                    borderColor: `#${item.color || "A7F3D0"}`,
                                }}
                            >
                                <div
                                    className={`flex justify-between items-center p-4 border-b ${
                                        item.iscompleted && "line-through"
                                    }`}
                                >
                                    <div className="font-bold text-lg text-gray-800 break-words">
                                        {item.title}
                                    </div>
                                    <div className="flex space-x-2">
                                        {item.iscompleted !== "true" && (
                                            <button
                                                onClick={() =>
                                                    router.visit(
                                                        `/completed/${item.id}`
                                                    )
                                                }
                                                className="text-blue-500 hover:text-blue-700 transition-colors"
                                                title="Mark as Completed"
                                            >
                                                <CheckCircle size={18} />
                                            </button>
                                        )}
                                    </div>
                                </div>

                                <div className="p-4 text-gray-700 break-words overflow-auto flex-1">
                                    {item.content}
                                </div>

                                <div className="p-2 text-xs text-gray-600 border-t flex justify-between">
                                    {moment(item.created_at).format(
                                        "DD/MM/YYYY"
                                    )}
                                    <div className="flex space-x-3">
                                        <button
                                            onClick={() =>
                                                router.visit(
                                                    `/remove/${item.id}`
                                                )
                                            }
                                            className="text-red-500 hover:text-red-700 transition-colors"
                                            title="Delete"
                                        >
                                            <Trash2 size={18} />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default CompletedNotes;
