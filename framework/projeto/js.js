const produtos = [
    { id: 1, nome: "Camisa Polo", preco: 79.90, imagem: "https://via.placeholder.com/250x200?text=Camisa+Polo" },
    { id: 2, nome: "Tênis Esportivo", preco: 149.90, imagem: "https://via.placeholder.com/250x200?text=T%C3%AAnis" },
    { id: 3, nome: "Relógio Digital", preco: 199.99, imagem: "https://via.placeholder.com/250x200?text=Rel%C3%B3gio" },
    { id: 4, nome: "Mochila Casual", preco: 99.50, imagem: "https://via.placeholder.com/250x200?text=Mochila" },
  ];
  
  let carrinho = [];
  
  function renderizarProdutos() {
    const lista = document.getElementById("product-list");
    lista.innerHTML = "";
  
    produtos.forEach(produto => {
      const col = document.createElement("div");
      col.className = "col-12 col-md-6 col-lg-3 mb-4";
  
      col.innerHTML = `
        <div class="card h-100">
          <img src="${produto.imagem}" class="card-img-top" alt="${produto.nome}">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">${produto.nome}</h5>
            <p class="card-text">R$ ${produto.preco.toFixed(2)}</p>
            <button class="btn btn-primary mt-auto" onclick="adicionarAoCarrinho(${produto.id})">Adicionar ao carrinho</button>
          </div>
        </div>
      `;
      lista.appendChild(col);
    });
  }
  
  function adicionarAoCarrinho(idProduto) {
    carrinho.push(idProduto);
    document.getElementById("cart-count").textContent = carrinho.length;
  }
  
  renderizarProdutos();
  