import Navbar from '../../components/Navbar/Navbar';
import './WritingStation.scss';
import React from "react";
import { useNavigate } from 'react-router-dom';
import { useForm } from "react-hook-form";
import axios from 'axios';
import Button from '../../components/Button/Button';

export default function WritingStation() {

    const navigate = useNavigate();

    const { register, handleSubmit, watch, formState: { errors } } = useForm();
    const onSubmit = data => {
        const payload = {
            title: data.title,
            content: data.content,
        }
        console.log(payload);
        axios.post('http://127.0.0.1:8000/api/books/save-book/', payload)
        .catch(function (error) {
            console.log(error);
        });
    };

    return (
        <>
        <Navbar></Navbar>
        <div className='ws-container'>
            <form onSubmit={handleSubmit(onSubmit)}>
            <div className='ws-title-container'>
            <input {...register("title")} name='title' >
            </input>

            </div>

            <div className='ws-writingarea-container'>
                <textarea {...register("content")} name='content'>

                </textarea>
            </div>
            <Button placeholder={"حفظ"}></Button>
            </form>
        </div>        
        </>
    )
}