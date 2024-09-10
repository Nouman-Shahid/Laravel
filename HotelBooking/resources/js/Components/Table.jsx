const Table = ({ data }) => {
    return (
        <>
            <div className="flex flex-col">
                <div className="-m-1.5 overflow-x-auto">
                    <div className="p-1.5 min-w-full inline-block align-middle">
                        <div className="overflow-hidden">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            scope="col"
                                            className="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase"
                                        >
                                            Id
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase"
                                        >
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase"
                                        >
                                            Email
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase"
                                        >
                                            View
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase"
                                        >
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-gray-200">
                                    {data.map((users) => (
                                        <tr
                                            key={users.id}
                                            className="hover:bg-gray-200 cursor-pointer"
                                        >
                                            <td className="px-6 py-4 text-center text-sm font-medium text-gray-800">
                                                {users.id}
                                            </td>
                                            <td className="px-6 py-4 text-center text-sm text-gray-800">
                                                {users.name}
                                            </td>
                                            <td className="px-6 py-4 text-center text-sm text-gray-800">
                                                {users.email}
                                            </td>
                                            <td className="px-6 py-4 text-center text-sm font-medium">
                                                <a
                                                    href={`/users/view/${users.id}`}
                                                    className="inline-flex bg-yellow-500 p-2 items-center text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-yellow-600 focus:outline-none"
                                                >
                                                    View
                                                </a>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <a
                                                    href={`/users/delete/${users.id}`}
                                                    className="inline-flex items-center bg-red-500 p-2 gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-red-600 focus:outline-none"
                                                >
                                                    Delete
                                                </a>
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
