import React from "react";

const messageItem = React.memo(({ message, userId }) => {
    return (
        <div
            className={`flex item-start w-full ${
                message.user_id === userId ? "justify-end" : "justify-start"
            }`}
        >
            <div
                className={`flex flex-col items-start p-2 rounded-xl border ${
                    message.user_id === userId
                        ? "bg-gray-700 text-white border-slate-600 "
                        : "bg-slate-800 text-black border-slate-600"
                }`}
            >
                {message.user_id !== userId && (
                    <div className="flex-shrink-0 mr-2">
                        <p className="text-red-500  font-bold">
                            {message.user_name}
                        </p>
                    </div>
                )}
                <div className="flex flex-col text-gray-200">
                    <div className="max-w-[40vw]">
                        <p>{message.message}</p>
                        <p>{message.file}</p>
                        <img src={message.image} alt="" />
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

export default messageItem;
