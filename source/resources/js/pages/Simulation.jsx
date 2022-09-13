import React, {useEffect, useState} from 'react';
import {useNavigate} from "react-router-dom";
import Fixture from "../components/Fixture";
import Button from "../components/Button";
import Header from "../components/Header";
import Loading from "../components/Loading";
import ScoreBoard from "../components/ScoreBoard";

export default function Simulation(){
    const [isLoading, setIsLoading] = useState(true);
    const [scoreboard, setScoreboard] = useState([]);
    const [currentWeek, setCurrentWeek] = useState([]);

    const getScoreboard = () =>
        axios.get("api/v1/scoreboard").then((resp) => {
            console.log(resp.data);
            setScoreboard(resp.data);
            setIsLoading(false);
        });

    const getCurrentWeek = () =>
        axios.get("api/v1/fixture/current-week").then((resp) => {
            setCurrentWeek(resp.data);
            setIsLoading(false);
        }).catch(function (error) {
          setCurrentWeek([]);
        });

    const navigate = useNavigate();
    const resetData = () => {
        setIsLoading(true);
        axios.delete("api/v1/reset").then((resp) => {
            navigate('/');
        })
    };

    const playAllWeeks = () => {
        axios.get("api/v1/simulation/play-all-weeks").then((resp) => {
            getScoreboard();
            getCurrentWeek();
        })
    };

    const playNextWeek = () => {
        axios.get("api/v1/simulation/play-next-week").then((resp) => {
            getScoreboard();
            getCurrentWeek();
        })
    };

    useEffect( () => {
        getScoreboard();
        getCurrentWeek();
    }, []);

    return(
        isLoading ? <Loading /> : <>
            <span className={"font-thin text-2xl pb-2"}>Simulation</span>
            <div className={"flex flex-row"}>
                <div className="">
                    <div className={"flex flex-row  mx-2 my-2"}>
                        <Header className={"w-[200px]"} name={"Team Name"} />
                        <Header className={"w-[50px] text-center"} name={"P"} />
                        <Header className={"w-[50px] text-center"} name={"W"} />
                        <Header className={"w-[50px] text-center"} name={"D"} />
                        <Header className={"w-[50px] text-center"} name={"L"} />
                        <Header className={"w-[50px] text-center"} name={"PT"} />
                        <Header className={"w-[50px] text-center"} name={"GD"} />
                    </div>
                    {scoreboard && scoreboard.length > 0 && scoreboard?.map((data, key) =>  <ScoreBoard key={key}
                                                                 team={data.team}
                                                                 p={data.p}
                                                                 w={data.w}
                                                                 d={data.d}
                                                                 l={data.l}
                                                                 pt={data.pt}
                                                                 gd={data.gd} />)
                    }
                </div>
                <div className="">
                    {currentWeek?.map((data, key) => <Fixture key={key} data={data} />)}
                </div>
                <div className="">

                </div>
            </div>
            <div className={"flex flex-row w-[100%] justify-around"}>
                <Button name={"Play All Weeks"} clickEvent={playAllWeeks} />
                <Button name={"Play Next Week"} clickEvent={playNextWeek} />
                <Button name={"Reset Data"} className={"reset-button"} clickEvent={resetData} />
            </div>
        </>
    );
}
