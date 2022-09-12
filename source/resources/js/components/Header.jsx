import React from 'react';

export default function Header({ className, name }){
    return(
        <div className={`header ${className}`}>{name}</div>
    );
}
