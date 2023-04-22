import './App.css';
import MainPage from './pages/MainPage/MainPage';
import Register from './pages/Register/Register';
import { AuthProvider } from './context/AuthContext';
import { Router, Routes, Route } from "react-router-dom"
import Library from './pages/Library/Library';

function App() {
  return (
      <Routes>
        <Route element={<AuthProvider />}>
          <Route exact path='/' element={<MainPage/>}/>
          <Route path='/register' element={<Register/>}/>
          <Route path='/library' element={<Library/>}/>
        </Route>
      </Routes>
  );
}

export default App;
