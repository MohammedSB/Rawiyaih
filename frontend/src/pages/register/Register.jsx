import React, { useState } from "react";
import { Link } from "react-router-dom";
import "./Register.css";

export default function Register() {

    const [user, setUser] = useState();

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

        <div className="form">
            
            <input type="text" name="name" placeholder="الاسم"></input>
            <input type="email" name="email" placeholder="البريد الالكتروني"></input>
            <input type="password" name="password" placeholder="كلمة المرور"></input>
            <button type="submit" className="login">تسجيل</button>
            
        </div>
        </div>
        </div>
        </>
    )
}