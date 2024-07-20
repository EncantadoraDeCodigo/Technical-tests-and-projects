import { useState, useEffect } from "react";
import WeatherForm from "./WeatherForm";
import WeatherMainInfo from "./weatherMainInfo";
import Style from './weatherApp.module.css'

function WeatherApp() {
    const [weather, setWeather] = useState(null);
    //arreglo de dependencias
    useEffect(() =>{
        loadInfo()
    }, [])

    useEffect(() =>{
        document.title = `Weather | ${weather?.location.name ?? ''}`
    }, [weather])



    async function loadInfo(city = "London") {
        const url = `https://api.weatherapi.com/v1/current.json?key=608c9273562d4029bb441840240407&q=${city}&aqi=no`;

        try {
            const response = await fetch(url);
            const json = await response.json();
            
            setWeather(json);
        } catch (error) {
            console.log("Hubo un error al cargar la información del clima:", error);
        }
    }

    function handleChangeCity(city) {
        setWeather(null); 
        loadInfo(city);
    }

    return (
        <div className={Style.weatherContainer} >
            <WeatherForm onChangeCity={handleChangeCity} />
            <WeatherMainInfo weather={weather}/>
        </div>
    );
}

export default WeatherApp;
