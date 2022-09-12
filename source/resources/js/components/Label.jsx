import React from 'react';

export default function Label({ className, name }){
    return(
        <div className={`label ${className}`}>{name}</div>
    );
}
