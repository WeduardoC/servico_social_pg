function opcaoPesquisa(){
    let opcao_pesquisa = $('#opcao_pesquisa').val()
    if(opcao_pesquisa == 'nome'){
        $('#input_index').off('keyup').on('keyup', fetchSuggestionsNome)
    }
    if(opcao_pesquisa == 'prontuario'){
        $('#input_index').off('keyup').on('keyup', fetchSuggestionsProntuario)
    }
}

function fetchSuggestionsNome() {
    const input = document.getElementById('input_index').value;

    if (input.length > 0) {
        fetch(`autocomplete_nome.php?query=${input}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById('suggestions');
                suggestions.innerHTML = '';

                data.forEach(nome => {
                    const item = document.createElement('div');
                    item.textContent = nome;
                    item.classList.add('suggestion-item');
                    item.onclick = () => {
                        document.getElementById('input_index').value = nome;
                        suggestions.innerHTML = '';
                    };
                    suggestions.appendChild(item);
                });
            });
    } else {
        document.getElementById('suggestions').innerHTML = '';
    }
}

function fetchSuggestionsProntuario(){
    const input = document.getElementById('input_index').value;

    if (input.length > 0) {
        fetch(`autocomplete_prontuario.php?query=${input}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById('suggestions');
                suggestions.innerHTML = '';

                data.forEach(prontuario => {
                    const item = document.createElement('div');
                    item.textContent = prontuario;
                    item.classList.add('suggestion-item');
                    item.onclick = () => {
                        document.getElementById('input_index').value = prontuario;
                        suggestions.innerHTML = '';
                    };
                    suggestions.appendChild(item);
                });
            });
    } else {
        document.getElementById('suggestions').innerHTML = '';
    }
}

function buscar(){
    let opcao_pesquisa = $('#opcao_pesquisa').val()
    if(opcao_pesquisa == 'nome'){
        buscarNome()
    }
    if(opcao_pesquisa == 'prontuario'){
        buscarProntuario()
    }
}

function buscarNome() {
    var input = document.querySelector('#pesquisa input').value;

    $.ajax({
        url: 'buscar_nome.php',
        type: 'GET',
        data: {
            input: input
        },
        success: function(response) {
            var paciente = JSON.parse(response)
            dataNascimento = paciente.data_nascimento.split("-")
            dataNascimento = dataNascimento.reverse()
            data = dataNascimento.join('/')
            $('#linha_tabela').html(`
                <td>${paciente.prontuario}</td>
                <td>${paciente.nome_paciente}</td>
                <td>${data}</td>
                <td>
                    <a href="entrevista/entrevista.php?acao=visualizar">
                        Visualizar<i class="fa-regular fa-file"></i>
                    </a>                            
                </td>
                <td>
                    <a href="entrevista/entrevista.php?acao=atualizar">
                        Atualizar<i class="fa-regular fa-file"></i>
                    </a>
                </td>
                <td>
                    <a href="entrevista/entrevista.php?acao=nova_entrevista">
                        Nova Entrevista<i class="fa-regular fa-file"></i>
                    </a>
                </td>
            `)
        },
        error: function(error) {
            console.error('Erro:', error);
        }
    });
}

function buscarProntuario() {
    var input = document.querySelector('#pesquisa input').value;

    $.ajax({
        url: 'buscar_prontuario.php',
        type: 'GET',
        data: {
            input: input
        },
        success: function(response) {
            var paciente = JSON.parse(response)
            dataNascimento = paciente.data_nascimento.split("-")
            dataNascimento = dataNascimento.reverse()
            data = dataNascimento.join('/')
            $('#linha_tabela').html(`
                <td>${paciente.prontuario}</td>
                <td>${paciente.nome_paciente}</td>
                <td>${data}</td>
                <td>
                    <a href="entrevista/entrevista.php?acao=visualizar">
                        Visualizar<i class="fa-regular fa-file"></i>
                    </a>                            
                </td>
                <td>
                    <a href="entrevista/entrevista.php?acao=atualizar">
                        Atualizar<i class="fa-regular fa-file"></i>
                    </a>
                </td>
                <td>
                    <a href="entrevista/entrevista.php?acao=inserir">
                        Nova Entrevista<i class="fa-regular fa-file"></i>
                    </a>
                </td>
            `)
        },
        error: function(error) {
            console.error('Erro:', error);
        }
    });
}

function buscarId(){
    let input = $('#opcao_pesquisa').val()
    if(input == 'nome'){
        buscarIdNome()
    }
    if(input == 'prontuario'){
        buscarIdProntuario()
    }
}

function buscarIdNome(){
    var nome_paciente = document.querySelector('#pesquisa input').value
    $.ajax({
        url: 'buscar_id_nome.php',
        type: 'GET',
        data: `nome_paciente=${nome_paciente}`,
        success: function(id_paciente) {
            console.log(id_paciente)
        },
        error: function(error) {
            console.error('Erro:', error)
        }
    });
}

function buscarIdProntuario(){
    var prontuario = document.querySelector('#pesquisa input').value
    $.ajax({
        url: 'buscar_id_prontuario.php',
        type: 'GET',
        data: `prontuario=${prontuario}`,
        success: function(id_paciente) {
            console.log(id_paciente)
        },
        error: function(error) {
            console.error('Erro:', error)
        }
    });
}

