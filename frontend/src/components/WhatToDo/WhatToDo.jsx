import "./WhatToDo.scss"

export default function WhatToDo({icon, title, content, buttonContent}) {
    return (
        <>
        <div className="wtd-box-container">
            <div className="wtd-box">
            <div className="wtd-box-icon">
                <img src={icon}></img>
            </div>
            <div className="wtd-box-body">
                <h1 id="wtd-box-body-title">
                    {title}
                </h1>
                <p id="wtd-box-body-content">
                    {content}
                </p>
                <button id="wtd-box-body-button">
                    {buttonContent}
                </button>
            </div>
            </div>
        </div>
        </>
    )
}