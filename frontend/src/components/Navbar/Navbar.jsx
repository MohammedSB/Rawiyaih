import './Navbar.css';

import React, { useState, useContext } from 'react';
import AuthContext from '../../context/AuthContext';
import { ReactComponent as Dropdown } from '../../media/common/dropdown.svg';
import { ReactComponent as LogoutImg } from '../../media/common/logout.svg';
import LoginPop from '../LoginPop/LoginPop';
import { Link, useNavigate } from 'react-router-dom';


export default function Navbar() {

    const {user, logoutUser} = useContext(AuthContext); 
    const [showLogin, setShowLogin] = useState(false);
    const [open, setOpen] = useState(false);

    const navigate = useNavigate();

    function dropdownOpen() {
        setOpen(!open);
    }

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
            
            {user
            ?
            <div className='navbar-item' style={{color:"#DAA520"}} onClick={() => navigate('/myworks')}>ابدا الكتابة</div>
            :
            <div className='navbar-item' style={{color:"#DAA520"}} onClick={() => navigate('/register')}>ابدا الكتابة</div>
            }
            
            <Link to='/library'><div className='navbar-item'>المكتبة</div></Link>
            {/* <div className='navbar-item'>المجتمع</div> */}

            </screen>


            <screen className='medium-screen'>            
            <div className='navbar-item' id='dropdown'><Dropdown></Dropdown></div>
            </screen>

            {user
            ?
            <div className='navbar-item' id='user-item' onClick={() => dropdownOpen()}>
                {user.username}
                {open &&
                <div className='dropdown'>
                <div className="dropdown-content">
                    <p onClick={() => logoutUser()} id='logout'>تسجيل الخروج</p>
                </div>
                </div>
                }
            </div>
            :
            <div className='navbar-item' id='user-item' onClick={() => toggleShowLogin()}>تسجيل الدخول
            </div>
            }
            
        </div>
        </>
    )
}