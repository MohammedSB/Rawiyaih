import Navbar from '../../components/Navbar/Navbar';
import './WritingStation.scss';
import React from "react";

export default function WritingStation() {
    return (
        <>
        <div className='ws-container'>
            <div className='ws-title-container'>

            <input name='title'>
            </input>

            </div>

            <div className='ws-writingarea-container'>
                <textarea>

                </textarea>
            </div>
        </div>        
        </>
    )
}