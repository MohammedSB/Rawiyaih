import { Link } from 'react-router-dom';
import './Book.scss';
import React from "react";

export default function Book({id, title, author, is_published}) {
    return (
        <>
        <div className='book-container'>
            <Link to='/writing' state={{'book_id': id}}>
            <div className='book expand'>
            </div>
            </Link>
            <div className='book-information'>
                <div className='book-title'>{title}</div>
                <div className='book-author'>{author}</div>
                <div className='book-published'>{is_published ? "منشور" : "غير منشور"}</div>
            </div>
        </div>
        </>
    )
}

