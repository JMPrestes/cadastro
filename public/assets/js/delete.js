(function (wind, doc) {
    'use strict';

    function confirmDel(event) {
        event.preventDefault();

        let token = doc.getElementsByName("_token")[0].value;
        let nome = doc.getElementById("direct").name;
        console.log(nome);

        if (confirm("Deseja mesmo apagar??")) {
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function () {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    console.log('ola');
                    wind.location.href = nome;
                }
            };
            ajax.send();
        } else {
            return false;
        }
    }

    if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document);