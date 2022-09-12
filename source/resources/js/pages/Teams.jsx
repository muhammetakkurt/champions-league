import React, {useEffect, useState} from 'react';
import Header from './../components/Header.jsx'
import Label from './../components/Label.jsx'
import Button from './../components/Button.jsx'

export default function Teams(){
    const [isLoading, setIsLoading] = useState(true);
    const [teams, setTeams] = useState([]);

    const getTeams = () =>
        axios.get("api/v1/teams").then((resp) => {
            setTeams(resp.data);
            setIsLoading(false);
        });

    const generateFixture = () =>
        axios.get("api/v1/generate-fixture").then((resp) => {

        });

    useEffect(() => {
        getTeams();
    }, []);

    return(
        !isLoading && <>
            <div className="container">
                <span className={"font-thin text-2xl pb-2"}>Tournament Teams</span>
                <Header name={"Team Name"} />
                {teams.map((data, key) => <Label key={key} name={data.name} />)}
            </div>
            <Button name={"Generate Fixtures"} clickEvent={generateFixture} />
        </>

    );
}