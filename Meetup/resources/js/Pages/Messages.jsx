import React, { useEffect, useRef } from "react";
import { useForm } from "@inertiajs/react";
import MessageItem from "@/Components/MessageItem";
import NoData from "@/Components/NoData";

const Messages = ({ messages, userId, setMessages, groupdata }) => {
    const { data, setData, post, errors } = useForm({
        message: "",
        image: null,
        file: null,
    });
    const endOfMessagesRef = useRef(null); // Create a reference for the end of messages

    const handleChange = (e) => {
        const { name, value, files } = e.target;
        if (files) {
            setData(name, files[0]); // Only set the first file
        } else {
            setData(name, value);
        }
    };

    const handleImageUpload = (e) => {
        handleChange(e); // Use the same handleChange for image
    };

    const handleFileUpload = (e) => {
        handleChange(e); // Use the same handleChange for file
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log("Form submitted with message:", data.message);

        // Prevent submitting if all inputs are empty
        if (!data.message.trim() && !data.file && !data.image) return;

        const formData = new FormData();
        formData.append("message", data.message);
        if (data.file) {
            formData.append("file", data.file);
        }
        if (data.image) {
            formData.append("image", data.image);
        }

        post(`/messages/${groupdata.code}`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
            onSuccess: () => {
                console.log("Message sent successfully");
                setData({ message: "", image: null, file: null }); // Clear inputs on success
            },
            onError: (error) => {
                console.error("Error sending message:", error);
            },
        });
    };

    // Scroll to the bottom of the messages whenever messages change
    useEffect(() => {
        if (endOfMessagesRef.current) {
            endOfMessagesRef.current.scrollIntoView({ behavior: "smooth" });
        }
    }, [messages]);

    return (
        <>
            <div className="flex flex-col space-y-4 p-4 w-[55vw] h-[93vh] overflow-auto bg-[#1E272C]">
                {messages.length > 0 ? (
                    messages.map((message) => (
                        <MessageItem
                            key={message.id}
                            message={message}
                            userId={userId}
                        />
                    ))
                ) : (
                    <div className="flex items-center justify-center h-full">
                        <NoData />
                    </div>
                )}
                <div ref={endOfMessagesRef} />
            </div>
            <form onSubmit={handleSubmit} className="flex h-[7vh] w-[55vw]">
                <button
                    type="button"
                    onClick={() =>
                        document.querySelector('input[name="image"]').click()
                    }
                    className="bg-gray-200 p-2 border border-r-gray-600"
                >
                    <img src="https://img.icons8.com/?size=48&id=xZiTPdO57ltQ&format=png" />
                </button>
                <button
                    type="button"
                    onClick={() =>
                        document.querySelector('input[name="file"]').click()
                    }
                    className="bg-gray-200 p-2"
                >
                    <img src="https://img.icons8.com/?size=48&id=12053&format=png" />
                </button>
                <input
                    type="text"
                    name="message"
                    placeholder="Type a message"
                    value={data.message}
                    onChange={handleChange}
                    className="w-full outline-none"
                />
                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    onChange={handleImageUpload}
                    className="hidden" // Hide the default file input
                />

                <input
                    type="file"
                    name="file"
                    accept=".txt,.pdf,.jpg,.jpeg,.png,.gif"
                    onChange={handleFileUpload}
                    className="hidden"
                />

                <button
                    type="submit"
                    className="px-4 py-1 bg-green-500 text-white"
                >
                    Send
                </button>
            </form>
            {errors.message && (
                <div className="text-red-600">{errors.message}</div>
            )}
        </>
    );
};

export default Messages;
