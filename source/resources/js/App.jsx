import React from 'react';
import { createRoot } from 'react-dom/client';
import Layout from './components/Layout.jsx';
import Fixtures from './pages/Fixtures.jsx';
import Teams from './pages/Teams.jsx';
import Simulation from './pages/Simulation.jsx';
import {
    BrowserRouter,
    Routes,
    Route,
} from "react-router-dom";

export default function App(){
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Layout />}>
                    <Route index element={<Teams />} />
                    <Route path="fixtures" element={<Fixtures />} />
                    <Route path="simulation" element={<Simulation />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}
