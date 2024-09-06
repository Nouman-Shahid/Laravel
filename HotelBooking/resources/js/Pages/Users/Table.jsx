import React from "react";

const Table = ({ data }) => {
    return (
        <>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-3  text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            Id
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            Email
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            View
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            Edit
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase "
                                        >
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 ">
                                    {data.map((users) => (
                                        <tr class="hover:bg-gray-800 cursor-pointer ">
                                            <td class="px-6 py-4 text-center text-sm font-medium text-gray-200 ">
                                                {users.id}
                                            </td>
                                            <td class="px-6 py-4 text-center text-sm text-gray-200 ">
                                                {users.name}
                                            </td>
                                            <td class="px-6 py-4 text-center text-sm text-gray-200 ">
                                                {users.email}
                                            </td>
                                            <td class="px-6 py-4 text-center text-sm font-medium">
                                                <button
                                                    type="button"
                                                    class="inline-flex bg-yellow-500 p-2 items-center  text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-yellow-600 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none "
                                                >
                                                    View
                                                </button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center bg-green-700 p-2  gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-green-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none "
                                                >
                                                    Edit
                                                </button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center bg-red-500 p-2  gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-red-600 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none "
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Table;
