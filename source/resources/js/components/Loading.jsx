import React from 'react';
import LoadingGif from './../../img/loading.gif';

export default function Loading({ className, name }){
    return(
        <img src={LoadingGif} alt={"Loading"} />
    );
}
