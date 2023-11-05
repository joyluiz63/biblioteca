const cpf = document.getElementById("cpf");
cpf.addEventListener("keyup", formatarCPF);
function formatarCPF(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    e.target.value = v;
}

const fone = document.getElementById('fone');
fone.addEventListener('keyup', formatarTelefone);
function formatarTelefone(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = v.replace(/^(\d\d)(\d)/g, "($1)$2");
    v = v.replace(/(\d{5})(\d)/, "$1-$2");
    e.target.value = v;
}

const valor = document.getElementById('valor');
valor.addEventListener('keyup', formatarMoeda);
function formatarMoeda(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = (v / 100).toFixed(2) + '';
    // v = v.replace(",", ".");
    // v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    // v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
    e.target.value = v;
}
