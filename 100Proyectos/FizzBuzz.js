//Imprimir los numeros del uno al cien,
//Remplazar Fizz en los multiplos de 3

    function FizzBuzz() {
    for (let i = 1; i <= 100; i++) {
        if (i % 3 == 0 && i % 5 == 0) {
        console.log("Fizz Buzz");
        } else if (i % 5 == 0) {
        console.log("Buzz");
        } else if (i % 3 == 0) {
        console.log("Fizz");
        } else {
        console.log(i);
        }
    }
    }
    FizzBuzz();
