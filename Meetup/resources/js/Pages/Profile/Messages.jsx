import React from "react";

const Messages = () => {
    return (
        <>
            <div class="flex flex-col space-y-4 p-4 w-[55vw] h-[92vh] border border-red-800 overflow-auto">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <img
                            class="w-10 h-10 rounded-full"
                            src="user-avatar-url"
                            alt="User Avatar"
                        />
                    </div>
                    <div class="ml-3">
                        <div class="bg-gray-300 text-gray-800 rounded-lg px-4 py-2">
                            Hi there! How are you?
                        </div>
                        <span class="text-xs text-gray-500">10:00 AM</span>
                    </div>
                </div>

                <div class="flex items-start justify-end">
                    <div class="mr-3">
                        <div class="bg-blue-500 text-white rounded-lg px-4 py-2">
                            I'm good, thank you! How about you?
                        </div>
                        <span class="text-xs text-gray-500">10:01 AM</span>
                    </div>
                    <div class="flex-shrink-0">
                        <img
                            class="w-10 h-10 rounded-full"
                            src="bot-avatar-url"
                            alt="Bot Avatar"
                        />
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <img
                            class="w-10 h-10 rounded-full"
                            src="user-avatar-url"
                            alt="User Avatar"
                        />
                    </div>
                    <div class="ml-3">
                        <div class="bg-gray-300 text-gray-800 rounded-lg px-4 py-2">
                            Any updates on the project?
                        </div>
                        <span class="text-xs text-gray-500">10:02 AM</span>
                    </div>
                </div>
            </div>

            <div className="flex    h-[8vh] ">
                <div className="flex items-center">
                    <img
                        src="https://img.icons8.com/?size=64&id=5s8hEtg9Bjbo&format=png"
                        className="bg-green-200 h-full w-full p-2 flex items-center"
                    />
                    <img
                        src="https://img.icons8.com/?size=48&id=bjHuxcHTNosO&format=png"
                        className="bg-blue-200 h-full w-full p-2 flex items-center"
                    />
                </div>
                <input
                    type="text"
                    name=""
                    className="w-[42.5vw] outline-none "
                />
                <button className="px-4 py-1 bg-green-600 text-white">
                    submit
                </button>
            </div>
        </>
    );
};

export default Messages;
