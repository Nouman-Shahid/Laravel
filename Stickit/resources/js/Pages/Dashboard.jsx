import Navbar from "@/Components/Navbar";
import Sidebar from "@/Components/Sidebar";
import { Head, router, useForm } from "@inertiajs/react";
import { PlusIcon, X, Edit3, Trash2, CheckCircle } from "lucide-react";
import { useState } from "react";
import moment from "moment";

export default function Dashboard({ auth, notes = [] }) {
    const [isOpen, setIsOpen] = useState(false);

    const { data, setData, post, processing, errors, reset } = useForm({
        title: "",
        content: "",
        color: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        post(route("store"), {
            onSuccess: () => {
                reset();
                setIsOpen(false);
            },
        });
    };

    return (
        <>
            <Head title="Dashboard" />
            <Navbar auth={auth} />

            <div className="flex relative ">
                <Sidebar />

                <div className="flex w-full p-4 bg-gray-50 h-[91vh] overflow-y-auto ">
                    <div className="flex flex-wrap gap-4 px-4 justify-center">
                        <div className="flex border-2  h-64 w-64 shadow-xl bg-yellow-100 items-center justify-center">
                            <button
                                onClick={() => setIsOpen((value) => !value)}
                            >
                                <PlusIcon className="size-14 text-gray-600" />
                            </button>
                        </div>
                        {notes.map((item) => (
                            <div
                                key={item.id}
                                className="flex flex-col border-2 h-64 w-64 shadow-xl hover:scale-105 cursor-pointer transition delay-150"
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

                {/* Add Form Modal */}
                {isOpen && (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div className="bg-white p-8 rounded-xl shadow-2xl w-96 relative">
                            <button
                                className="absolute top-3 right-3 text-gray-500 hover:text-gray-700"
                                onClick={() => setIsOpen(false)}
                            >
                                <X className="size-5" />
                            </button>
                            <h2 className="text-xl font-bold mb-4 text-blue-600">
                                Create New Note
                            </h2>
                            <form
                                onSubmit={handleSubmit}
                                className="flex flex-col gap-4"
                            >
                                <input
                                    type="text"
                                    placeholder="Title"
                                    className="border p-2 rounded"
                                    onChange={(e) =>
                                        setData("title", e.target.value)
                                    }
                                />
                                {errors.title && (
                                    <div className="text-red-500">
                                        {errors.title}
                                    </div>
                                )}

                                <textarea
                                    placeholder="Write your note..."
                                    className="border p-2 rounded h-32 resize-none"
                                    onChange={(e) =>
                                        setData("content", e.target.value)
                                    }
                                ></textarea>
                                {errors.content && (
                                    <div className="text-red-500">
                                        {errors.content}
                                    </div>
                                )}
                                <select
                                    className="border p-2 rounded"
                                    onChange={(e) =>
                                        setData("color", e.target.value)
                                    }
                                    defaultValue=""
                                >
                                    <option value="" disabled>
                                        Select a color
                                    </option>
                                    <option value="eec6d2">Soft Pink</option>
                                    <option value="c8c6ee">
                                        Lavender Blue
                                    </option>
                                    <option value="eceec6">Pale Lime</option>
                                    <option value="c6eee7">Aqua Mist</option>
                                    <option value="f9ddff">Light Purple</option>
                                </select>

                                {errors.color && (
                                    <div className="text-red-500">
                                        {errors.color}
                                    </div>
                                )}

                                <button
                                    type="submit"
                                    disabled={processing}
                                    className={`py-2 rounded transition ${
                                        processing
                                            ? `bg-blue-50 text-blue-700 `
                                            : `bg-blue-600 text-white `
                                    }`}
                                >
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                )}
            </div>
        </>
    );
}
