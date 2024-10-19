import React from "react";

const MessageItem = React.memo(({ message, userId }) => {
    return (
        <div
            className={`flex items-start w-full ${
                message.user_id === userId ? "justify-end" : "justify-start"
            }`}
        >
            <div
                className={`flex flex-col items-start p-2 rounded-xl border ${
                    message.user_id === userId
                        ? "bg-gray-700 text-white border-slate-600"
                        : "bg-slate-800 text-black border-slate-600"
                }`}
            >
                {message.user_id !== userId && (
                    <div className="flex-shrink-0 mr-2">
                        <p className="text-red-500 font-bold">
                            {message.user_name}
                        </p>
                    </div>
                )}
                <div className="flex flex-col text-gray-200">
                    <div className="max-w-[40vw]">
                        <p>{message.message}</p>

                        {message.file && (
                            <a
                                href={message.file}
                                download
                                className="flex flex-col items-center mt-2 p-2 rounded hover:bg-gray-600"
                            >
                                <img
                                    src="https://img.icons8.com/?size=80&id=5jar9D6idwWX&format=png"
                                    className="size-15 mr-2"
                                />
                                <span className="text-gray-300">
                                    Download File
                                </span>
                            </a>
                        )}

                        {message.image && (
                            <img
                                src={message.image}
                                alt=""
                                className="mt-2 max-w-full rounded"
                            />
                        )}
                    </div>
                    <span className="text-xs flex justify-end mt-1">
                        {new Date(message.created_at).toLocaleTimeString([], {
                            hour: "2-digit",
                            minute: "2-digit",
                        })}
                    </span>
                </div>
            </div>
        </div>
    );
});

export default MessageItem;
