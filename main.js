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

function changeQty(value) {
    let qty = document.getElementById("qty");
    let input = document.getElementById("qty-input");

    let current = parseInt(qty.innerText);
    current += value;

    if (current < 1) current = 1;

    qty.innerText = current;
    input.value = current;
}

function addToCart() {
    const productID = document.getElementById("productID").value;
    const quantity = document.getElementById("qty").value;

    fetch("php/add_to_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `product_id=${productID}&quantity=${quantity}`
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            showModal("Added to cart!", "success");
        } else {
            showModal("Failed to add to cart!", "error");
        }
    })
    .catch(() => {
        showModal("Something went wrong!", "error");
    });
}
