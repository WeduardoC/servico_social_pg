document.getElementById('recebe_beneficio_assistencial').addEventListener('change', function() {
    let div = document.getElementById('tipo_beneficio_assistencial');
    if (this.value === 'Sim') {
        div.classList.remove('hidden');
    } else {
        div.classList.add('hidden');
    }
})

function toggleDiv(value){
    let div = document.getElementById('categoria_status');
    if(value === 'INSS' || value === 'Federal' || value === 'Municipal' || value === 'Previdência Privada'){
        div.classList.remove('hidden');
        div.style = "display: flex;justify-content: space-around;"
    }else{
        div.style = ""
        div.classList.add('hidden');
    }
}

