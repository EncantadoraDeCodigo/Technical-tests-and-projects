//Proposito: Hacer un medidor de el indice de masa corporal apartir del peso corporal en kilogramos y altura en metros Su fórmula es = Peso/(Altura)^2
const prompt = require("prompt-sync")();

let weigth = prompt("Dígite su peso en kilogramos: ");
let height = prompt("Dígite altura en metros con su decimal correspondiente: ");

function IMC() {

  let operacion = weigth / height ** 2;
    console.log("Su indice de masa corporal es: " + operacion);
}

IMC();
