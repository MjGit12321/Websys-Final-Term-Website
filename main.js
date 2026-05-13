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

    if (window.modalRedirectOnClose) {
        window.location.href = window.modalRedirectOnClose;
    }
}

function changeQty(amount) {
    // Get the element
    const qtyInput = document.getElementById("qty");
    
    // Check if the element exists to avoid errors
    if (!qtyInput) {
        console.error("Could not find input with ID 'qty'");
        return;
    }

    // Convert value to an integer
    let currentVal = parseInt(qtyInput.value);

    // If the box is empty or not a number, default to 1
    if (isNaN(currentVal)) {
        currentVal = 1;
    }

    // Perform math
    let newVal = currentVal + amount;

    // Don't allow less than 1
    if (newVal < 1) {
        newVal = 1;
    }

    // Update the actual input value
    qtyInput.value = newVal;
    
    console.log("New Quantity is: " + qtyInput.value);
}

function getValidQuantity() {
    const qtyInput = document.getElementById("qty");
    const quantity = parseInt(qtyInput.value, 10);

    if (isNaN(quantity) || quantity < 1) {
        showModal("Quantity must be at least 1.", "error");
        return null;
    }

    qtyInput.value = quantity;
    return quantity;
}

function validateQuantity() {
    return getValidQuantity() !== null;
}

function addToCart() {
    const productID = document.getElementById("productID").value;
    const quantity = getValidQuantity();

    if (quantity === null) {
        return;
    }

    fetch("php/add_to_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `product_id=${productID}&quantity=${quantity}`
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim();

        if (data === "success") {
            showModal("Added to cart!", "success");
        } else if (data === "invalid_quantity") {
            showModal("Quantity must be at least 1.", "error");
        } else if (data === "no_stock") {
            showModal("no stock left", "error");
        } else {
            showModal("Failed to add to cart!", "error");
        }
    })
    .catch(() => {
        showModal("Something went wrong!", "error");
    });
}

function togglePassword() {
    const passwordInput = document.getElementById("Password");
    const IconUsed = document.getElementById("toggleBtn");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        IconUsed.setAttribute('xlink:href', 'Icons/Open.svg');
        IconUsed.setAttribute('href', 'Icons/Open.svg');
    } else {
        passwordInput.type = "password";
        IconUsed.setAttribute('xlink:href', 'Icons/Close.svg');
        IconUsed.setAttribute('href', 'Icons/Close.svg');
    }
}
