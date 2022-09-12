import React from 'react';

export default function Button({ name, clickEvent }){
    return(
        <button className={"button"} onClick={clickEvent}>{name}</button>
    );
}
