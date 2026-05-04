<!DOCTYPE.php>
.php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
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
    <aside id="sidebar" class="sidebar minimized">
        <button id="Minmax_button" onclick="minmax_icon()"><svg class="icon"><use xlink:href="Icons/Menu.svg"></use></svg><span>Minimize</span></button> 
        <button onclick="location.href='Dashboard.php'"><svg class="icon"><use xlink:href="Icons/Dashboard.svg"></use></svg><span>Dashboard</span></button> 
        <button onclick="location.href='Products.php'"><svg class="icon"><use xlink:href="Icons/Package.svg"></use></svg><span>Products</span></button> 
        <button onclick="location.href='Carts.php'" class="sidebar-selected"><svg class="icon icon-selected"><use xlink:href="Icons/Cart.svg"></use></svg><span>Carts</span></button> 
        <button onclick="location.href='Orders.php'"><svg class="icon"><use xlink:href="Icons/Orders.svg"></use></svg><span>Orders</span></button> 
        <button onclick="location.href='Home Page.php'"><svg class="icon"><use xlink:href="Icons/Logout.svg"></use></svg><span>Logout</span></button> 
    </aside>
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
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Shoes1.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,499</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">UrbanFlex Runner</div>
                        <div id="description">Lightweight running shoes with breathable mesh and flexible sole for everyday comfort.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Shoes2.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,899</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">StreetCore High Tops</div>
                        <div id="description">Stylish high-cut sneakers designed for casual wear with durable rubber outsole.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Shoes3.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱2,299</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">AirStride Pro</div>
                        <div id="description">Cushioned performance shoes built for long runs and maximum shock absorption.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Shoes4.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱899</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">Classic Canvas Low</div>
                        <div id="description">Minimalist canvas sneakers perfect for daily use and easy outfit matching.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Shoes5.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱2,499</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">TrailBlaze XT</div>
                        <div id="description">Rugged outdoor shoes with strong grip, ideal for hiking and rough terrain.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Bag.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,699</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                   <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">NeoSport Trainers</div>
                        <div id="description">Versatile training shoes for gym workouts and active lifestyles.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Sandals.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,799</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">GlideMax Comfort</div>
                        <div id="description">Ultra-soft cushioning with a sleek design for all-day walking comfort.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Gloves.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,599</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">Velocity Knit</div>
                        <div id="description">Modern knit sneakers offering a snug fit and lightweight feel.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Helmet.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱2,199</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">Apex Court Shoes</div>
                        <div id="description">Designed for court sports with enhanced grip and ankle support.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="picture-container">
                        <div class="picture center">
                            <img src="Pictures/Black Women Shoe - 900x451.png" alt="">
                        </div>
                        <div class="price-container">
                            <div id="price">₱1,499</div>
                            <div>
                                <button class="buy-button">Buy</button>
                                <div>
                                    <svg class="icon"><use xlink:href="Icons/trash.svg"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="label-description">
                        <div class="label">RetroDash 90s</div>
                        <div id="description">Vintage-inspired sneakers with bold colors and a nostalgic vibe.</div>
                    </div>
                </div>
                
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
<.php>