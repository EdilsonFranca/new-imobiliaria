function redirecionar() {
    let url = '/search/';

    let url_bairro = '';
    let url_dormitoio = '';
    let url_vaga = '';
    let url_banheiro = '';
    let url_suite = '';

    if (document.querySelector('.select_tipo')) {
        let url_tipo = document.querySelector('.select_tipo').value + '/';
        url += url_tipo;
    }

    if (document.querySelector('.select_transacao1')) {
        if (document.querySelector('.select_transacao1').checked) {
            url += document.getElementsByName('transacoes1')[0].value + '/'; 
        }
    }
    if (document.querySelector('.select_transacao2')) {
        if (document.querySelector('.select_transacao2').checked) {
            url += document.getElementsByName('transacoes2')[0].value + '/';
        }
    }
    if (document.querySelector('.select_transacao3')) {
        if (document.querySelector('.select_transacao3').checked) {
            url += document.getElementsByName('transacoes3')[0].value + '/';
        }
    }
    if (document.querySelector('.select_transacao4')) {
        if (document.querySelector('.select_transacao4').checked) {
            url += document.getElementsByName('transacoes4')[0].value + '/';
        }
    }


    if (document.querySelector('.select_statusDoImovel')) {
        if (document.querySelector('.select_statusDoImovel').value != '') {
            url += getManyCheckBoxValor('statusDoImovel');
        }
    }


    if (document.querySelector('.input_bairro').value != '') {
        url_bairro = document.querySelector('.input_bairro').value;
        if (url_bairro.charAt(url_bairro.length - 1) == '/') url += url_bairro;
        else url += url_bairro + '/';
    }

    if (document.querySelector('.input_dormitorio')) {
        if (document.querySelector('.input_dormitorio').value != '') {
            url_dormitoio = getRadioValor('quarto');
            if (url_dormitoio.charAt(url_dormitoio.length - 1) == '/') url += url_dormitoio;
            else url += url_dormitoio;
        }
    }
    if (document.querySelector('.input_vaga')) {
        if (document.querySelector('.input_vaga').value != '') {
            url_vaga = getRadioValor('vaga');
            if (url_vaga.charAt(url_vaga.length - 1) == '/') url += url_vaga;
            else url += url_vaga;
        }
    }

    if (document.querySelector('.input_suite')) {
        if (document.querySelector('.input_suite').value != '') {
            url_suite = getRadioValor('suite');
            if (url_suite.charAt(url_suite.length - 1) == '/') url += url_suite;
            else url += url_suite;
        }
    }

    if (document.querySelector('.input_banheiro')) {
        if (document.querySelector('.input_banheiro').value != '') {
            url_banheiro = getRadioValor('banheiro');
            if (url_banheiro.charAt(url_banheiro.length - 1) == '/') url += url_banheiro;
            else url += url_banheiro;
        }
    }
    let url_min_valor1 = document.querySelector('.min-valor1').value + '/';
    let url_max_valor1 = document.querySelector('.max-valor1').value + '/';
    url += url_min_valor1 + url_max_valor1;

    let url_min_valor2 = document.querySelector('.min-valor2').value + '/';
    let url_max_valor2 = document.querySelector('.max-valor2').value + '/';
    url += url_min_valor2 + url_max_valor2;
    location.href = url;
}

function getRadioValor(name) {
    let rads = document.getElementsByName(name);
    for (let i = 0; i < rads.length; i++) {
        if (rads[i].checked) {
            return rads[i].value + '/';
        }
    }
    return '';
}

function getManyCheckBoxValor(name) {
    let rads2 = document.getElementsByName(name);
    let url_ = '';
    for (let j = 0; j < rads2.length; j++) {
        if (rads2[j].checked) {
            url_ += rads2[j].value + '/';
        }
    }
    return url_;
}