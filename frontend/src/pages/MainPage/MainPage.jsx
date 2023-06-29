import Navbar from "../../components/Navbar/Navbar";
import "./MainPage.scss"

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
            <div className="wtd-box-container">
            
                <div className="wtd-box">
                <div className="wtd-box-title">
                    w
                </div>
                </div>

            </div>
            <div className="wtd-box-container">
              
                <div className="wtd-box">

                </div>

            </div>
            <div className="wtd-box-container">

                <div className="wtd-box">

                </div>

            </div>
        </div>

        </>
    )
}