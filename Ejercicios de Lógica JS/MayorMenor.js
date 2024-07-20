const prompt = require('prompt-sync')();

function MayorMenor(){

    console.log('El número mayor de esta lista es: ' +  Math.max(17, 21, 5000, 800, 4586, 20, 5));
    console.log('El número menor de la lista es: ' + Math.min(17, 21, 5000, 800, 4586, 20, 5));


};

MayorMenor();