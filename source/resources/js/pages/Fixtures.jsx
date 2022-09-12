import React, {useEffect, useState} from 'react';
import Header from './../components/Header.jsx'
import Label from './../components/Label.jsx'
import Button from './../components/Button.jsx'
import { useNavigate } from "react-router-dom";

export default function Fixtures(){
    const [isLoading, setIsLoading] = useState(true);
    const [fixtures, setFixtures] = useState([]);

    const getFixtures = () =>
        axios.get("api/v1/generate-fixture").then((resp) => {
            setFixtures(resp.data);
            setIsLoading(false);
        });

    const navigate = useNavigate();
    const startSimulation = () => navigate("/simulation");

    useEffect(() => {
        getFixtures();
        console.log(fixtures);
    }, []);

    return(
        !isLoading && <>
            <span className={"font-thin text-2xl pb-2"}>Generated Fixtures</span>
            <div className="">
                {fixtures.map((data, key) => {
                    return (<div className={"w-[310px] mx-2 my-2 inline-block"}>
                        <Header name={data.week} />
                        {
                            data.data.map((team, k) => {
                                return <div className={"group-label"}>
                                    <Label key={k} className={"grp-label w-[150px]"} name={team.home} />
                                    <Label key={k} className={"grp-label"} name={"-"} />
                                    <Label key={k} className={"grp-label w-[150px]"} name={team.away} />
                                </div>
                            })
                        }
                    </div>);
                })}
            </div>
            <Button name={"Start Simulation"} clickEvent={startSimulation} />
        </>

    );
}
