<!DOCTYPE php>
<php lang="en">
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
            background: #ffffff;
            border-radius: 18px;
            padding: 10px 18px 18px 18px;
            box-shadow: 0 12px 20px rgba(0,0,0,0.08);
            border: 2px solid #007EA7;
            position: relative;
            overflow: hidden;

            grid-column: span 2;
        }
        .panel::before{
            content: '';
            width: 100%;
            height: 15%;
            background-color: #007EA7;
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
            color: #F3F3F3;
            z-index: 2;
        }
        .welcome-panel h3 {
            margin: 0;
            font-size: 15px;
            color: black;
        }
        .details-card {
          
            background: #e5e5e5;
            border-radius: 10px;
            padding: 14px;
            color: #283444;
        
            
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
            background: #e5e5e5;
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
            color: #465a6b;
        }
        .stats-card h3 {
            margin: 0;
        }
        .panel > h3 {
            margin: 0!important;
            font-size: 18px !important;
            color: #F3F3F3 !important;
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
            border: 1px solid #c9d7e7;
            padding: 10px 12px;
            font-size: 13px;
            text-align: left;
        }
        .pending-table th {
            background: #f2f7fb;
            color: #1f3d5a;
        }
        
        .recent-products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }
        .product-card {
            background: #007EA7;
            border-radius: 18px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            box-shadow: 0 12px 20px rgba(0,0,0,0.07);
            
            color: #F3F3F3;
        }
        .product-card img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
            height: 130px;
        }
        .product-card .price {
           
            font-size: 18px;
            font-weight: 700;
            color: black;
        }
        .product-card .name {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }
        .product-card .name p{
            margin: 0;
            font-size: 13px;
            font-weight: 500;
            color: #d8d8d8;
        }
        .product-card .name p:hover, .product-card .name:hover{
            text-decoration: underline;
        }
    
        .product-card .buy-button {
            margin-top: -3px;
            position: absolute;
            right: 10px;
            background: #12c56e;
            color: white;
            border: none;
            padding: 5px 23px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            align-self: flex-start;
            border: 1px solid white;

            transition: 0.3s all;
        }
        .product-card .buy-button:hover{
            background-color: white;
            color: #12c56e;
            border: 1px solid #12c56e;
        }
        .img-whitebg{
            background-color: #F3F3F3;
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
    <nav class="navbar">
        <div class="brand">Simple E-commerce System</div>
        <div class="profile">
            <div class="avatar"><svg class="icon white"><use xlink:href="Icons/Person.svg"></use></svg> </div>
            <div>MJ Jade G. Piquero</div>
        </div>
    </nav>
    <aside id="sidebar" class="sidebar maximized">
        <button id="Minmax_button" onclick="minmax_icon()"><svg class="icon"><use xlink:href="Icons/Menu.svg"></use></svg><span>Minimize</span></button> 
        <button onclick="location.href='Dashboard.php'" class="sidebar-selected"><svg class="icon icon-selected"><use xlink:href="Icons/Dashboard.svg"></use></svg><span>Dashboard</span></button> 
        <button onclick="location.href='Products.php'"><svg class="icon"><use xlink:href="Icons/Package.svg"></use></svg><span>Products</span></button> 
        <button onclick="location.href='Carts.php'"><svg class="icon"><use xlink:href="Icons/Cart.svg"></use></svg><span>Carts</span></button> 
        <button onclick="location.href='Orders.php'"><svg class="icon"><use xlink:href="Icons/Orders.svg"></use></svg><span>Orders</span></button> 
        <button onclick="location.href='Home Page.php'"><svg class="icon"><use xlink:href="Icons/Logout.svg"></use></svg><span>Logout</span></button> 
    </aside>
    <div id="main-frame">
        <div class="main-content">
            <div class="content-grid">
                <div class="row">
                    <div class="panel welcome-panel">
                        <h2>Welcome Back MJ Jade G. Piquero!</h2>
                        <div class="stats-grid">
                            <div class="details-card">
                                <h3>Address</h3>
                                <p>Purok 13, Poblacion, Valencia City, Bukidnon</p>
                                <br>
                                <p>Details:</p>
                                <p>May isa daycare, dilito luyo sa China ang Asia gawas sa china para na wala ka</p>
                            </div>
                            <div class="stats-card">
                                <h3>Total Spent</h3>
                                <strong>₱ 100,000</strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Completed Orders</h3>
                                <strong>200</strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Total Orders</h3>
                                <strong>2</strong>
                                
                            </div>
                            <div class="stats-card">
                                <h3>Cancelled Orders</h3>
                                <strong>2</strong>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel pending-card">
                        <h3>Pending Orders</h3>
                        <table class="pending-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#2012</td>
                                    <td>Apr 12</td>
                                    <td>2</td>
                                    <td>₱ 3,200</td>
                                    <td>Pending</td>
                                    <td>View</td>
                                </tr>
                                <tr>
                                    <td>#2017</td>
                                    <td>Apr 15</td>
                                    <td>1</td>
                                    <td>₱ 1,400</td>
                                    <td>Pending</td>
                                    <td>View</td>
                                </tr>
                                <tr>
                                    <td>#2024</td>
                                    <td>Apr 18</td>
                                    <td>3</td>
                                    <td>₱ 4,800</td>
                                    <td>Pending</td>
                                    <td>View</td>
                                </tr>
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
                        <h3>Recently Viewed Items</h3>
                        <div class="recent-products">
                            <div class="product-card">
                                <div class="img-whitebg">
                                    <img src="Pictures/Shoes1.png" alt="Shoes for men">
                                    <div class="price">₱1,899 <button class="buy-button">Buy</button></div>
                                    
                                </div>
                                
                                <div class="name">AeroFlex Runner
                                    <p>Lightweight running shoes ...</p>
                                </div>
                                
                                
                            </div>
                            <div class="product-card">
                                <div class="img-whitebg">
                                    <img src="Pictures/Shoes2.png" alt="Shoes for men">
                                    <div class="price">₱2,299 <button class="buy-button">Buy</button></div>
                                </div>
                                
                                <div class="name">StreetPulse Classic
                                    <p>A stylish everyday sneaker ...</p>
                                </div>
                                
                                
                            </div>
                            <div class="product-card">
                                <div class="img-whitebg">
                                    <img src="Pictures/Shoes3.png" alt="Shoes for men">
                                    <div class="price">₱2,799 <button class="buy-button">Buy</button></div>
                                </div>
                                
                                <div class="name">VoltEdge Trainers
                                    <p>High-performance training ...</p>
                                </div>
                                
                                
                            </div>
                            <div class="product-card">
                                <div class="img-whitebg">
                                    <img src="Pictures/Shoes4.png" alt="Shoes for men">
                                    <div class="price">₱1,599 <button class="buy-button">Buy</button></div>
                                </div>
                                
                                <div class="name">CloudStep Comfort
                                    <p>Ultra-soft cushioned shoes ...</p>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</php>