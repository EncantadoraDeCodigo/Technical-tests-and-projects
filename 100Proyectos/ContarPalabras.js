/*
 * Crea un programa que cuente cuantas veces se repite cada palabra
 * y que muestre el recuento final de todas ellas.
 * - Los signos de puntuación no forman parte de la palabra.
 * - Una palabra es la misma aunque aparezca en mayúsculas y minúsculas.
 * - No se pueden utilizar funciones propias del lenguaje que
 *   lo resuelvan automáticamente.
 */

let text = 'Encuentra algo que ames y deja que te mate'
let space = text.split(' ')
let TamañoSpace = space.length;


function CountWords(){
    for(let i = 0; i < TamañoSpace; i++){
        let counter = 0;
        for(let j =0; j < TamañoSpace; j++){
            if(space[i] == space[j]){
                counter++;
            }}   
        if(counter > 1){
            console.log(space[i] + ': ' + ' se repite ' + counter + ' veces')
        } else{
            console.log(space[i] + ': ' + ' se repite ' + counter + ' vez')
        }
        
    };
    
};

CountWords();