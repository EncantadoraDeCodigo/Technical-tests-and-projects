let action = ['run', 'jump', 'jump', 'run', 'run', 'jump'];
let floor = ['|', '_', '_', '_', '|', '|'];
let correct = true;

function Carrera() {
    for (let key in action) {
        if (action[key] == 'run' && floor[key] == '_' || action[key] == 'jump' && floor[key] == '|') {
            // Acción correcta, no se necesita cambio
        } else if (action[key] == 'jump' && floor[key] == '_') {
            floor[key] = 'x';
            correct = false;
        } else if (action[key] == 'run' && floor[key] == '|') {
            floor[key] = '/';
            correct = false;
        }
    }
    console.log(floor.join('')); 
    return correct; 
}

let result = Carrera();
console.log(result); 
