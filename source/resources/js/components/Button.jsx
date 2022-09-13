import React from 'react';

export default function Button({ name, className, clickEvent }){
    return(
        <button className={`button ${className}`} onClick={clickEvent}>{name}</button>
    );
}
