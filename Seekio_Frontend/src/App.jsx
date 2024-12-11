import React from "react";
import { useAuth0 } from "@auth0/auth0-react";
import Navbar from "./Components/Navbar";

const App = () => {
  const { user, isAuthenticated, isLoading } = useAuth0();

  if (isLoading) {
    return <div>Loading ...</div>;
  }

  return (
    <>
      <Navbar />
      {isAuthenticated && (
        <div className="flex justify-center flex-col items-center mt-10">
          <h2 className="font-bold text-2xl">
            Welcome{" "}
            <span className="text-blue-600 text-3xl ">{user.name}!</span>
          </h2>
        </div>
      )}
    </>
  );
};

export default App;
