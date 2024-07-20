const prompt= require("prompt-sync")();



function Fibonacci(){
let a= 0;
let b= 1;
let c= 0;

let user= prompt('Type the value: ');

    for(let i= 2; user >= i; i++){
        c = a + b;
        a= b;
        b= c;
        

    }
    console.log('El' + ' ' + user + '-énesimo número es: ' + c);
};

Fibonacci();