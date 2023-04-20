import './App.css';
import MainPage from './pages/main_page/MainPage';
import Register from './pages/register/Register';
import { Routes, Route } from "react-router-dom"

function App() {
  return (
    <Routes> 
      <Route path='/' element={<MainPage/>}/>
      <Route path='register' element={<Register/>}/>
    </Routes>
  );
}

export default App;
