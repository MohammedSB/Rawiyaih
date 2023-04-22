import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useForm } from "react-hook-form";
import axios from 'axios';
import "./Register.css";
import Button from '../../components/Button/Button'

export default function Register() {
    
    const navigate = useNavigate();

    const { register, handleSubmit, watch, formState: { errors } } = useForm();
    const onSubmit = data => {
        const payload = {
            username: data.username,
            email: data.email,
            password: data.password,
        }
        console.log(payload);
        axios.post('http://127.0.0.1:8000/api/users/create-user/', payload)
        .then(function (response) {
            navigate('/');
        })
        .catch(function (error) {
            console.log(error);
        });
    };

    const onChange = (e) => {
        
    } 

    return (
        <>
        <div className="background">
        <div className="container">

        <Link to="/" style={{textDecoration:'none'}}>
            <div className="header">
                الصفحة الرئيسية
            </div>  
        </Link>

        <div className="title">
            انشاء حساب جديد
        </div>


        <form className="form" onSubmit={handleSubmit(onSubmit)}>
            <input {...register("username", { required: true })} type="text" name="username" placeholder="الاسم"></input>
            <input {...register("email", { required: true })} type="email" name="email" placeholder="البريد الالكتروني"></input>
            <input {...register("password", { required: true })} type="password" name="password" placeholder="كلمة المرور"></input>
            <Button placeholder={"تسجيل"}></Button>
        </form>
        </div>
        </div>
        </>
    )
}