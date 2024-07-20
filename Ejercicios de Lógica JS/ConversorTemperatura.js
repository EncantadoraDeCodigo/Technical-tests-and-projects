//Proposito: Conversor de tempratura de grados Celsius a Fahrenheit
//Requisito: El usuario debe poder ingresar la temperatura en grados celsius. Teniendo en cuenta que la fórmula para convertir de celsius a fahrenheit es (9/5 * C°) + 32

const prompt = require('prompt-sync')();

let Celsius= prompt('Ingrese el valor de grados Celsius a convertir: ')

function Conversor(){

    let operacion= (9/5 * Celsius) + 32;
    console.log('El valor de'+' ' + Celsius + ' °C' + ' ' + 'convertido a Fahrenheit es:' + ' ' + operacion + '°F')

}

Conversor ();

