// Função para ordenar os ninjas por preço
function ordenarPorPreco() {
    const tabelas = document.querySelectorAll('.ninja-table');

    tabelas.forEach((tabela) => {
        const cards = Array.from(tabela.querySelectorAll('.col-md-4'));

        cards.sort((a, b) => {
            const precoA = parseFloat(a.querySelector('.preco').textContent.trim());
            const precoB = parseFloat(b.querySelector('.preco').textContent.trim());

            return precoA - precoB; // Ordenar pelo mais barato
        });

        tabela.innerHTML = ''; // Limpa os cards existentes

        // Reinsere os cards ordenados
        cards.forEach((card) => {
            tabela.appendChild(card);
        });
    });
}

// Função para ordenar os ninjas pela proximidade à meta e custo-benefício
function ordenarPorProximidade() {
    const tabelas = document.querySelectorAll('.ninja-table');

    tabelas.forEach((tabela) => {
        const cards = Array.from(tabela.querySelectorAll('.col-md-4'));

        cards.sort((a, b) => {
            const fragmentosAtualA = parseInt(a.querySelector('.fragmentos-atual').textContent);
            const fragmentosTotalA = parseInt(a.querySelector('.fragmentos-total').textContent);
            const precoA = parseFloat(a.querySelector('.preco').textContent.trim());

            const fragmentosAtualB = parseInt(b.querySelector('.fragmentos-atual').textContent);
            const fragmentosTotalB = parseInt(b.querySelector('.fragmentos-total').textContent);
            const precoB = parseFloat(b.querySelector('.preco').textContent.trim());

            const faltandoA = fragmentosTotalA - fragmentosAtualA;
            const faltandoB = fragmentosTotalB - fragmentosAtualB;

            const custoBeneficioA = faltandoA / precoA;
            const custoBeneficioB = faltandoB / precoB;

            return custoBeneficioA - custoBeneficioB;
        });

        tabela.innerHTML = ''; // Limpa os cards existentes

        // Reinsere os cards ordenados
        cards.forEach((card) => {
            tabela.appendChild(card);
        });
    });
}

// Função para ordenar os ninjas por quantidade de fragmentos
function ordenarPorFragmentos() {
    const tabelas = document.querySelectorAll('.ninja-table');

    tabelas.forEach((tabela) => {
        const cards = Array.from(tabela.querySelectorAll('.col-md-4'));

        cards.sort((a, b) => {
            const fragmentosA = parseInt(a.querySelector('.fragmentos-atual').textContent);
            const fragmentosB = parseInt(b.querySelector('.fragmentos-atual').textContent);

            return fragmentosB - fragmentosA; // Ordenar pelo maior número de fragmentos
        });

        tabela.innerHTML = ''; // Limpa os cards existentes

        // Reinsere os cards ordenados
        cards.forEach((card) => {
            tabela.appendChild(card);
        });
    });
}
document.addEventListener("DOMContentLoaded", function() {
    var audio = document.getElementById("musica");
    audio.play().catch(function(error) {
        console.log("O autoplay foi bloqueado pelo navegador.");
    });
});
