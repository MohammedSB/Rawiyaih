import "./WhatToDo.scss"

export default function WhatToDo({icon, title}) {
    return (
        <>
        <div className="wtd-box-container">
            <div className="wtd-box">
            <div className="wtd-box-icon">
            <img src={icon}></img>
            </div>
            <div className="wtd-box-body">
            <h1>{title}</h1>
            </div>
            </div>
        </div>
        </>
    )
}