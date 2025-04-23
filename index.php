    <?php

    define('TAX_RATE', 16); //16% VAT
    define('DISCOUNT_THRESHOLD', 80000); //discount applies if total exceeds 80000
    define('DISCOUNT_RATE', 10); //10% discount
    define('LAPTOP_PRICE', 75000);
    define('MOUSE_PRICE', 1500);
    define('KEYBOARD_PRICE', 3500);
    
 

      if( isset($_POST['laptop']) && isset($_POST['mouse']) && isset($_POST['keyboard'])):
        $products = [
          ['name' => $_POST['laptop']], 'price' => LAPTOP_PRICE , 'quantity' => $_POST['laptop_quantity'],
          ['name' => $_POST['mouse']], 'price' => MOUSE_PRICE , 'quantity' => $_POST['mouse_quantity'],
          ['name' => $_POST['keyboard']], 'price' => KEYBOARD_PRICE , 'quantity' => $_POST['keyboard_quantity'],
        ];
      
      elseif(isset($_POST['laptop']) && isset($_POST['mouse'])):
        $products = [
          ['name' => $_POST['laptop']], 'price' => LAPTOP_PRICE , 'quantity' => $_POST['laptop_quantity'],
          ['name' => $_POST['mouse']], 'price' => MOUSE_PRICE , 'quantity' => $_POST['mouse_quantity'],
        ];
      
      elseif (isset($_POST['laptop']) && isset($_POST['keyboard'])):
        $products = [
          ['name' => $_POST['laptop']], 'price' => LAPTOP_PRICE , 'quantity' => $_POST['laptop_quantity'],
          ['name' => $_POST['keyboard']], 'price' => KEYBOARD_PRICE , 'quantity' => $_POST['keyboard_quantity'],
        ];

      elseif( isset($_POST['mouse']) && isset($_POST['keyboard'])):
        $products = [
          ['name' => $_POST['mouse']], 'price' => MOUSE_PRICE , 'quantity' => $_POST['mouse_quantity'],
          ['name' => $_POST['keyboard']], 'price' => KEYBOARD_PRICE , 'quantity' => $_POST['keyboard_quantity'],
        ];
      
      elseif( isset($_POST['laptop']) ):
        $products = [
          ['name' => $_POST['laptop']], 'price' => LAPTOP_PRICE , 'quantity' => $_POST['laptop_quantity'],
          ];
      
      elseif( isset($_POST['mouse']) ):
        $products = [
          ['name' => $_POST['mouse']], 'price' => MOUSE_PRICE , 'quantity' => $_POST['mouse_quantity'],
        ];
        
      elseif( isset($_POST['keyboard'])):
        $products = [
          ['name' => $_POST['keyboard']], 'price' => KEYBOARD_PRICE , 'quantity' => $_POST['keyboard_quantity'],
        ];    

      endif;
        


    function calculateTotal($items, $taxRate, $discountThreshold, $discountRate){
     
          $subTotal = 0;
          foreach ($items as $item){
            $subTotal += $item['price'] * $item['quantity'];
          }

          $saleTax = $subTotal * ($taxRate/100);

          $discount = 0;
          if($subTotal > $discountThreshold){
            $discount = $subTotal * ($discountRate/100);
          }

          $total = $subTotal - $discount + $saleTax;

          return [
            "subtotal" => $subTotal,
            "discount" => $discount,
            "saletax" => $saleTax,
            "total" => $total
          ];
        
    }


    
        $invoice = calculateTotal($products, $taxRate, $discountThreshold, $discountRate);
        

    


    require 'index.view.php';