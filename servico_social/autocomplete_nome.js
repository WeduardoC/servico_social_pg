function fetchSuggestions() {
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