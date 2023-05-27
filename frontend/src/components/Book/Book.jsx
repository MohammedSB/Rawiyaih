import './Book.css';
import React from "react";

export default function Book({title}) {
    return (
        <>
        <div className='book-container'>
            <div className='book'>
            </div>
            <div className='book-title'>{title}</div>
        </div>
        </>
    )
}

