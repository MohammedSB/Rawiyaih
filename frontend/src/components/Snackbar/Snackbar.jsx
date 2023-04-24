import "./Snackbar.css";
import React, { useContext } from "react";
import { useState, useEffect } from "react";
import SnackbarContext from "../../context/SnackbarContext";

export default function Snackbar() {

    const {msg, title} = useContext(SnackbarContext);

    return (
        <>
        <div className="snackbar" role="alert" aria-live="assertive" aria-atomic="true">
            <div className="snackbar-title">{title}</div>
            <span>{msg}</span>
        </div>
        </>
    )
};