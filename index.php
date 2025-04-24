    <?php

    define('TAX_RATE', 16); //16% VAT
    define('DISCOUNT_THRESHOLD', 80000); //discount applies if total exceeds 80000
    define('DISCOUNT_RATE', 10); //10% discount
    define('LAPTOP_PRICE', 75000);
    define('MOUSE_PRICE', 1500);
    define('KEYBOARD_PRICE', 3500);
    


    if ((isset($_POST['laptop']) && $_POST['laptop_quantity'] === '') ||
        (isset($_POST['mouse']) && $_POST['mouse_quantity'] === '') ||
        (isset($_POST['keyboard']) && $_POST['keyboard_quantity'] === '')) { 
      $err = 'Please enter quantity for selected items.';
} else {
  $products = [];

  if (isset($_POST['laptop']) && $_POST['laptop_quantity'] !== '') {
      $products[] = ['name' => 'Laptop', 'price' => LAPTOP_PRICE, 'quantity' => $_POST['laptop_quantity']];
  }
  
  if (isset($_POST['mouse']) && $_POST['mouse_quantity'] !== '') {
      $products[] = ['name' => 'Mouse', 'price' => MOUSE_PRICE, 'quantity' => $_POST['mouse_quantity']];
  }
  
  if (isset($_POST['keyboard']) && $_POST['keyboard_quantity'] !== '') {
      $products[] = ['name' => 'Keyboard', 'price' => KEYBOARD_PRICE, 'quantity' => $_POST['keyboard_quantity']];
  }
  
}

   
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


    
        $invoice = calculateTotal($products, TAX_RATE, DISCOUNT_THRESHOLD, DISCOUNT_RATE);
  

    


    require 'index.view.php';