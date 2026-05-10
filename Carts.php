<!DOCTYPE php>
<?php
include 'php/auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
    <?php include 'components/heder.php'; ?>
    <?php include 'components/sidebar.php'; ?>
    <div id="main-frame">
        <div class="main-content">
            <div class="top-group">
                <div class="sort-group">
                    <label for="sort">Sort by:</label>
                    <select id="sort-name" class="sort" name="sort">
                        <option value="name-asc">Name (A-Z)</option>
                        <option value="name-desc">Name (Z-A)</option>
                    </select>
                    <select id="sort-price" class="sort" name="sort">
                        <option value="price-asc">Price (Low to High)</option>
                        <option value="price-desc">Price (High to Low)</option>
                    </select>
                    <select id="sort-date" class="sort" name="sort">
                        <option value="date-asc">Date (New to Old)</option>
                        <option value="date-desc">Date (Old to New)</option>
                    </select>
                </div>
                <div id="search-box">
                    <img src="Icons/search.png" alt="" srcset="">
                    <input type="text" id="search-input" placeholder="Search products...">
                </div>
            </div>
            <br><hr>
            <div class="product-grid-container">
                <?php
                    include 'php/connect_to_db.php';

                    $sql = "SELECT * FROM view_cart_items WHERE ID = " . $_SESSION['UserID'];
                    $result = mysqli_query($conn, $sql);
                    ?>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        
                            <div class="product-card">
                                <a href="Product Details.php?id=<?php echo $row['productID']; ?>">
                                <div class="picture-container">
                                    <div class="picture center">
                                        <img src="<?php echo $row['image']; ?>" alt="">
                                    </div>

                                    <div class="price-container">
                                        <div id="price">₱<?php echo $row['price']; ?></div>

                                    </div>
                                </div>

                                <div class="label-description">
                                    <div class="label"><?php echo $row['product_name']; ?></div>
                                    <div class="description"><?php echo $row['description']; ?></div>
                                </div>
                                </a>
                                <form action="php/delete_cart.php" method="POST">
                                    <input type="hidden" name="cartID" value="<?php echo $row['cartID']; ?>">

                                    <button type="submit" class="trash-btn">
                                        <svg class="icon red">
                                            <use xlink:href="Icons/trash.svg"></use>
                                        </svg>
                                    </button>
                                </form>
                                <script>
                                <?php if (isset($_GET['delete'])) { ?>
                                    document.addEventListener("DOMContentLoaded", () => {

                                        <?php if ($_GET['delete'] == 'success') { ?>
                                            showModal("Item removed from cart!", "success");
                                        <?php } else { ?>
                                            showModal("Failed to remove item!", "error");
                                        <?php } ?>

                                    });
                                        <?php } ?>
                                </script>
                            </div>
                        
                        

                <?php } ?>
                
            </div>
            <br><hr>
            <div class="bottom-group">
                <div><</div>
                <div class="current-section">1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>></div>
            </div>
        </div>
    </div>
    <?php include 'components/modal.php'; ?>
    <script src="main.js">
    </script>
</body>