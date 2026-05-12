<form action="../php/add_stock.php" method="POST" style="max-width: 300px; padding: 20px; border: 1px solid #ddd;">
    <h3>Restock Product</h3>
    
    <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>">

    <label for="quantity" style="display: block; margin-bottom: 5px;">Add Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" required 
           style="width: 100%; padding: 8px; margin-bottom: 15px;">

    <button type="submit" name="submit" 
            style="background: #2ecc71; color: white; border: none; padding: 10px 15px; cursor: pointer; width: 100%;">
        Update Stock
    </button>
</form>