import React from "react";
import "./LoginPop.css";
import { ReactComponent as Close } from '../../media/common/close.svg';
import { Link } from "react-router-dom";
import { useForm } from "react-hook-form";
import axios from "axios";


export default function LoginPop({toggleShowLogin}) {

    const { register, handleSubmit, watch, formState: { errors } } = useForm();

    const onSubmit = data => {
        axios.get('http://127.0.0.1:8000/api/users/login-user/', data)
        .then(function (response) {
            console.log(response);
        })
        console.log(data);
    }

    return (
        <>
        <div className="popup">
            <div className="popup-container">
            <div className="popup-header">

            <Close onClick={() => toggleShowLogin()} id="close"></Close>
            {/* <div className="title">تسجيل الدخول</div> */}
        
            </div>
            
            <form className="popup-form" method="get" onSubmit={handleSubmit(onSubmit)}>
                <input {...register("name")} type="text" name="name" placeholder="الاسم"></input>
                <input {...register("password")} type="password" name="password" placeholder="كلمة المرور"></input>
                <button className="login">تسجيل دخول</button>
            </form>

            <div className="popup-footer">
                <p>ليس لديك حساب؟<Link to="register"> إنشاء حساب جديد</Link></p>
            </div>

            </div>
        </div>
        </>
    )
}