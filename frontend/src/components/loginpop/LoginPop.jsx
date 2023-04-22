import React from "react";
import axios from "axios";
import "./LoginPop.css";
import { ReactComponent as Close } from '../../media/common/close.svg';
import { Link } from "react-router-dom";
import { useForm } from "react-hook-form";
import { useContext } from "react";
import AuthContext from "../../context/AuthContext";
import Button from "../Button/Button";

export default function LoginPop({toggleShowLogin}) {

    const {loginUser} = useContext(AuthContext);

    const { register, handleSubmit, watch, formState: { errors } } = useForm();

    const onSubmit = data => {loginUser(data)}

    return (
        <>
        <div className="popup">
            <div className="popup-container">
            <div className="popup-header">

            <Close onClick={() => toggleShowLogin()} id="close"></Close>
            {/* <div className="title">تسجيل الدخول</div> */}
        
            </div>
            
            <form className="popup-form" method="get" onSubmit={handleSubmit(onSubmit)}>
                <input {...register("username")} type="text" name="username" placeholder="الاسم"></input>
                <input {...register("password")} type="password" name="password" placeholder="كلمة المرور"></input>
                <Button placeholder={'تسجيل دخول'}></Button>
            </form>

            <div className="popup-footer">
                <p>ليس لديك حساب؟<Link to="/register"> إنشاء حساب جديد</Link></p>
            </div>

            </div>
        </div>
        </>
    )
}