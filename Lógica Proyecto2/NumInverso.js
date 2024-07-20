const prompt = require("prompt-sync")();

let UserNumber = prompt("Type the number which you want to see inverted: ");

function NumeroInvertido() {
    let inverted = UserNumber.split("").reverse().join('');
    console.log(inverted);
};
NumeroInvertido();
