import './MyWorks.scss';        
import {React, useContext} from "react";
import Book from '../../components/Book/Book';
import Navbar from '../../components/Navbar/Navbar';
import AuthContext from "../../context/AuthContext";
import { Link } from 'react-router-dom';
import axios from 'axios';

export default function MyWorks() {

    const {authTokens} = useContext(AuthContext);

    const books = axios.get("http://127.0.0.1:8000/api/books/show-books/", {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + String(authTokens.access)
      },
    }).then(e => console.log(e.data));

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