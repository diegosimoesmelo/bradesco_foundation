/* -------------------------------------------------
   1. Criando as variáveis
--------------------------------------------------*/

// Dados que NÃO devem mudar: use const
const nome   = 'Diego';
const cidade = 'Recife';

// Dado que pode mudar no futuro: use let
let   idade  = 31;

/* -------------------------------------------------
   2. Montando uma frase com template literals
--------------------------------------------------*/

console.log(`Olá, meu nome é ${nome}, tenho ${idade} anos e moro em ${cidade}.`);

/* -------------------------------------------------
   3. Só para mostrar que let permite alteração
--------------------------------------------------*/
idade = 32; // simula “ano seguinte”
console.log(`No ano que vem completarei ${idade} anos.`);

// // operador E 
// console.log((10 > 5) && (5 > 1));   true 
// console.log((4 == 4) && (10 < 5));   false
// console.log((3 >= 2) && (2 <= 2));  true 
// console.log((7 != 7) && (5 > 4));   false 
// console.log((8 > 3) && (3 < 10)); true

// // operador OU 
// console.log('teste');
// console.log((5 > 3) || (10 < 5));   true 
// console.log((2 == 3) || (4 < 1));   false
// console.log((7 >= 7) || (2 <= 1));  true
// console.log((6 != 6) || (8 < 10));  true
// console.log((3 > 5) || (4 < 6));true