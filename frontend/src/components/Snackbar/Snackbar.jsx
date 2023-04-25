import "./Snackbar.css";
import React, { useContext } from "react";
import { useState, useEffect } from "react";
import SnackbarContext from "../../context/SnackbarContext";
import { ReactComponent as Cancel } from '../../media/common/cancel.svg';
import { ReactComponent as Check } from '../../media/common/check.svg';

export default function Snackbar() {

    const {msg, title, isSuccess} = useContext(SnackbarContext);

    return (
        <>
        <div className="snackbar" role="alert" aria-live="assertive" aria-atomic="true">
            {isSuccess 
            ? <Check fill='rgb(70, 150, 67)'></Check>
            : <Cancel fill='rgb(175, 34, 43)'></Cancel>
            }
            <span>{msg}</span>
        </div>
        </>
    )
};