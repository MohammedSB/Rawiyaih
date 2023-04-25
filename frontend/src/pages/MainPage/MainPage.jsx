import Navbar from "../../components/Navbar/Navbar";
import "./MainPage.css"

export default function MainPage() {
    return(
        <>
        <Navbar></Navbar>
        <div className="info-container">
            <p className="info-title">اهلآ بك في راوية</p>    
            <p>موقع لكتابة و نشر القصص و الروايات العربية</p>    
        </div>
        </>
    )
}