function calcularIMC() {
    // Captura valores do HTML parseFloat é uma função nativa do JavaScript usada para converter uma string em um número de ponto flutuante (número com casas decimais).
    let peso = parseFloat(document.getElementById('peso').value);
    let altura = parseFloat(document.getElementById('altura').value);

    // Valida se os campos foram preenchidos corretamente
    if (!peso || !altura || peso <= 0 || altura <= 0) {
        document.getElementById('resultado').innerHTML = "Digite peso e altura válidos!";
        return;
    }

    // Calcula IMC
    let imc = peso / (altura * altura);
    let classificacao = '';

    // Classifica o IMC
    if(imc < 18.5) {
        classificacao = "abaixo do peso ideal.";
    } else if(imc >= 18.5 && imc <= 24.9) {
        classificacao = "com o peso normal.";
    } else if(imc >= 25 && imc <= 29.9) {
        classificacao = "com sobrepeso.";
    } else {
        classificacao = "em estado de obesidade.";
    }

    // Exibe o resultado no HTML
    document.getElementById('resultado').innerHTML = 
        `Seu IMC é ${imc.toFixed(2)}, você está ${classificacao}`;
}
