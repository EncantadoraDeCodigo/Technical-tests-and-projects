/*
 * Crea un programa que invierta el orden de una cadena de texto
 * sin usar funciones propias del lenguaje que lo hagan de forma automática.
 * - Si le pasamos "Hola mundo" nos retornaría "odnum aloH"
 */

const prompt = require('prompt-sync')();

let user = prompt('Type the text ehich you want to see: ');
let lastn = ' '

function Inverted(){
    for(let i = user.length - 1; i >= 0; i--){
        process.stdout.write(user[i]);
            
    }
};

Inverted();

/*
for (inicialización; condición; actualización) {
    // código a ejecutar en cada iteración
}
    */
