<!DOCTYPE php>
<?php 
include 'php/auth.php';
include 'php/connect_to_db.php';

// Always get the productID to ensure the correct item is shown
$id = intval($_GET['id']); 

// Check if we are coming from the cart to get the specific quantity
$source = isset($_GET['source']) ? $_GET['source'] : '';
$cart_qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

// Always query the product table so the details (name, img, price) are correct
$sql = "SELECT * FROM producttbl WHERE productID = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
$display_qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <style>

/* MAIN FRAME */
.main-content {
    position: relative;
    display: flex;
    gap: 40px;
    padding: 30px;
    background: var(--white);
    border-radius: 20px;
    max-width: 1100px;
}

/* IMAGE */
.product-image {
    flex: 1;
    background: var(--white);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image img {
    width: 80%;
}

/* INFO */
.product-info {
    flex: 1;
}

/* TEXT */
.product-name {
    margin-bottom: 10px;
}

.price {
    margin-bottom: 15px;
}

/* DESCRIPTION */
.description p {
    font-size: 14px;
    color: #333;
}

/* SELLER */
.seller {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 20px 0;
}

.avatar {
    width: 50px;
    height: 50px;
    background: #bbb;
    border-radius: 50%;
}

.rating {
    margin-left: auto;
}

.sold {
    margin-left: 10px;
}

/* SIZE */
.size-options {
    display: flex;
    gap: 10px;
}

.size-options button {
    padding: 8px 15px;
    border: none;
    background: #ddd;
    cursor: pointer;
}

/* QUANTITY */
.quantity {
    margin-top: 15px;
}

.qty-box {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #ddd;
    width: fit-content;
    padding: 5px 10px;
}

.qty-box button {
    border: none;
    background: transparent;
    font-size: 18px;
    cursor: pointer;
}

/* ACTIONS */
.actions {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.buy-btn {
    background: #19c37d;
    color: white;
    border: none;
    padding: 12px 40px;
    cursor: pointer;
    border-radius: 5px;
}

.cart-btn {
    border: none;
    border-left: 1px solid #000;
    padding: 12px 20px;
    cursor: pointer;
}
    </style>
</head>

<body>
    
    <nav class="navbar">
        <div class="brand">Simple E-commerce System</div>
        <div class="profile">
            <div class="avatar"><svg class="icon white"><use xlink:href="Icons/Person.svg"></use></svg> </div>
            <div>MJ Jade G. Piquero</div>
        </div>
    </nav>
    <?php include 'components/heder.php'; ?>
    <?php include 'components/sidebar.php'; ?>
   
    <div id="main-frame">
        <div class="main-content">

            <div class="product-image">
                <img src="<?php echo $product['image']; ?>">
            </div>

            <div class="product-info">

                <h1 class="product-name"><?php echo $product['product_name']; ?></h1>
                <h2 class="price">₱<?php echo $product['price']; ?></h2>

                <div class="description">
                    <strong>Description:</strong>
                    <p>
                        <?php echo $product['description']; ?>
                    </p>
                </div>

                <div class="seller">
                    <div class="avatar"></div>
                    <span>Mall 1</span>
                    <div class="rating">4.6 ★</div>
                    <div class="sold">200 Sold</div>
                </div>
                <form action="php/add_to_order.php" method="POST">
                    <div class="quantity">
                        <p>Quantity</p>
                        <div class="qty-box">
                            <button type="button" onclick="changeQty(-1)">-</button>
                            <input type="text" id="qty" name="quantity" value="<?php echo $display_qty; ?>">
                            <button type="button" onclick="changeQty(1)">+</button>
                        </div>
                    </div>

                    <div class="actions">
                        <input type="hidden" id="productID" name="productID" value="<?php echo $product['productID']; ?>">
                        <input type="hidden" name="status" value="shipping">
                        <input type="hidden" name="payment_status" value="cash">
                        <input class="buy-btn" type="submit" value="Buy">
                        <button type="button" class="cart-btn" onclick="addToCart()">
                            <svg class="icon white"><use xlink:href="Icons/Add to cart.svg"></use></svg>
                        </button>
                    </div>
                </form>
                <script>
   
                    document.addEventListener("DOMContentLoaded", () => {
                        <?php if ($_GET['order'] == 'success') { ?>
                            showModal("Order placed successfully!", "success");
                        <?php } if ($_GET['order'] == 'error') { ?>
                            showModal("Order failed!", "error");
                        <?php } if ($_GET['order'] == 'success_cart') { ?>
                            showModal("Item added to cart!", "success");
                        <?php } if ($_GET['order'] == 'failed_cart') { ?>
                            showModal("Failed to add item to cart!", "error");
                        <?php } ?>
                    });
                </script>
            </div>

        </div>
    </div>

    <script src="main.js"></script>
    <?php include 'components/modal.php'; ?>
</body>