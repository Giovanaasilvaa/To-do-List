document.addEventListener("DOMContentLoaded", () => {
    const themeToggleButton = document.getElementById("theme-toggle");
    const body = document.body;
    const bgVideo = document.getElementById("bg-video");
    const bgImage = document.getElementById("bg-image"); // para páginas com imagem

    // Troca vídeo
    function updateVideoSource(theme) {
        if (!bgVideo) return; // Se não existe vídeo, sai
        const source = bgVideo.querySelector("source");
        const newSrc = theme === "dark"
            ? "/todo-list/assets/fundodark.mp4"
            : "/todo-list/assets/fundo.mp4";

        bgVideo.classList.add("fade-out");

        setTimeout(() => {
            source.setAttribute("src", newSrc);
            bgVideo.load();
            bgVideo.classList.remove("fade-out");
            bgVideo.classList.add("fade-in");

            setTimeout(() => {
                bgVideo.classList.remove("fade-in");
            }, 1000);
        }, 500);
    }

    // Troca imagem
    function updateImageSource(theme) {
        if (!bgImage) return; // Se não existe imagem, sai
        const newSrc = theme === "dark"
            ? "/todo-list/assets/imgdark.png"
            : "/todo-list/assets/fundo_geral.png";

        bgImage.setAttribute("src", newSrc);
    }

    // Aplica tema salvo
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        body.classList.add("dark-mode");
        if (themeToggleButton) themeToggleButton.innerText = "☀️ Modo Claro";
        updateVideoSource("dark");
        updateImageSource("dark");
    }

    if (themeToggleButton) {
        themeToggleButton.addEventListener("click", () => {
            body.classList.toggle("dark-mode");
            const newTheme = body.classList.contains("dark-mode") ? "dark" : "light";

            themeToggleButton.innerText = newTheme === "dark"
                ? "☀️ Modo Claro"
                : "🌙 Modo Escuro";

            localStorage.setItem("theme", newTheme);
            updateVideoSource(newTheme);
            updateImageSource(newTheme);
        });
    }
});
