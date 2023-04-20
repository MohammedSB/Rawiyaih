import React from "react";
import "./LoginPop.css";
import { ReactComponent as Close } from '../../media/common/close.svg';
import { Link } from "react-router-dom";

export default function LoginPop({toggleShowLogin}) {
    return (
        <>
        <div className="popup">
            <div className="popup-container">
            <div className="popup-header">

            <Close onClick={() => toggleShowLogin()} id="close"></Close>
            {/* <div className="title">تسجيل الدخول</div> */}
        
            </div>
            
            <div className="popup-form">
                <input type="text" name="name" placeholder="الاسم"></input>
                <input type="password" name="password" placeholder="كلمة المرور"></input>
                <button className="login">تسجيل دخول</button>
            </div>

            <div className="popup-footer">
                <p>ليس لديك حساب؟<Link to="register"> إنشاء حساب جديد</Link>    
                </p>
            </div>

            </div>
        </div>
        </>
    )
}