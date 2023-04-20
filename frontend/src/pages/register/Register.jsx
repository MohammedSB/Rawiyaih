import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useForm } from "react-hook-form";
import axios from 'axios';
import "./Register.css";

export default function Register() {
    
    const navigate = useNavigate();

    const { register, handleSubmit, watch, formState: { errors } } = useForm();
    const onSubmit = data => {
        const payload = {
            name: data.name,
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
            <input {...register("name")} type="text" name="name" placeholder="الاسم"></input>
            <input {...register("email")} type="email" name="email" placeholder="البريد الالكتروني"></input>
            <input {...register("password")} type="password" name="password" placeholder="كلمة المرور"></input>
            <button type="submit" className="login">تسجيل</button>
        </form>
        </div>
        </div>
        </>
    )
}