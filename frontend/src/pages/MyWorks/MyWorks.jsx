import './MyWorks.scss';        
import {React, useContext, useEffect, useState} from "react";
import Book from '../../components/Book/Book';
import Navbar from '../../components/Navbar/Navbar';
import AuthContext from "../../context/AuthContext";
import { Link } from 'react-router-dom';
import axios from 'axios';

export default function MyWorks() {

    let [books, setBooks] = useState([]);
    const {authTokens} = useContext(AuthContext);

    useEffect(() => {
        getBooks();
    }, [])

    const getBooks = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/books/show-books/", {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + String(authTokens.access)
        },
        }).then(function(r) {
            if (r.status == 200) {
                return r.data;
            }
        });
        setBooks(response.books)
    }

    console.log(books.map(e => e.title))

    return(

        <>
        <Navbar></Navbar>

        <div className='mw-background'>
        <div className='mw-container'>
            <div className="mw-header">كتبي</div>

            <div className="mw-books-container"> 
            {books.map(book => 
                <Book key={book.id} title={book.title} author={book.author}></Book>
            )}
            </div>

            <div className="mw-footer pull-left">
                <Link to='/writing'><button id="new-book">New Book</button></Link>
            </div>
        </div>
        </div>
        </>
    )
}