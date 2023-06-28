import './MyWorks.scss';        
import React from "react";
import Book from '../../components/Book/Book';
import Navbar from '../../components/Navbar/Navbar';
import { Link } from 'react-router-dom';

export default function MyWorks() {
    return(
        <>
        <Navbar></Navbar>

        <div className='mw-background'>
        <div className='mw-container'>
            <div className="mw-header">كتبي</div>

            <div className="mw-books-container">
            <Book title="thirty days" author="mohammed"></Book>
            </div>

            <div className="mw-footer pull-left">
                <Link to='/writing'><button id="new-book">New Book</button></Link>
            </div>
        </div>
        </div>
        </>
    )
}