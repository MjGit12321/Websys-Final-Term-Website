<!DOCTYPE php>
<?php 
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
            <form method="GET">
                <div class="top-group">
                    <div class="sort-group">
                        <label for="sort">Sort by:</label>
                        <select class="sort" name="sort" onchange="this.form.submit()">
                            <option value="">Default</option>
                            <option value="name_asc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_asc') echo 'selected'; ?>>
                                Name (A-Z)
                            </option>
                            <option value="name_desc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_desc') echo 'selected'; ?>>
                                Name (Z-A)
                            </option>
                            <option value="price_asc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected'; ?>>
                                Price (Low to High)
                            </option>
                            <option value="price_desc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected'; ?>>
                                Price (High to Low)
                            </option>
                            <option value="date_desc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_desc') echo 'selected'; ?>>
                                Date (Newest)
                            </option>
                            <option value="date_asc"
                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_asc') echo 'selected'; ?>>
                                Date (Oldest)
                            </option>
                        </select>
                    </div>
                    <input 
                                type="text"
                                id="search-input"
                                name="search"
                                placeholder="Search products..."
                                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
                            >
                </div>
            </form>

            <br><hr>
            <div class="product-grid-container">
                <?php
                    include 'php/connect_to_db.php';

                    // Initial SQL structure
                    $sql = "SELECT * FROM producttbl";
                    $where = [];
                    $order = "";

                    /* SEARCH */
                    if(isset($_GET['search']) && $_GET['search'] != ''){
                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                        $where[] = "product_name LIKE '%$search%'";
                    }

                    /* WHERE - Apply filters if search exists */
                    if(count($where) > 0){
                        $sql .= " WHERE " . implode(" AND ", $where);
                    }

                    /* SORT */
                    if(isset($_GET['sort'])){
                        switch($_GET['sort']){
                            case "name_asc":
                                $order = " ORDER BY product_name ASC";
                                break;

                            case "name_desc":
                                $order = " ORDER BY product_name DESC";
                                break;

                            case "price_asc":
                                $order = " ORDER BY price ASC";
                                break;

                            case "price_desc":
                                $order = " ORDER BY price DESC";
                                break;

                            case "date_asc":
                                $order = " ORDER BY created_at ASC";
                                break;

                            case "date_desc":
                                $order = " ORDER BY created_at DESC";
                                break;
                        }
                    }

                    // Append ordering and execute
                    $sql .= $order;
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
            
        </div>
    </div>

    <script src="main.js"></script>
</body>