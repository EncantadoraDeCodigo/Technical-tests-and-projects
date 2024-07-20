    import React from "react";
    import styleMain from './weatherMainInfo.module.css'

    function WeatherMain({ weather }) {
    if (!weather) {
        //Si es falsy en este caso vacio carga el siguiente mensaje :)
        return <div>Loading...</div>; // Renderiza un mensaje de carga mientras los datos del clima están indefinidos
    }

    return (
        <div className= {styleMain.mainInfo} >
        <div className= {styleMain.city} >{weather.location.name}</div>
        <div className= {styleMain.country} >{weather.location.country}</div>
        <div className= {styleMain.row} >
            <div> 
            <img
                src={`http:${weather.current.condition.icon}`}
                width={128}
                alt={weather.current.condition.text}
            />
            </div>
            <div className= {styleMain.weatherCondition} >
            <div className= {styleMain.condition} >
                {weather?.current.condition.text}
                </div>
            <div className={styleMain.current} >{weather?.current.temp_c}°</div>
            </div>
        </div>
        <div className= {styleMain.mainInfo}>
            <iframe
            src={`https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15057.534307180755!2d${weather.location.lon}5!3d${weather.location.lat}5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smx!4v1651103744472!5m2!1sen!2smx`}
            width="100%"
            height="450"
            style={{ border: 0 }}
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        </div>
    );
    }

    export default WeatherMain;
