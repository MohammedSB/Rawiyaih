import './Book.scss';
import React from "react";

export default function Book({title, author, is_published}) {
    return (
        <>
        <div className='book-container'>
            <div className='book expand'>
            </div>
            <div className='book-information'>
                <div className='book-title'>{title}</div>
                <div className='book-author'>{author}</div>
                <div className='book-published'>{is_published ? "منشور" : "غير منشور"}</div>
            </div>

        </div>
        </>
    )
}

