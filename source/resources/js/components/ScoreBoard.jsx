import Label from "./Label";
import React from "react";


export default function ScoreBoard({team, p, w, d, l, pt, gd}){
    return (<div className={"flex flex-row mx-2 my-2"}>
        <div  className={"group-label"}>
            <Label key={`home`} className={"grp-label w-[200px]"} name={team} />
            <Label key={`p`} className={"grp-label w-[50px] text-center"} name={p} />
            <Label key={`w`} className={"grp-label w-[50px] text-center"} name={w} />
            <Label key={`d`} className={"grp-label w-[50px] text-center"} name={d} />
            <Label key={`l`} className={"grp-label w-[50px] text-center"} name={l} />
            <Label key={`pt`} className={"grp-label w-[50px] text-center"} name={pt} />
            <Label key={`gd`} className={"grp-label w-[50px] text-center"} name={gd} />
        </div>
    </div>)
}
