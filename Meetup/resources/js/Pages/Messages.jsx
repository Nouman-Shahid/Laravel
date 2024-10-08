import React from "react";
import { useForm } from "@inertiajs/react";
import MessageItem from "@/Components/MessageItem";
import NoData from "@/Components/NoData";

const Messages = ({ messages, userId, setMessages }) => {
    const { data, setData, post, errors } = useForm({ message: "" });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log("Form submitted with message:", data.message);
        if (!data.message.trim()) return; // Prevent submitting empty messages

        const newMessage = {
            id: Date.now(), // Temporary ID
            message: data.message,
            user_id: userId,
            user_name: "You",
            created_at: new Date().toISOString(),
        };

        setMessages((prevMessages) => [...prevMessages, newMessage]);

        post("/messages", {
            onSuccess: () => {
                console.log("Message sent successfully");
                setData({ message: "" }); // Clear input on success
            },
            onError: (error) => {
                console.error("Error sending message:", error);
                setMessages((prevMessages) =>
                    prevMessages.filter((msg) => msg.id !== newMessage.id)
                );
            },
        });
    };

    return (
        <>
            <div className="flex flex-col space-y-4 p-4 w-[55vw] h-[90vh] overflow-auto">
                {messages ? (
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
            </div>
            <form onSubmit={handleSubmit} className="flex h-[10vh] w-[55vw]">
                <input
                    type="text"
                    name="message"
                    placeholder="Type a message"
                    value={data.message}
                    onChange={handleChange}
                    className="w-full outline-none"
                />
                <button
                    type="submit"
                    className="px-4 py-1 bg-green-600 text-white"
                >
                    Submit
                </button>
            </form>
            {errors.message && (
                <div className="text-red-600">{errors.message}</div>
            )}{" "}
            {/* Display validation errors */}
        </>
    );
};

export default Messages;
