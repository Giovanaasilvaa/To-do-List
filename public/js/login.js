//olhinho
function mostrarSenha() {
    const input = document.getElementById('senha');
    const icone = document.getElementById('icone-senha');

    if (input.type === "password") {
        input.type = "text";
        icone.src = "../assets/olho_fechado.png";
        icone.alt = "Ocultar senha";
    } else {
        input.type = "password";
        icone.src = "../assets/olho_aberto.png";
        icone.alt = "Mostrar senha";
    }
}
