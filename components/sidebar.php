
<link rel="stylesheet" href="../css/style.css">

<aside id="sidebar" class="sidebar minimized">
    <button id="Minmax_button" onclick="minmax_icon()"><svg class="icon"><use xlink:href="/Web Sys E Commerce/Icons/Menu.svg"></use></svg><span>Minimize</span></button> 
    <button 
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'Dashboard.php' ? 'sidebar-selected' : ''; ?>" 
        onclick="location.href='Dashboard.php'">

        <svg class="<?php echo basename($_SERVER['PHP_SELF']) == 'Dashboard.php' ? 'icon icon-selected' : 'icon'; ?>" ><use xlink:href="/Web Sys E Commerce/Icons/Dashboard.svg"></use></svg>
        <span>Dashboard</span>
    </button>
    <button 
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'Products.php' || basename($_SERVER['PHP_SELF']) == 'Product Details.php') ? 'sidebar-selected' : ''; ?>" 
        onclick="location.href='Products.php'">
        <svg class="<?php echo (
    basename($_SERVER['PHP_SELF']) == 'Products.php' || 
    basename($_SERVER['PHP_SELF']) == 'Product Details.php'
) ? 'icon icon-selected' : 'icon'; ?>" ><use xlink:href="/Web Sys E Commerce/Icons/Package.svg"></use></svg>
        <span>Products</span>
    </button>
    <button 
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'Carts.php' ? 'sidebar-selected' : ''; ?>" 
        onclick="location.href='Carts.php'">
        <svg class="<?php echo basename($_SERVER['PHP_SELF']) == 'Carts.php' ? 'icon icon-selected' : 'icon'; ?>" ><use xlink:href="/Web Sys E Commerce/Icons/Cart.svg"></use></svg>
        <span>Carts</span>
    </button>
    <button 
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'Orders.php' ? 'sidebar-selected' : ''; ?>" 
        onclick="location.href='Orders.php'">
        <svg class="<?php echo basename($_SERVER['PHP_SELF']) == 'Orders.php' ? 'icon icon-selected' : 'icon'; ?>" ><use xlink:href="/Web Sys E Commerce/Icons/Orders.svg"></use></svg>
        <span>Orders</span>
    </button>
    <button 
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'Home Page.php' ? 'sidebar-selected' : ''; ?>" 
        onclick="location.href='Home Page.php'">
        <svg class="<?php echo basename($_SERVER['PHP_SELF']) == 'Home Page.php' ? 'icon icon-selected' : 'icon'; ?>" ><use xlink:href="/Web Sys E Commerce/Icons/Logout.svg"></use></svg>
        <span>Logout</span>
    </button>
</aside>

<script src="../main.js"></script>
