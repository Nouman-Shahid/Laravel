import { useState } from "react";
import { useAuth0 } from "@auth0/auth0-react";
import LogoutButton from "./LogoutButton";
import LoginButton from "./LoginButton";

const Navbar = () => {
  const { user, isAuthenticated } = useAuth0();
  const [isDropdownOpen, setIsDropdownOpen] = useState(false);

  const toggleDropdown = () => {
    setIsDropdownOpen((prevState) => !prevState);
  };

  const closeDropdown = () => {
    setIsDropdownOpen(false);
  };

  return (
    <>
      <header>
        <nav className="flex h-auto w-auto bg-white shadow-lg rounded-lg justify-between md:h-16">
          <div className="flex w-full justify-between">
            <div
              className="flex px-6 w-1/2 items-center font-semibold
            md:w-1/5 md:px-1 md:flex md:items-center md:justify-center"
            >
              <a href="" className="text-red-600">
                Seek.io
              </a>
            </div>

            <div
              className="hidden w-3/5 items-center justify-evenly font-semibold
            md:flex"
            >
              <a href="">Home</a>
              <a href="">About Us</a>
              <a href="">Products</a>
              <a href="">Contact</a>
            </div>
            <div className="hidden w-1/5 items-center justify-evenly font-semibold md:flex relative">
              {isAuthenticated ? (
                <>
                  <img
                    src={user.picture}
                    alt={user.name}
                    className="rounded-full size-10 cursor-pointer"
                    onClick={toggleDropdown}
                  />
                  {isDropdownOpen && (
                    <div
                      className="absolute right-20 mt-36 h-20 w-40 bg-white border rounded-lg shadow-md z-50"
                      onMouseLeave={closeDropdown}
                    >
                      <div className="flex flex-col">
                        <LogoutButton />
                      </div>
                    </div>
                  )}
                </>
              ) : (
                <>
                  <LoginButton />
                </>
              )}
            </div>
          </div>
        </nav>
      </header>
    </>
  );
};

export default Navbar;
