//ANAGRAMA
//El metodo sort ordena en orden alfabetico

const prompt= require('prompt-sync')();

    let Words = prompt(
    "Type de word which you want to know if it is an anagrama: "
    );

    let Another = prompt(
        "Type the another word to compare: "
    )

    let Wordn= Words.split('').sort().join('');
    console.log(Wordn)


    let Anothern= Another.split('').sort().join('');
    console.log(Anothern)

    /*let Largo= Words.length;
    let LargoDos= Another.length;*/


function anagrama() {
    if (Wordn === Anothern) {
        console.log(true);
    }else{
        console.log(false)
    }
    
    }
    anagrama();
