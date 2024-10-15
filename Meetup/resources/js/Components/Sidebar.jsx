import React, { useState } from "react";
import Aside from "./Aside";

const Sidebar = ({
    header,
    groupsMadeByOtherUser,
    groupsMadeByUser,
    notifications,
}) => {
    const [selectedGroup, setSelectedGroup] = useState(null); // Track selected group

    const handleGroupClick = (code) => {
        setSelectedGroup(code); // Update selected group on click
    };

    const currentPath = window.location.pathname;

    return (
        <sidebar className="flex ">
            <Aside />
            <div className="h-screen overflow-y-auto sm:w-64 w-60 bg-[#212121]">
                {header && (
                    <header>
                        <div className="mx-auto max-w-7xl px-3 py-6 flex justify-between items-center">
                            {header}
                        </div>
                    </header>
                )}

                <form action="#" className="flex items-center px-2">
                    <input
                        type="text"
                        placeholder="Search"
                        className="py-2 px-5 w-full  rounded-md"
                    />
                </form>

                <div className="mt-8 space-y-1">
                    {Array.isArray(groupsMadeByUser)
                        ? groupsMadeByUser.map((item) => (
                              <a
                                  href={`/groups/${item.code}`}
                                  key={item.code}
                                  className={`flex items-center .custom-inward-curve w-full px-5 py-3 border-b border-l border-t border-transparent transition-colors duration-200 gap-x-2 ${
                                      selectedGroup === item.code ||
                                      currentPath === `/groups/${item.code}`
                                          ? "bg-[#1E272C] border-slate-700"
                                          : "hover:bg-[#1E272C]  hover:border-slate-700"
                                  }`}
                                  onClick={() => handleGroupClick(item.code)}
                              >
                                  <img
                                      className="object-cover w-8 h-8 rounded-full"
                                      src={item.groupimage}
                                      alt={item.name}
                                  />
                                  <div className="text-left rtl:text-right">
                                      <h1 className="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                          {item.name}
                                      </h1>
                                      <p className="text-xs text-gray-500 dark:text-gray-300">
                                          {item.created_at}
                                      </p>
                                  </div>
                              </a>
                          ))
                        : notifications.map((item) => (
                              <a
                                  href={`/notification/${item.id}`}
                                  key={item.id}
                                  className={`flex items-center .custom-inward-curve w-full px-5 py-3 border-b border-l border-t border-transparent transition-colors duration-200 gap-x-2 ${
                                      selectedGroup === item.id
                                          ? "bg-[#1E272C] border-slate-700"
                                          : "hover:bg-[#1E272C]  hover:border-slate-700"
                                  }`}
                                  onClick={() => handleGroupClick(item.id)}
                              >
                                  <img
                                      className="object-cover w-8 h-8 rounded-full"
                                      src={item.groupimage}
                                  />
                                  <div className="text-left rtl:text-right">
                                      <h1 className="text-sm font-medium text-gray-700 dark:text-white">
                                          {item.invited_by.toLowerCase()}
                                      </h1>

                                      <p className="text-xs text-gray-500 dark:text-gray-300">
                                          has invited you to {item.groupname}
                                      </p>
                                  </div>
                              </a>
                          ))}
                    {Array.isArray(groupsMadeByOtherUser) &&
                        groupsMadeByOtherUser.map((item) => (
                            <a
                                href={`/groups/${item.code}`}
                                key={item.code}
                                className={`flex items-center .custom-inward-curve w-full px-5 py-3 border-b border-l border-t border-transparent transition-colors duration-200 gap-x-2 ${
                                    selectedGroup === item.code ||
                                    currentPath === `/groups/${item.code}`
                                        ? "bg-[#1E272C] border-slate-700"
                                        : "hover:bg-[#1E272C]  hover:border-slate-700"
                                }`}
                                onClick={() => handleGroupClick(item.code)}
                            >
                                <img
                                    className="object-cover w-8 h-8 rounded-full"
                                    src={item.groupimage}
                                    alt={item.name}
                                />
                                <div className="text-left rtl:text-right">
                                    <h1 className="text-sm font-medium text-gray-700 capitalize dark:text-white">
                                        {item.name}
                                    </h1>
                                    <p className="text-xs text-gray-500 dark:text-gray-300">
                                        {item.created_at}
                                    </p>
                                </div>
                            </a>
                        ))}
                </div>
            </div>
        </sidebar>
    );
};

export default Sidebar;
