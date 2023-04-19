import React, { Component } from 'react';
import './Navbar.css';

export default function Header() {
    return (
        <>
        <div 
        className='navbar-container'>

            <div className='navbar-item'>ابدا الكتابة</div>
            <div className='navbar-item'>المكتبة</div>
            <div className='navbar-item'>المجتمع</div>


            <div className='navbar-item' id='login'>تسجيل الدخول</div>

        </div>
        </>
    )
}