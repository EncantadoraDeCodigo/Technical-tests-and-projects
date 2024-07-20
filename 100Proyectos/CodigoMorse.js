const morseCode = {
    a: ".-",
    b: "-...",
    c: "-.-.",
    d: "-..",
    e: ".",
    f: "..-.",
    g: "--.",
    h: "....",
    i: "..",
    j: ".---",
    k: "-.-",
    l: ".-..",
    m: "--",
    n: "-.",
    o: "---",
    p: ".--.",
    q: "--.-",
    r: ".-.",
    s: "...",
    t: "-",
    u: "..-",
    v: "...-",
    w: ".--",
    x: "-..-",
    y: "-.--",
    z: "--.."
};

function NaturalMorse() {
    let Words = 'Melatonina';
    let EnMorse = ' ';

    for(let key in morseCode){
        if(Words ==! morseCode[key])
            for (let i = 0; i < Words.length; i++) {
                let EachPosition = Words[i]; 
                if (EachPosition  === ' ') {
                    EnMorse += ' '; 
                } else if (morseCode[EachPosition]) {
                    EnMorse += morseCode[EachPosition ] + ' '
                }
            }

    }

    

    console.log(EnMorse); 
}

NaturalMorse();


/*for (let key in morseCode) {
        if (Words === morseCode[key]) {
            console.log(Words + ' Es morse');
            return;
        }
    } */

