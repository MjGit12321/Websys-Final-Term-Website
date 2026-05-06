<!DOCTYPE php>
<?php session_start(); 
include 'php/auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/style.css">
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

                    $sql = "SELECT * FROM producttbl";
                    $result = mysqli_query($conn, $sql);
                    ?>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a href="Product Details.php?id=<?php echo $row['productID']; ?>">
                        <div class="product-card">

                            <div class="picture-container">
                                <div class="picture center">
                                        <img src="<?php echo $row['image']; ?>" alt="">
                                    </div>

                                    <div class="price-container">
                                        <div id="price">₱<?php echo $row['price']; ?></div>

                                        <div>
                                            <button class="buy-button">Buy</button>

                                            <div>
                                                <svg class="icon">
                                                    <use xlink:href="Icons/Add to cart.svg"></use>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="label-description">
                                    <div class="label"><?php echo $row['product_name']; ?></div>
                                    <div class="description"><?php echo $row['description']; ?></div>
                                </div>
                        </div>
                    </a>
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

    <script src="main.js"></script>
</body>