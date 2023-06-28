import './Book.css';
import React from "react";

export default function Book({title, author}) {
    return (
        <>
        <div className='book-container'>
            <div className='book'>
            </div>

            <div className='book-information'>
                <div className='book-title'>{title}</div>
                <div className='book-author'>{author}</div>
            </div>

        </div>
        </>
    )
}

