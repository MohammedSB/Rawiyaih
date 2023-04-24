import React, { useState } from "react";

export default function useNotificationBar(timed=true) {
    const [show, setShow] = useState(false);

    useEffect(()=>{
        if (timed) {
        setInterval(function() {
            setShow(false)
                }, 5000);
            }
        }, [])
} 