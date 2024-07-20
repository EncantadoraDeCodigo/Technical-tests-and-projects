let palabra = 'eye';
let palabraSpace = palabra.split('');
let alreves = palabra.split('').reverse();
console.log(palabraSpace);
console.log(alreves);
let EsPalindromo = true;

function Palindromo() {
    for (let i = 0; i < palabraSpace.length; i++) {
            if (palabraSpace[i] !== alreves[i]) {
                EsPalindromo = false;
                break
            }
        }
        
    if(EsPalindromo){
        console.log(true)
    }   else{
        console.log(false)
    }
}

Palindromo();

