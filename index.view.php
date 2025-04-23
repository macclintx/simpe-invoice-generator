<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice Generator</title>
    </head>
    <body>
        <form action="index.php" method="post">
        
        <label for="laptop">Laptop</label>
        <input type="checkbox" name="laptop" id="laptop" value="laptop">
        <input type="number" name="laptop_quantity" id="laptop_quantity" placeholder="Laptop Quantity" min="0" required><br>            

        <label for="mouse">Mouse</label>
        <input type="checkbox" name="mouse" id="mouse" value="mouse">
        <input type="number" name="mouse_quantity" id="mouse_quantity" placeholder="Mouse Quantity" min="0" required><br>

        <label for="keyboard">Keyboard</label>
        <input type="checkbox" name="keyboard" id="keyboard" value="keyboard">
        <input type="number" name="keyboard_quantity" id="keyboard_quantity" placeholder="Keyboard Quantity" min="0" required><br>
        
            <input type="submit" value="Generate invoice">
        </form>

        <br><br><br>
        <h4>Itemized Invoice <br>************************************</h4>
        <?php
            foreach( $products as $product):
                echo "<h3>?".
                    $product['quantity']."x ".$product['name']." - ".$product['price'] * $product['quantity'].
                "</h3>";
            endforeach;
        ?>

        <br><br>
        <h4>************************************</h4>
    
        <?php 
            echo "<h3>";
            echo "Subtotal: ".$invoice['subtotal']." KES<br>";
            echo "Discount ($discountRate%): ".$invoice['discount']." KES<br>";
            echo "Tax ($taxRate%): ".$invoice['saletax']." KES <br>";
            echo "</h3>";

            echo "<br><br><h4>************************************</h4>";
            echo "Total: ".number_format($invoice['total'],2)." KES <br>";
        ?>
    
    </body>
</html>