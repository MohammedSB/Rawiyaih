import React from "react";
import { 
    createContext,
    useState
} from "react";

import { Outlet } from "react-router-dom";

let timer;

const SnackbarContext = createContext()

export default SnackbarContext;

export function SnackbarProvider({children}) {
    const [msg, setMsg] = useState("");
    const [title, setTitle] = useState("");
    const [isDisplayed, setIsDisplayed] = useState(false);

    const setSnackbar = (msg) => {
        setTitle(msg?.title);
        setMsg(msg?.content);
        setIsDisplayed(true);
        timer = setTimeout(() => {
            onClose();
        }, 5000); 
    };

    const onClose = () => {
        clearTimeout(timer);
        setIsDisplayed(false);
    };

    const contextData = {
        msg:msg,
        title:title,
        isDisplayed: isDisplayed,
        setSnackbar: setSnackbar,
        onClose: onClose,
    }
    return (
        <SnackbarContext.Provider value={contextData}>
            <Outlet />
            {children}
        </SnackbarContext.Provider>
    )
}