import React from "react";

const GroupDetails = ({ groupdata, count, totalusers }) => {
    return (
        <>
            <div className="flex flex-col w-full py-2 items-start space-y-3 border-l border-gray-400">
                <div className="flex flex-col w-full items-center justify-center py-5">
                    <img
                        src={groupdata.groupimage}
                        className="rounded-full size-20"
                    />
                    <div className="flex font-bold text-gray-600 font-poppins text-[3vh]">
                        {groupdata.name}
                    </div>
                    <div className="font-bold text-gray-600">
                        {count} Members
                    </div>
                </div>
                <hr className="w-full h-[0.3vh] bg-gray-300" />

                <div className="flex flex-col space-y-2 p-2">
                    <p className="font-bold font-poppins text-gray-600">
                        Description:
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        tempore aliquam dolore facere sit consequuntur nobis
                        quas?
                    </p>
                </div>
                <hr className="w-full h-[0.3vh] bg-gray-300" />
                <div className="flex flex-col space-y-3 p-2">
                    <p className="font-bold font-poppins text-gray-600">
                        Team Members:
                    </p>
                    {totalusers.map((items) => (
                        <div
                            className="flex items-center space-x-2"
                            key={items.id}
                        >
                            <p className="flex bg-red-600 text-white rounded-full font-bold  size-8 items-center justify-center">
                                {items.user_name.charAt(0).toUpperCase()}
                            </p>
                            <p>{items.user_name}</p>
                        </div>
                    ))}
                </div>
                <hr className="w-full h-[0.3vh] bg-gray-300" />

                <div className="flex flex-col space-y-2 p-2">
                    <p className="font-bold font-poppins text-gray-600">
                        Media:
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        tempore aliquam dolore facere sit consequuntur nobis
                        quas?
                    </p>
                </div>
            </div>
        </>
    );
};

export default GroupDetails;
