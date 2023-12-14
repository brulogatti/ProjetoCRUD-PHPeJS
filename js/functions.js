// Função para carregar dados do arquivo JSON
function carregarDados() {
    fetch('json/usuarios.json') // Altere o caminho se necessário
        .then(response => response.json())
        .then(data => {
            const tabela = document.getElementById('tabela-usuarios');
            const tbody = tabela.querySelector('tbody');

            data.forEach(usuario => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${usuario.codigo}</td>
                    <td>${usuario.nome}</td>
                    <td>${usuario.email}</td>
                    <td>${usuario.telefone}</td>
                    <td>${usuario.endereco}</td>
                    <td><a class="button" href="crud.php?codigo=${usuario.codigo}">Editar</a></td>
                    <td><a class="button" href="excluir.php?codigo=${usuario.codigo}">Excluir</a></td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar os dados:', error);
        });
}

