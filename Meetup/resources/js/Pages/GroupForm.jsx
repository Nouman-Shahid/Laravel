import ApplicationLogo from "@/Components/ApplicationLogo";
import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import { Inertia } from "@inertiajs/inertia"; // Import Inertia here

const GroupForm = () => {
    const [formData, setFormData] = useState({
        groupName: "",
        groupImage: null,
        terms: false,
    });

    const handleChange = (e) => {
        const { name, value, type, files, checked } = e.target;
        setFormData((prev) => ({
            ...prev,
            [name]:
                type === "file"
                    ? files[0]
                    : type === "checkbox"
                    ? checked
                    : value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData();
        data.append("name", formData.groupName);
        data.append("groupimage", formData.groupImage);
        data.append("terms", formData.terms);

        Inertia.post("/group", data, {
            onSuccess: () => {
                setFormData({ groupName: "", groupImage: null, terms: false });
            },
        });
    };

    return (
        <main className="h-screen w-screen justify-center items-center flex">
            <Head title="Create A Group" />

            <form
                className="w-auto flex flex-col justify-center items-center bg-gray-50 p-10 rounded-2xl border border-red-200"
                onSubmit={handleSubmit}
                method="POST"
            >
                <ApplicationLogo />
                <div className="font-poppins font-bold my-8 text-[2.8vh]">
                    Create A Group
                </div>
                <div className="mb-5">
                    <label
                        htmlFor="groupName"
                        className="block mb-2 text-sm font-medium text-gray-900"
                    >
                        Group Name
                    </label>
                    <input
                        type="text"
                        id="groupName"
                        name="groupName"
                        value={formData.groupName}
                        onChange={handleChange}
                        className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[30vw] p-2.5"
                        required
                    />
                </div>
                <div className="mb-5">
                    <label
                        htmlFor="groupImage"
                        className="block mb-2 text-sm font-medium text-gray-900"
                    >
                        Group Image
                    </label>
                    <input
                        type="file"
                        id="groupImage"
                        name="groupImage"
                        onChange={handleChange}
                        className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[30vw] p-2.5"
                        required
                    />
                </div>
                <div className="flex items-start mb-5 w-[30vw]">
                    <div className="flex items-center h-5">
                        <input
                            id="terms"
                            type="checkbox"
                            name="terms"
                            checked={formData.terms}
                            onChange={handleChange}
                            className="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                            required
                        />
                    </div>
                    <label
                        htmlFor="terms"
                        className="ms-2 text-sm font-medium text-gray-900"
                    >
                        I agree with the{" "}
                        <a href="#" className="text-blue-600 hover:underline">
                            terms and conditions
                        </a>
                    </label>
                </div>
                <button
                    type="submit"
                    className="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    Create Group
                </button>
            </form>
        </main>
    );
};

export default GroupForm;
