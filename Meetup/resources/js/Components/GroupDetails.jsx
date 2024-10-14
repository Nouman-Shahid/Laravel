import React from "react";
import NavLink from "./NavLink";

const GroupDetails = ({
    groupdata = {},
    count = 0,
    totalusers = [],
    results,
}) => {
    return (
        <div className="flex flex-col w-full py-4 bg-[#212121] text-[#E0E0E0] shadow-lg p-5">
            <div className="flex flex-col items-center justify-between py-5">
                <img
                    src={groupdata.groupimage || ""}
                    className="rounded-full w-24 h-24 border-2 border-[#B0B0B0] shadow-md"
                    alt={`${groupdata.name || "Group"} Group`}
                />
                <h1 className="text-2xl font-bold text-white mt-3">
                    {groupdata.name || "Group Name"}
                </h1>
                <p className="font-semibold text-[#B0B0B0]">{count} Members</p>

                <NavLink
                    href={route("searchUser")}
                    active={route().current("searchUser")}
                    className="mt-2 bg-green-600 text-white py-1 px-4 rounded-md hover:bg-green-700 transition duration-200"
                >
                    Add member
                </NavLink>
            </div>

            <div className="flex">
                {results ? (
                    results.map((item, index) => (
                        <div key={index} className="flex">
                            {item.name} {/* Display the user name */}
                        </div>
                    ))
                ) : (
                    <p>No results found.</p>
                )}
            </div>

            <div className="flex flex-col space-y-3 p-2">
                <h2 className="font-bold text-lg text-[#E0E0E0]">
                    Description:
                </h2>
                <p className="text-[#E0E0E0]">
                    {groupdata.description || "No description available."}
                </p>
            </div>

            <div className="flex flex-col space-y-3 p-2">
                <h2 className="font-bold text-lg text-[#E0E0E0]">
                    Team Members:
                </h2>
                {totalusers.length > 0 ? (
                    totalusers.map((item) => (
                        <div
                            key={item.id}
                            className="flex items-center space-x-3 py-1 hover:bg-[#2A2A2A] rounded-md transition duration-200"
                        >
                            <div className="flex items-center justify-center w-8 h-8 bg-[#FF4D4D] text-white rounded-full font-bold">
                                {item.user_name.charAt(0).toUpperCase()}
                            </div>
                            <p className="text-[#E0E0E0]">{item.user_name}</p>
                        </div>
                    ))
                ) : (
                    <p className="text-[#B0B0B0]">No members found.</p>
                )}
            </div>

            <div className="flex flex-col space-y-3 p-2">
                <h2 className="font-bold text-lg text-[#E0E0E0]">Media:</h2>
                <p className="text-[#E0E0E0]">No media shared yet.</p>
            </div>
        </div>
    );
};

export default GroupDetails;
