import './App.css';
import MainPage from './pages/MainPage/MainPage';
import Register from './pages/Register/Register';
import { AuthProvider } from './context/AuthContext';
import { SnackbarProvider } from './context/SnackbarContext';
import { Router, Routes, Route } from "react-router-dom"
import Library from './pages/Library/Library';
import Snackbar from './components/Snackbar/Snackbar';
import SnackbarContext from './context/SnackbarContext';
import { useContext } from 'react';
import MyWorks from './pages/MyWorks/MyWorks';
import WritingStation from './pages/WritingStation/WritingStation';

function App() {

  const {isDisplayed} = useContext(SnackbarContext);
  
  return (
    <>
      {isDisplayed && <Snackbar/>}

      <Routes>
        <Route element={<AuthProvider />}>  
          <Route exact path='/' element={<MainPage/>}/>
          <Route path='/register' element={<Register/>}/>
          <Route path='/library' element={<Library/>}/>
          <Route path='/myworks' element={<MyWorks/>}/>
          <Route path='/writing' element={<WritingStation/>}/>
        </Route>
      </Routes>
    </>
  );
}

export default App;
