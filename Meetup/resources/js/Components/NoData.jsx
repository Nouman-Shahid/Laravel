import React from "react";

const NoData = ({ messages }) => {
    return (
        <div className="flex flex-col justify-center items-center space-y-3 ">
            <p className="font-poppins font-bold text-2xl text-gray-600">
                Meetup for Windows
            </p>
            {Array.isArray(messages) && messages.length > 0 ? (
                <p className="text-gray-800">{messages[0].name}</p> // Display the first message's name if it's an array
            ) : (
                <p className="text-gray-800">No messages available</p> // Fallback message
            )}
            <p className="max-w-[37vw] font-poppins text-gray-500">
                Where every conversation creates memories and friendships that
                last forever, enriching lives and connecting hearts in
                meaningful ways.
            </p>
        </div>
    );
};

export default NoData;
