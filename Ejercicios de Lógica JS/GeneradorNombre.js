//Proposito: Solicita al usuario su nombre, apellido y año de nacimiento, y genera un nombre de usuario combinándolos (por ejemplo, "AnaSmith1990").
const prompt= require("prompt-sync")();

let Name= prompt('Type your name: ');
let LastName= prompt('Type your last name: ');
let BirthDate= prompt('Type your birth date: ');

function CreateUser(){
    console.log('Your username is: ' + Name + LastName + BirthDate);
}

CreateUser();
