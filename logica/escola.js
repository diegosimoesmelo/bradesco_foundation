function calcular() {
    // Captura as notas inseridas pelos usuários
    let nota1 = parseFloat(document.getElementById('nota1').value);
    let nota2 = parseFloat(document.getElementById('nota2').value);
  
    // Verifica se as notas são válidas (entre 0 e 10)
    if (nota1 < 0 || nota1 > 10 || nota2 < 0 || nota2 > 10) {
      document.getElementById('resultado').innerHTML = "Por favor, insira notas entre 0 e 10!";
      return;
    }
  
    // Calcula a média
    let media = (nota1 + nota2) / 2;
    let resultado = "";
  
    // Determina a aprovação, recuperação ou reprovação
    if (media >= 7) {
      resultado = "Aprovado!";
    } else if (media >= 5) {
      resultado = "Recuperação.";
    } else {
      resultado = "Reprovado.";
    }
  
    // Exibe a média e o resultado no HTML A função toFixed() é um método em JavaScript que formata números para um número fixo de casas decimais. Ele retorna uma string representando o número formatado de acordo com o número de casas decimais que você especificar.
    document.getElementById('resultado').innerHTML = 
      `Sua média é ${media.toFixed(1)}. Resultado: ${resultado}`;
  }
  