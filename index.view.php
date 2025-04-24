<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e2f;
            color: #f1f1f1;
            padding: 20px;
        }

        span {
            color: red;
        }

        form {
            background-color: #2a2a3d;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin-bottom: 40px;
        }

        label {
            display: inline-block;
            width: 100px;
            margin-top: 10px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type="number"] {
            width: 150px;
            padding: 5px;
            margin-bottom: 10px;
            background-color: #444;
            color: #fff;
            border: 1px solid #666;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00b894;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
        }

        h2, h3, h4 {
            margin-bottom: 10px;
        }

        h3 {
            color: #00cec9;
        }

        h2 {
            color: #81ecec;
        }

        h4 {
            color: #fab1a0;
            margin-top: 20px;
        }

        hr {
            border: 1px solid #555;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <form action="index.php" method="post">
        <label for="laptop">Laptop</label>
        <input type="checkbox" name="laptop" id="laptop" value="laptop">
        <input type="number" name="laptop_quantity" id="laptop_quantity" placeholder="Laptop Quantity" min="0"><br>            

        <label for="mouse">Mouse</label>
        <input type="checkbox" name="mouse" id="mouse" value="mouse">
        <input type="number" name="mouse_quantity" id="mouse_quantity" placeholder="Mouse Quantity" min="0" ><br>
        
        <label for="keyboard">Keyboard</label>
        <input type="checkbox" name="keyboard" id="keyboard" value="keyboard">
        <input type="number" name="keyboard_quantity" id="keyboard_quantity" placeholder="Keyboard Quantity" min="0" ><br>
        
        <?php if($err):?>
            <span><?=$err;?></span>
        <?php endif;?>
        <input type="submit" value="Generate invoice">
    </form>


    <?php if (!empty($products) && isset($invoice)): ?>
       <h4>Itemized Invoice <br>************************************</h4>
        <?php
            foreach( $products as $product):
                echo "<h3>".
                    $product['quantity']."x ".$product['name']." - ".$product['price'] * $product['quantity']." KES".
                "</h3>";
            endforeach;
        ?>

        <h4>************************************</h4>

        <?php 
            echo "<h3>";
            echo "Subtotal: ".$invoice['subtotal']." KES<br>";
            echo "Discount (10%): ".$invoice['discount']." KES<br>";
            echo "Tax (16%): ".$invoice['saletax']." KES";
            echo "</h3>";

            echo "<h4>************************************</h4>";
            echo "<h2>Total: ".number_format($invoice['total'],2)." KES </h2><br>";
        ?>
    <?php endif; ?>

    

</body>
</html>
