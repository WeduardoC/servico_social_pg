//pra inserir
document.getElementById('tabagismo').addEventListener('change', function() {
    let div = document.getElementById('sim_tabagismo');
    if (this.value === 'Sim') {
        div.classList.remove('hidden');
    } else {
        div.classList.add('hidden');
    }
});

//pra atualizar
document.getElementById('tabagismo').addEventListener('change', function() {
    let div = document.getElementById('sim_tabagismo2');
    if (this.value === 'Sim') {
        div.classList.remove('hidden');
    } else {
        div.classList.add('hidden');
    }
});
document.getElementById('tabagismo').addEventListener('change', function() {
    let div = document.getElementById('sim_tabagismo3');
    if (this.value === 'Sim') {
        div.classList.remove('hidden');
    } else {
        div.classList.add('hidden');
    }
});
