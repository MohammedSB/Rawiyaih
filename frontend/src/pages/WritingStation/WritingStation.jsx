import Navbar from '../../components/Navbar/Navbar';
import './WritingStation.scss';
import React, { useEffect } from "react";
import { useNavigate } from 'react-router-dom';
import { useForm } from "react-hook-form";
import axios from 'axios';
import Button from '../../components/Button/Button';
import { useContext } from 'react';
import AuthContext from '../../context/AuthContext';

export default function WritingStation() {

    const navigate = useNavigate();
    const {user} = useContext(AuthContext);

    const { register, handleSubmit, setValue, watch, formState: { errors } } = useForm();
    const onSubmit = data => {
        const payload = {
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
        register(
          'content',
          {required: true}
        );
      }, []);

    return (
        <>
        <Navbar></Navbar>
        <div className='ws-container'>
            <form onSubmit={handleSubmit(onSubmit)}>
            <div className='ws-title-container'>
            <input id='ws-title' {...register("title", {required: true})} placeholder='العنوان' name='title' >
            </input>

            </div>

            <div className='ws-writingarea-container'>
                <div 
                contentEditable='true'
                id="ws-content"
                onInput={(e) => {
                setValue('content', e.currentTarget.textContent, { shouldValidate: true });}}
                >  
                </div>
            </div>
            <Button placeholder={"حفظ"}></Button>
            </form>
        </div>        
        </>
    )
}