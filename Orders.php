<!DOCTYPE php>
<?php
include 'php/auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <style>
        #options{
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 8px;
        }
        #options span{
            cursor: pointer;
            color: var(--gray);

            transition: 0.3s all;
        }
        #options span:not(:first-child){
            border-left: 1px solid var(--black);
            padding-left: 30px;
        }
        #options span:hover{
            color: var(--primary);
        }
        #options span.active{
            color: var(--black);
            font-weight: bold;
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
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
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : ''; ?>"
                    >
                </div>
            </form>
            <br><hr>
            <div class="product-grid-container">
                <?php
                    include 'php/connect_to_db.php';

                    /* PAGINATION SETTINGS */
                    $limit = 15;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    if($page < 1) $page = 1;
                    $offset = ($page - 1) * $limit;

                    /* BUILD THE WHERE ARRAY */
                    // Start with your mandatory ID filter
                    $where = ["ID = " . (int)$_SESSION['UserID']];

                    /* SEARCH LOGIC */
                    if(isset($_GET['search']) && trim($_GET['search']) != ''){
                        $search_term = trim($_GET['search']);
                        $search = mysqli_real_escape_string($conn, $search_term);
                        $where[] = "product_name LIKE '%$search%'";
                    }

                    // Convert the array into a single string: "WHERE ID = 1 AND product_name LIKE..."
                    $where_sql = " WHERE " . implode(" AND ", $where);

                    /* COUNT QUERY */
                    $count_sql = "SELECT COUNT(*) as total FROM view_orders" . $where_sql;
                    $count_result = mysqli_query($conn, $count_sql);
                    $count_row = mysqli_fetch_assoc($count_result);
                    $total_products = $count_row['total'];
                    $total_pages = ceil($total_products / $limit);

                    /* MAIN QUERY */
                    $sql = "SELECT * FROM view_orders" . $where_sql;

                    /* SORTING LOGIC */
                    $order = "";
                    if(isset($_GET['sort'])){
                        switch($_GET['sort']){
                            case "name_asc":   $order = " ORDER BY product_name ASC"; break;
                            case "name_desc":  $order = " ORDER BY product_name DESC"; break;
                            case "price_asc":  $order = " ORDER BY price ASC"; break;
                            case "price_desc": $order = " ORDER BY price DESC"; break;
                            case "date_asc":   $order = " ORDER BY date_ordered ASC"; break;
                            case "date_desc":  $order = " ORDER BY date_ordered DESC"; break;
                        }
                    }
                    $sql .= $order;

                    /* LIMIT & OFFSET (Must always be last) */
                    $sql .= " LIMIT $limit OFFSET $offset";

                    /* EXECUTE */
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("SQL Error: " . mysqli_error($conn) . " | Query: " . $sql);
                    }
                    
                    ?>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { 
                ?>
                        <div class="product-card">
                            <a href="Product Details.php?id=<?php echo $row['productID']; ?>&source=orders&qty=<?php echo $row['quantity']; ?>&Date_Added=<?php echo $row['date_ordered']; ?>">
                                <div class="picture-container">
                                    <div class="picture center">
                                        <img src="<?php echo $row['image']; ?>" alt="">
                                    </div>
                                    <div class="price-container">
                                        <div id="price">₱<?php echo $row['total_price']; ?></div>
                                    </div>
                                </div>

                                <div class="label-description">
                                    <div class="label"><?php echo $row['product_name']; ?></div>
                                    <div class="description"><?php echo $row['description']; ?></div>
                                </div>
                            </a>
                            <form action="php/delete_order.php" method="POST">
                                <input type="hidden" name="orderID" value="<?php echo $row['orderID']; ?>">
                                <button type="submit" class="cancel-button">cancel</button>
                            </form>
                        </div>
                <?php 
                        } // END THE WHILE LOOP
                    } else {
                        echo "<p>No orders found.</p>";
                    }
                    ?>
                    
            </div>
            <br><hr>
            <div class="bottom-group">

                <!-- PREVIOUS -->
                <?php if($page > 1){ ?>
                    <a href="?page=<?php echo $page - 1; ?>
                    &search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>
                    &sort=<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>">
                        <
                    </a>
                <?php } ?>

                <!-- PAGE NUMBERS -->
                <?php for($i = 1; $i <= $total_pages; $i++){ ?>

                    <a 
                        class="<?php echo ($i == $page) ? 'current-section' : ''; ?>"

                        href="?page=<?php echo $i; ?>
                        &search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>
                        &sort=<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>">
                        
                        <?php echo $i; ?>

                    </a>

                <?php } ?>

                <!-- NEXT -->
                <?php if($page < $total_pages){ ?>
                    <a href="?page=<?php echo $page + 1; ?>
                    &search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>
                    &sort=<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>">
                        >
                    </a>
                <?php } ?>

            </div>
        </div>
    </div>
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
    <script src="main.js"></script>
    <?php include 'components/modal.php'; ?>
</body>
</php>