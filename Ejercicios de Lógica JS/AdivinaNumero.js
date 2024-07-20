
const prompt = require('prompt-sync')();

let number = [];

function Adivina(){

    for(let i= 0; i <= 100; i++){
        number [i]= i;
    }

    let ParaAdivinar= Math.floor(Math.random() * number.length)
    console.log(ParaAdivinar);

    let user = prompt('Type the number you think is correct: ');
    if(ParaAdivinar == user){
        console.log('You got it right :)')
    }else if (ParaAdivinar < user){
            console.log('You are above than the number to guess :/' )
        } else{
            console.log('You are lower than the number to guess ;/')
        }

}

Adivina();