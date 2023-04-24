import React from "react";
import axios from "axios";
import jwt_decode from 'jwt-decode';
import { createContext, useState, useEffect } from "react";
import { Outlet, useNavigate } from 'react-router-dom';
import { set } from "react-hook-form";

const AuthContext = createContext();

export default AuthContext;

const getTokens = () => localStorage.getItem('authTokens') ? JSON.parse(localStorage.getItem('authTokens')) : null;
function getUser() {
    if (localStorage.getItem('authTokens')) {
        let data = jwt_decode(localStorage.getItem('authTokens'));
        let user_info = {
            username: data.username
        } 
        return user_info;
    }
    return null
}

export function AuthProvider() {

    let [authTokens, setAuthTokens] = useState(() => getTokens());
    let [user, setUser] = useState(() => getUser());
    const navigate = useNavigate();

    function loginUser(data) {
        const result = axios.post('http://127.0.0.1:8000/api/users/token/', {
            'username': data.username,
            'password': data.password,
        }).then(function (response) {
            if (response.status === 200) {
                setAuthTokens(response.data);
                setUser(jwt_decode(response.data.access))
                localStorage.setItem('authTokens', JSON.stringify(response.data))
            }
            return response;
        }).catch((response) => response)
        return result;
    }

    function logoutUser() {
        setAuthTokens(null);
        setUser(null);
        localStorage.removeItem('authTokens');
        navigate('/');
    }

    const contextData = {
        
        user:user,
        setUser: setUser,
        authTokens:authTokens,
        setAuthTokens:setAuthTokens,

        loginUser: loginUser,
        logoutUser: logoutUser,
    }

    return (
        <AuthContext.Provider value={contextData}>
            <Outlet />
        </AuthContext.Provider>
    )
}