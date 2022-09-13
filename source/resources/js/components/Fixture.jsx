import Header from "./Header";
import Label from "./Label";
import React from "react";


export default function Fixture({ data }){
    return (<div className={"w-[310px] mx-2 my-2 inline-block"}>
        <Header name={data.week} />
        {
            data.data.map((team, k) => {
                return <div key={k} className={"group-label"}>
                    <Label key={`${k}-home`} className={"grp-label w-[150px]"} name={team.home} />
                    <Label key={`${k}-`} className={"grp-label"} name={"-"} />
                    <Label key={`${k}-away`} className={"grp-label w-[150px]"} name={team.away} />
                </div>
            })
        }
    </div>);
}
