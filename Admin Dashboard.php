<?php 
include 'php/auth.php';
include 'php/connect_to_db.php';
$UserID = $_SESSION['UserID'];
$sql = "SELECT * FROM usertbl";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script>
        window.addEventListener('pageshow', function (event) {
            const navigation = performance.getEntriesByType('navigation')[0];

            if (event.persisted || (navigation && navigation.type === 'back_forward')) {
                window.location.reload();
            }
        });
    </script>
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
            height: 40px;
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
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
        }

        .close-btn {
            float: right;
            cursor: pointer;
            font-size: 24px;
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
                    <div class="panel pending-card">
                        <h3>All Users</h3>
                        <table class="pending-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
                                    <th>Total Spent</th>
                                    <th>Completed Orders</th>
                                    <th>Total Orders</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // 1. Fetch data from your view
                                    $query = "SELECT * FROM usertbl";
                                    $result = mysqli_query($conn, $query);
                                    $status = "";
                                    // 2. Check if there are orders to display
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <?php
            
                                                    if ($row['is_banned'] == 1) {
                                                        $status = "Inactive";
                                                    } else {
                                                        $status = "Active";
                                                    }
                                                  
                                                ?>
                                                
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php echo $row['Gender']; ?></td>
                                                <td><?php echo $row['Phone_Number']; ?></td>
                                                <td><?php echo $row['Total_Spent']; ?></td>
                                                <td><?php echo $row['Completed_Orders']; ?></td>
                                                <td><?php echo $row['Total_Orders']; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td style="text-decoration: underline;"><a href="php/ban_user.php?id=<?php echo $row['UserID']; ?>">Disable</a></td>
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
                    <div class="panel pending-card">
                        <h3>All Products</h3>
                        <table class="pending-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Date Added</th>
                                    <th>Sponsored</th>
                                    <th>Add Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // 1. Fetch data from your view
                                    $query = "SELECT * FROM producttbl";
                                    $result = mysqli_query($conn, $query);

                                    // 2. Check if there are orders to display
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <?php
                                                    $sponsored = "";
                                                    // Check if $row exists and is not null
                                                    if (isset($row) && is_array($row)) {
                                                        if ($row['is_sponsored'] == 1) {
                                                            $sponsored = "Yes";
                                                        } else {
                                                            $sponsored = "No";
                                                        }
                                                    } else {
                                                        // Default status if no user data is found
                                                        $sponsored = "Unknown";
                                                    }
                                                ?>
                                                
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td class><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['stock']; ?></td>
                                                <td><?php echo $row['created_at']; ?></td>
                                                <td><?php echo $sponsored; ?></td>
                                                <td style="text-decoration: underline"><a href="javascript:void(0)" onclick="openRestockModal(<?php echo $row['productID']; ?>)">
        Add Stock
    </a></td>
                                                <td style="text-decoration: underline"><a href="Product Details.php?id=<?php echo $row['productID']?>">View</a></td>

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
            </div>
        </div>
    </div>

    <script src="main.js"></script>
    <link rel="stylesheet" href="css/modal.css">
    <?php include 'components/modal.php'; ?>
    <?php if (isset($_GET['status'])) { ?>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                showModal("<?php echo $_GET['msg']; ?>", "<?php echo $_GET['status']; ?>");

                // ✅ redirect after success
                if ("<?php echo $_GET['status']; ?>" === "success") {
                    setTimeout(() => {
                        window.location.href = "Admin Dashboard.php";
                    }, 1500); // 1.5 seconds delay
                }
                else{
                    showModal("<?php echo $_GET['msg']; ?>", "<?php echo $_GET['status']; ?>");
                }
            });
        </script>
    <?php } ?>
    <div id="restockModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h3>Update Stock</h3>
        <form action="php/add_stock.php" method="POST">
            <input type="hidden" name="productID" id="modalProductID">
            <label>Quantity to Add:</label>
            <input type="number" name="quantity" min="1" required>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
    </div>
    <script>
        // Get elements
        const modal = document.getElementById("restockModal");
        const closeBtn = document.querySelector(".close-btn");

        // Function to open modal and pass Product ID
        function openRestockModal(id) {
            document.getElementById("modalProductID").value = id;
            modal.style.display = "block";
        }

        // Close when clicking (X)
        closeBtn.onclick = () => modal.style.display = "none";

        // Close when clicking outside the box
        window.onclick = (event) => {
            if (event.target == modal) modal.style.display = "none";
        }
    </script>
    
</body>
</php>
