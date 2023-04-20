import React, { useState } from 'react';
import { ReactComponent as Dropdown } from '../../media/common/dropdown-white.svg';
import LoginPop from '../loginpop/LoginPop';
import './Navbar.css';

export default function Navbar() {

    const [showLogin, setShowLogin] = useState(false);

    function toggleShowLogin() {
        setShowLogin(!showLogin);
    }

    return (
        <>
        <div 
        className='navbar-container'>

            {showLogin && (
                <LoginPop
                toggleShowLogin={toggleShowLogin}
                />
            )}

            <screen className='large-screen'>

            <div className='navbar-item' style={{color:"#DAA520"}}>ابدا الكتابة</div>
            <div className='navbar-item'>المكتبة</div>
            <div className='navbar-item'>المجتمع</div>

            </screen>

            <screen className='medium-screen'>
            
            <div className='navbar-item' id='dropdown'><Dropdown></Dropdown></div>

            </screen>

            <div className='navbar-item' id='login' onClick={() => toggleShowLogin()}>تسجيل الدخول</div>
            
        </div>
        </>
    )
}