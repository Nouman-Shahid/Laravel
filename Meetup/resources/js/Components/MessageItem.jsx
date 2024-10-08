import React from "react";

const messageItem = React.memo(({ message, userId }) => {
    return (
        <div
            className={`flex item-start w-full ${
                message.user_id === userId ? "justify-end" : "justify-start"
            }`}
        >
            <div
                className={`flex flex-col items-start p-2 rounded-xl ${
                    message.user_id === userId
                        ? "bg-blue-500 text-white"
                        : "bg-gray-300 text-black"
                }`}
            >
                {message.user_id !== userId && (
                    <div className="flex-shrink-0 mr-2">
                        <p className="text-red-700 font-bold">
                            {message.user_name}
                        </p>
                    </div>
                )}
                <div className="flex flex-col">
                    <div className="max-w-[40vw]">{message.message}</div>
                    <span
                        className={`text-xs text-gray-500 flex justify-end mt-1 ${
                            message.user_id === userId
                                ? "text-white"
                                : "text-black"
                        }`}
                    >
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

export default messageItem;
