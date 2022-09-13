import React, {useEffect, useState} from 'react';
import Header from './../components/Header.jsx'
import Label from './../components/Label.jsx'
import Button from './../components/Button.jsx'
import Fixture from './../components/Fixture.jsx'
import { useNavigate } from "react-router-dom";
import Loading from "../components/Loading";

export default function Fixtures(){
    const [isLoading, setIsLoading] = useState(true);
    const [fixtures, setFixtures] = useState([]);

    const getFixtures = () =>
        axios.get("api/v1/fixture/generate").then((resp) => {
            setFixtures(resp.data);
            setIsLoading(false);
        });

    const navigate = useNavigate();
    const startSimulation = () => navigate("/simulation");

    useEffect(() => {
        getFixtures();
    }, []);

    return(
        isLoading ? <Loading /> : <>
            <span className={"font-thin text-2xl pb-2"}>Generated Fixtures</span>
            <div className="">
                {fixtures.map((data, key) => <Fixture key={key} data={data} />)}
            </div>
            <Button name={"Start Simulation"} clickEvent={startSimulation} />
        </>

    );
}
