import React, { useState } from 'react';
import Child from './componentes/Child'

function App(){
  const [nombre, setNombre] = useState('Victoria');
  const [mensaje, setMensaje] = useState("")


  const addMessage = (mensaje) => {
    console.log(mensaje)
    setMensaje(mensaje);
  }


  return (<div>
    App Component
    <h1>{ mensaje }</h1>
    <hr />
    <Child nombre= {nombre} addMessage={addMessage}/>
  </div>)
  
}
export default App;
