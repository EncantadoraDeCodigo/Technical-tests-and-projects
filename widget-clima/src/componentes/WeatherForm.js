import { useState } from "react";
import styleForm from './weatherForm.module.css';

function WeatherForm({onChangeCity}){
    const[city, setCity]= useState('')

    function OnChange(e){
        const value = e.target.value

        if(value !== ''){
            setCity(value)
        }
    }

    function handleSubmit(e){
        e.preventDefault();

        onChangeCity(city);
    }


    return(
        <form onSubmit={handleSubmit}className={styleForm.container}>
            <input type="text" onChange={OnChange} className={styleForm.input} />
        </form>
    )
};
export default WeatherForm;