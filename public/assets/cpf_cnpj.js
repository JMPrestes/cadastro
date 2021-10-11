function modCadastro(i) {
    limpa = document.getElementsByClassName('limpa');
    console.log(i.value);
    if (i.value == 'cnpj') {
        for (var i = 0; i < limpa.length; i += 1) {
            limpa[i].setAttribute('readonly', true);
            limpa[i].value = '';
        }
    } else {
        for (var i = 0; i < limpa.length; i += 1) {
            limpa[i].removeAttribute('readonly');
            limpa[i].value = '';
        }
    }
}