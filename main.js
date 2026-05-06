function minmax_icon(){
    var element = document.getElementById("Minmax_button");
    var sidebar = document.getElementById("sidebar");

    if (sidebar.classList.contains("maximized")) {
        sidebar.classList.remove("maximized");
        sidebar.classList.add("minimized");
    } else {
        sidebar.classList.remove("minimized");
        sidebar.classList.add("maximized");
    }
}

function showModal(message, type) {
    const modal = document.getElementById("modal");
    const content = modal.querySelector(".modal-content");
    const text = document.getElementById("modal-message");

    text.innerText = message;

    // remove old styles
    content.classList.remove("success", "error");

    // add new style
    content.classList.add(type);

    modal.style.display = "flex";
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}
