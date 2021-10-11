function modCadastro(i) {
    campos = document.getElementsByClassName('oculta');
    limpa = document.getElementsByClassName('limpa');
    console.log(i.value);
    if (i.value == 'cnpj') {
        for (var i = 0; i < campos.length; i += 1) {
            campos[i].style.display = 'none';
            campos[i].value = '';
        }
        for (var i = 0; i < limpa.length; i += 1) {
            limpa[i].value = '';
        }
    } else {
        for (var i = 0; i < campos.length; i += 1) {
            campos[i].style.display = 'block';
            campos[i].value = '';
        }
        for (var i = 0; i < limpa.length; i += 1) {
            limpa[i].value = '';
        }
    }
}