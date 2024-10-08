import React, { useState } from "react";
import { useForm } from "@inertiajs/react";

const Messages = ({ messages, userId }) => {
    const { data, setData, post } = useForm({
        message: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/messages");
    };

    return (
        <>
            <div className="flex flex-col space-y-4 p-4 w-[55vw] h-[90vh] overflow-auto">
                {messages && messages.length > 0 ? (
                    messages.map((message) => (
                        <div
                            className={`flex item-start w-full  ${
                                message.user_id === userId
                                    ? "justify-end"
                                    : "justify-start"
                            }`}
                        >
                            <div
                                className={`flex flex-col items-start p-2 rounded-xl   ${
                                    message.user_id === userId
                                        ? " bg-blue-500 text-white"
                                        : " bg-gray-300 text-black"
                                }`}
                                key={message.id}
                            >
                                {/* Display user label only for non-authenticated users */}
                                {message.user_id !== userId && (
                                    <div className="flex-shrink-0 mr-2">
                                        <p className="text-red-700 font-bold">
                                            {message.user_name}
                                        </p>
                                    </div>
                                )}
                                <div className="flex flex-col">
                                    <div className="max-w-[40vw]">
                                        {message.message}
                                    </div>
                                    <span
                                        className={`text-xs text-gray-500 flex justify-end mt-1  ${
                                            message.user_id === userId
                                                ? "text-white"
                                                : "text-black"
                                        }`}
                                    >
                                        {new Date(
                                            message.created_at
                                        ).toLocaleTimeString([], {
                                            hour: "2-digit",
                                            minute: "2-digit",
                                        })}
                                    </span>
                                </div>
                            </div>
                        </div>
                    ))
                ) : (
                    <div className="flex items-center justify-center h-full">
                        No messages available.
                    </div>
                )}
            </div>

            <form onSubmit={handleSubmit} className="flex h-[10vh] w-[55vw]">
                <input
                    type="text"
                    name="message"
                    placeholder="Type a message"
                    value={data.message}
                    onChange={handleChange}
                    className="w-full outline-none"
                />
                <button
                    type="submit"
                    className="px-4 py-1 bg-green-600 text-white"
                >
                    Submit
                </button>
            </form>
        </>
    );
};

export default Messages;
