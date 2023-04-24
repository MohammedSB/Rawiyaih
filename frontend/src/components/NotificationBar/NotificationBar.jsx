import "./NotificationBar.css";
import React from "react";
import { useState, useEffect } from "react";

export default function NotificationBar({content, title="إشعار", timed=true}) {
    return (
        <>
        {show && 
        <div className="notif-snackbar" role="alert" aria-live="assertive" aria-atomic="true">
            <div className="notif-snackbar-title">{title}</div>
            <span>
            {content}
            </span>
        </div>
        }
        </>
    )
};