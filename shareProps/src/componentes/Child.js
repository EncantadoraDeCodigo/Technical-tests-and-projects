import React from "react";

function Child({nombre, addMessage}){


    return (
        <div>{nombre}
        <button onClick={() => addMessage('Me gustas más que salir a fumar')}>Send message</button>
        </div>
    )
    
};

export default Child;
