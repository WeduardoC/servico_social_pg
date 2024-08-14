function toggleFields(checkbox) {
    const container = document.getElementById('inputs-container');
    const value = checkbox.value;

    if (checkbox.checked) {
        const div = document.createElement('div');
        div.id = 'integrante_' + value;
        div.className = 'integrante-inputs';
        div.innerHTML = `
            <h3>${value}</h3>
            <label>Qtde: <input type="number" name="qtde_${value}" required></label><br>
            <label>Renda (R$): <input type="text" name="renda_rs_${value}" required></label><br>
            <label>Renda (SM): <input type="text" name="renda_sm_${value}" required></label><br>
        `;
        container.appendChild(div);
    } else {
        const div = document.getElementById('integrante_' + value);
        container.removeChild(div);
    }
}
