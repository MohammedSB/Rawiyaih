import React from "react";
import axios from "axios";
import "./LoginPop.css";
import { ReactComponent as Close } from '../../media/common/close.svg';
import { Link } from "react-router-dom";
import { useForm } from "react-hook-form";
import { useContext } from "react";
import AuthContext from "../../context/AuthContext";
import Button from "../Button/Button";
import { useNavigate } from "react-router-dom";
import Snackbar from "../Snackbar/Snackbar";
import SnackbarContext from "../../context/SnackbarContext";

export default function LoginPop({toggleShowLogin}) {

    const {setSnackbar} = useContext(SnackbarContext)
    const {loginUser} = useContext(AuthContext);
    const navigate = useNavigate();

    const { register, handleSubmit, watch, formState: { errors } } = useForm();

    const onSubmit = data => {
        console.log(data);
        loginUser(data)
        .then((r) => {
            if (r?.status === 200) { // Successful login
                navigate('/library');
            } else if (r?.response.status === 401) { // Wrong login credentials
                setSnackbar({
                    title: "حدث خطأ",
                    content: "الرجاء التأكد من اسم المستخدم وكلمة المرور"
                })
            } else {
                console.log(r);
                console.log('bad error');
            }
        })
    }

    return (
        <>
        <div className="popup">
            <div className="popup-container">
            <div className="popup-header">
        
            <Close onClick={() => toggleShowLogin()} id="close"></Close>
            <span id="popup-title">تسجيل الدخول</span>
        
            </div>
            
            <form className="popup-form" method="get" onSubmit={handleSubmit(onSubmit)}>
                <input {...register("username")} required type="text" name="username" placeholder="اسم المستخدم"></input>
                <input {...register("password")} required type="password" name="password" placeholder="كلمة المرور"></input>
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