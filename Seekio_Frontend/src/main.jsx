import React from "react";
import { createRoot } from "react-dom/client";
import { Auth0Provider } from "@auth0/auth0-react";
import App from "./App";
import "./index.css";

const root = createRoot(document.getElementById("root"));

root.render(
  <Auth0Provider
    domain="tick-task.au.auth0.com"
    clientId="g6W2lkrFel6aKB6wsJbkeCdXktHMKbI4"
    authorizationParams={{
      redirect_uri: window.location.origin,
    }}
  >
    <App />
  </Auth0Provider>
);
