import "../../media/_global.scss";
import "./MainPage.scss";
import Navbar from "../../components/Navbar/Navbar";
import book from '../../media/misc/book.png';
import community from '../../media/misc/community.png';
import pen from '../../media/misc/pen.png';
import WhatToDo from "../../components/WhatToDo/WhatToDo";
import { useContext } from "react";
import AuthContext from "../../context/AuthContext";

export default function MainPage() {

    const {user, logoutUser} = useContext(AuthContext);

    return(
        <>
        <Navbar></Navbar>
        <div className="info-container">
            <p className="info-title">اهلآ بك في راوية</p>    
            <p>موقع لكتابة و نشر القصص و الروايات العربية</p>    
        </div>

        {/* What to do o+n the website container */}
        <div className="wtd-container">
        <WhatToDo 
            icon={pen}
            title={"أنشر قصصك و رواياتك"}
            content={"شاركنا احدث رواياتك و انشرها بين القراء"}
            buttonContent={"ابدأ الكتابة"}
            to={user ? "login" : "myworks"}
            >
        </WhatToDo>
        <WhatToDo 
            icon={community}
            title={"تعرف على قراء وكتاب"}
            content={"مجتمع يضم المهتمين بكتابة القصص و الروايات"}
            buttonContent={"سجل الآن"}
            to={user ? "library" : "register"}
            >
        </WhatToDo>
        <WhatToDo 
            icon={book} 
            title={"إقراء احدث الروايات"} 
            content={"مجموعة من احدث ما خطتة أقلام كتابّ موقع راوية"}
            buttonContent={"ابدأ القراءة"}
            to={"library"}
            >
        </WhatToDo>
        </div>
        </>
    )
}