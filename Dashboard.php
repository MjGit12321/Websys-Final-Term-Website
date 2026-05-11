<!DOCTYPE php>
<?php 
include 'php/auth.php';
include 'php/connect_to_db.php';
$UserID = $_SESSION['UserID'];
$sql = "SELECT * FROM usertbl WHERE UserID = $UserID";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .content-grid {
            display: grid;
            gap: 16px;
        }
        .row {
            display: grid;
            grid-template-columns: 0.4fr 0.4fr 0.4fr 0.4fr;
           
            gap: 16px;
        }
        .panel {
            background: var(--white);
            border-radius: 18px;
            padding: 10px 18px 18px 18px;
            box-shadow: var(--Shadow);
            border: 2px solid var(--secondary);
            position: relative;
            overflow: hidden;

            grid-column: span 2;
        }
        .panel::before{
            content: '';
            width: 100%;
            height: 15%;
            background-color: var(--secondary);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }
        .welcome-panel {
            display: grid;
            gap: 16px;
        }
        .welcome-panel h2 {
            margin: 0;
            font-size: 26px;
            line-height: 1.1;
            color: var(--white);
            z-index: 2;
        }
        .welcome-panel h3 {
            margin: 0;
            font-size: 15px;
            color: black;
        }
        .details-card {
          
            background: var(--card-bg);
            border-radius: 10px;
            padding: 14px;
            color: var(--card-color);
        
            
            grid-row: span 2;
        }
        
        .details-card p {
            margin: 0;
            font-size: 13px;
    
        }
        .stats-grid {
            display: grid;
            gap: 12px;
            grid-template-columns: 1fr 1fr;
        }
        .stats-card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 8px;
            min-height: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        
        }
        .stats-card strong {
            margin: 0;
            font-size: 20px;
            margin-left: 40px;
        }
        .stats-card span {
            font-size: 13px;
            color: var(--card-color);
        }
        .stats-card h3 {
            margin: 0;
        }
        .panel > h3 {
            margin: 0!important;
            font-size: 18px !important;
            color: var(--white) !important;
            z-index: 2;
            position: relative;
            margin-bottom: 25px !important;
            
        }
        .panel h3 {
            margin: 0;
            font-size: 18px;
            color: black;
            font-weight: 100;
            margin-bottom: 5px;
            
        }
        
        .pending-table {
            width: 100%;
            border-collapse: collapse;
        }
        .pending-table th,
        .pending-table td {
            border: 1px solid var(--table-border);
            padding: 10px 12px;
            font-size: 13px;
            text-align: left;
        }
        .pending-table th {
            color: var(--black);
        }
        
        .recent-products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }
        .img-whitebg{
            background-color: var(--white);
            border-radius: 10px;
            padding: 5px;
            position: relative;
        }
        .chart-card{
            grid-column: span 1;
        }
        .recent-card{
            grid-column: span 3;
        }
    </style>
</head>
<body>
    <?php 
    include 'components/heder.php'; 
    include 'components/sidebar.php'; 
    ?>
    <div id="main-frame">
        <div class="main-content">
            <div class="content-grid">
                <div class="row">
                    <div class="panel welcome-panel">
                        <h2>Welcome Back <?php
                            echo $_SESSION['Name'];
                        ?></h2>
                        <div class="stats-grid">
                            <div class="details-card">
                                <h3>Address</h3>
                                <p><?php echo $user['Address']; ?></p>
                                <br>
                            </div>
                            <div class="stats-card">
                                <h3>Total Spent</h3>
                                <strong>₱ <?php echo number_format($user['Total_Spent'], 2); ?></strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Completed Orders</h3>
                                <strong><?php echo $user['Completed_Orders']; ?></strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Total Orders</h3>
                                <strong><?php echo $user['Total_Orders']; ?></strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Cancelled Orders</h3>
                                <strong><?php echo $user['Cancelled_Orders']; ?></strong>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel pending-card">
                        <h3>Pending Orders</h3>
                        <table class="pending-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // 1. Fetch data from your view
                                    $query = "SELECT * FROM view_orders where ID = $UserID ORDER BY date_ordered DESC Limit 5";
                                    $result = mysqli_query($conn, $query);

                                    // 2. Check if there are orders to display
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Format the date for the table
                                            $dateDisp = date("M d, Y", strtotime($row['date_ordered']));
                                            // Prepare the date for the URL
                                            $dateUrl = urlencode($row['date_ordered']);
                                            ?>
                                            <tr>
                                                <td>#<?php echo $row['orderID']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td>₱<?php echo number_format($row['price'], 2); ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td>
                                                    <span class="status-pill <?php echo strtolower($row['status']); ?>">
                                                        <?php echo $row['status']; ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $dateDisp; ?></td>
                                                <td>
                                                    <a href="Product Details.php?id=<?php echo $row['productID']; ?>&source=orders&qty=<?php echo $row['quantity']; ?>&Date_Added=<?php echo $row['date_ordered']; ?>" style="text-decoration: underline;">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' style='text-align:center; padding: 20px;'>No orders found.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="panel chart-card">
                        <h3>Orders in the last 12 months</h3>
                        <img src="Pictures/Chart.png" width="100%" height="200px" alt="" srcset="">
                    </div>
                    <div class="panel recent-card">
                        <h3>Sponsored Items</h3>
                        <div class="recent-products">
                            <?php 
                                $query = "SELECT * FROM producttbl where is_sponsored = 1 Limit 4";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</php>