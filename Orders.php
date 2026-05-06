<!DOCTYPE php>
<?php session_start(); 
include 'php/auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #options{
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 8px;
        }
        #options span{
            cursor: pointer;
            color: #6c6c6c;

            transition: 0.3s all;
        }
        #options span:not(:first-child){
            border-left: 1px solid black;
            padding-left: 30px;
        }
        #options span:hover{
            color: #00A8E8;
        }
        #options span.active{
            color: black;
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
            <div id="options">
                <span>To Ship</span>
                <span>To Pay</span>
                <span class="active">To Receive</span>
                <span>Completed</span>
                <span>Cancelled</span>
                <span>Returned</span>
            </div>
            <div class="product-grid-container">
                <?php
                    include 'php/connect_to_db.php';

                    $sql = "SELECT * FROM view_orders WHERE ID = " . $_SESSION['UserID'];
                    $result = mysqli_query($conn, $sql);
                    ?>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <div class="product-card">

                        <div class="picture-container">
                            <div class="picture center">
                                <img src="<?php echo $row['image']; ?>" alt="">
                            </div>

                            <div class="price-container">
                                <div id="price">₱<?php echo $row['price']; ?> x <?php echo $row['quantity']; ?> = ₱<?php echo $row['total_price']; ?></div>

                                <div>
                                    <button class="cancel-button">Cancel</button>
                                </div>

                            </div>
                        </div>

                        <div class="label-description">
                            <div class="label"><?php echo $row['product_name']; ?></div>
                            <div class="description"><?php echo $row['description']; ?></div>
                        </div>

                    </div>

                <?php } ?>
            </div>
            <br><hr>
            <div class="bottom-group">
                <div><</div>
                <div>1</div>
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
</php>