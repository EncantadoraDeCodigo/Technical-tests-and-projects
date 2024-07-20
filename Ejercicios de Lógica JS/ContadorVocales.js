const prompt = require('prompt-sync')();


function ContadorVocales(){

    let Frase= 'Vivir la experiencia onirica en la realidad tangible';

    let result = Frase.split('');



    let aCounter= 0;
    let eCounter= 0;
    let iCounter= 0;
    let oCounter= 0;
    let uCounter= 0;

for(let i = 0; i < result.length; i++){
    
    if (result[i] == 'a'){
        aCounter ++;

    } else if(result[i]  == 'e'){
        eCounter ++;
    } else if (result[i]  == 'i'){
        iCounter ++;
    } else if(result[i]  == 'o'){
        oCounter ++;
    } else if (result[i]  == 'u'){
        uCounter ++;
    }
    
    
    }
    console.log('a está ' + aCounter + ' veces');
    console.log('e está ' + eCounter + ' veces');
    console.log('i está ' + iCounter + ' veces');
    console.log('o está ' + oCounter + ' veces');
    console.log('u está ' + uCounter + ' veces');
};

ContadorVocales();