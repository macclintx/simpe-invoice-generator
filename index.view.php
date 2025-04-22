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
    </body>
</html>