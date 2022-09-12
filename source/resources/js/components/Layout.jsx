import React from 'react';
import { Outlet } from "react-router-dom";

export default function Layout({ className, name }){
    return(
        <div className={"wrapper"}>
            <Outlet />
        </div>
    );
}
