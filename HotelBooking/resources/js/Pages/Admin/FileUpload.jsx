import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";

const FileUpload = () => {
    const [file, setFile] = useState(null);

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        if (!file) {
            alert("Please select a file.");
            return;
        }

        const formData = new FormData();
        formData.append("file", file);

        try {
            await Inertia.post("/upload", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                onSuccess: () => {
                    alert("File uploaded successfully.");
                },
                onError: () => {
                    alert("Error uploading file.");
                },
            });
        } catch (error) {
            console.error("An error occurred:", error);
        }
    };

    return (
        <div>
            <form onSubmit={handleSubmit}>
                <input
                    type="file"
                    accept=".csv, .xlsx"
                    onChange={handleFileChange}
                />
                <button type="submit">Upload</button>
            </form>
        </div>
    );
};

export default FileUpload;
