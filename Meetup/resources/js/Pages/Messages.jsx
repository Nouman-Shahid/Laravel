import React, { useEffect, useRef } from "react";
import { useForm } from "@inertiajs/react";
import MessageItem from "@/Components/MessageItem";
import NoData from "@/Components/NoData";

const Messages = ({ messages, userId, setMessages }) => {
    const { data, setData, post, errors } = useForm({ message: "" });
    const endOfMessagesRef = useRef(null); // Create a reference for the end of messages

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
                {/* This empty div will help us scroll to the bottom */}
                <div ref={endOfMessagesRef} />
            </div>
            <form onSubmit={handleSubmit} className="flex h-[7vh] w-[55vw]">
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
                    className="px-4 py-1 bg-green-500 text-white"
                >
                    <img src="https://img.icons8.com/?size=24&id=3925&format=png" />
                </button>
            </form>
            {errors.message && (
                <div className="text-red-600">{errors.message}</div>
            )}{" "}
        </>
    );
};

export default Messages;
