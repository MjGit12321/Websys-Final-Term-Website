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