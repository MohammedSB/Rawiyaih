import Navbar from "../../components/Navbar/Navbar";
import "./MainPage.scss"
import book from '../../media/misc/book.png';
import community from '../../media/misc/community.png';
import pen from '../../media/misc/pen.png';
import WhatToDo from "../../components/WhatToDo/WhatToDo";

export default function MainPage() {
    return(
        <>
        <Navbar></Navbar>
        <div className="info-container">
            <p className="info-title">اهلآ بك في راوية</p>    
            <p>موقع لكتابة و نشر القصص و الروايات العربية</p>    
        </div>

        {/* What to do o+n the website container */}
        <div className="wtd-container">
        <WhatToDo icon={pen} title={"أنشر قصصك و رواياتك"}></WhatToDo>
        <WhatToDo icon={community} title="تعرف على مجتمع من القراء و الكتاب"></WhatToDo>
        <WhatToDo icon={book} title="إقراء احدث الروايات"></WhatToDo>
        </div>
        </>
    )
}