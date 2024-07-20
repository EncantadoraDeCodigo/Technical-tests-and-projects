const prompt= require('prompt-sync')();

let user = prompt('Type the number to figure out its factorial: ');
let Operación= 1;

function Factorial(){
    for(let i =1; i <= user; i++){
    Operación*= i
    }
    console.log('The factorial of' +' '+ user + ' is '+ Operación);

};
Factorial();