import React, {useEffect, useState} from 'react';
import { useNavigate } from "react-router-dom";
import Header from './../components/Header.jsx'
import Label from './../components/Label.jsx'
import Button from './../components/Button.jsx'
import Loading from "../components/Loading";

export default function Teams(){
    const [isLoading, setIsLoading] = useState(true);
    const [teams, setTeams] = useState([]);

    const getTeams = () =>
        axios.get("api/v1/teams").then((resp) => {
            setTeams(resp.data);
            setIsLoading(false);
        });

    const navigate = useNavigate();
    const generateFixture = () => navigate("/fixtures");

    useEffect(() => {
        getTeams();
    }, []);

    return(
        isLoading ? <Loading /> : <>
            <div className="container">
                <span className={"font-thin text-2xl pb-2"}>Tournament Teams</span>
                <Header name={"Team Name"} />
                {teams.map((data, key) => <Label key={key} name={data.name} />)}
            </div>
            <Button name={"Generate Fixtures"} clickEvent={generateFixture} />
        </>

    );
}
