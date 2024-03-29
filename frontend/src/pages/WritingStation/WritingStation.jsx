import Navbar from '../../components/Navbar/Navbar';
import './WritingStation.scss';
import React, { useEffect, useState } from "react";
import { useNavigate, useLocation } from 'react-router-dom';
import { useForm } from "react-hook-form";
import axios from 'axios';
import Button from '../../components/Button/Button';
import { useContext } from 'react';
import AuthContext from '../../context/AuthContext';

export default function WritingStation() {

    const navigate = useNavigate();
    const {user, authTokens} = useContext(AuthContext);
    const [book, setBook] = useState(0)

    // Extract book ID if it's not a new book.
    const location = useLocation();
    let book_id = location.state ? location.state.book_id : null;

    const getBook = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/books/get-book/", {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + String(authTokens.access)
        },
        params: {
            id: book_id
        }
        }).then(function(r) {
            if (r.status == 200) {
                return r.data;
            }
        });
        setBook(...response.book)
    }

    const { register, handleSubmit, setValue, watch, formState: { errors } } = useForm();

    const onSubmit = data => {
        console.log(data);
        const payload = {
            id: book_id,
            author: user.username,
            title: data.title,
            content: data.content,
            is_published: false,
        }
        console.log(payload);
        axios.post('http://127.0.0.1:8000/api/books/save-book/', payload)
        .then( () => {
            navigate('/myworks');
        })
        .catch(function (error) {
            console.log(error);
        });
    };

    useEffect(() => {
        register('content');
        getBook();
      }, [register]);

    return (
        <>
        <Navbar></Navbar>
        <div className='ws-container'>
            <form onSubmit={handleSubmit(onSubmit)}>

            <div className='ws-title-container'>
                <input 
                id='ws-title'
                defaultValue={book?.title}
                {...register('title',{required: true})}
                placeholder='العنوان'
                name='title'
                >
                </input>
            </div>

            <div className='ws-writingarea-container'>
                <textarea 
                id='ws-content'
                defaultValue={book?.content}
                {...register('content', {required: true})}
                >
                </textarea>
            </div>

            <Button placeholder={'حفظ'}></Button>
            </form>
        </div>        
        </>
    )
}