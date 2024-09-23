import NavBar from "@/Components/NavBar";

export default function Authenticated({ user, header, children }) {
    return (
        <div className="min-h-screen overflow-x-hidden ">
            <NavBar auth={{ user }} />

            {header && (
                <header className=" font-poppins">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-2">
                        {header}
                    </div>
                </header>
            )}

            <main>{children}</main>
        </div>
    );
}
