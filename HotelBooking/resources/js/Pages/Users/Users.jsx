import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

import React from "react";
import Table from "./Table";

const Users = ({ data, user }) => {
    return (
        <AuthenticatedLayout
            user={user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    User Management
                </h2>
            }
        >
            <Head title="User Management" />

            <>
                <Table data={data} />
            </>
        </AuthenticatedLayout>
    );
};

export default Users;
