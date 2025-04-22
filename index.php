    <?php

    define('TAX_RATE', 16); //16% VAT
    define('DISCOUNT_THRESHOLD', 80000); //discount applies if total exceeds 80000
    define('DISCOUNT_RATE', 10); //10% discount
    define('LAPTOP_PRICE', 75000);
    define('MOUSE_PRICE', 1500);
    define('KEYBOARD_PRICE', 3500);

    $option = isset($_POST['item_option']) ? $_POST['item_option'] : $optErr = 'No item matched'; 


    //array of items
    $products = [];



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


    function generateInvoice($items, $taxRate, $discountThreshold, $discountRate){
        $invoice = calculateTotal($items, $taxRate, $discountThreshold, $discountRate);
        

        /*
        echo "Itemized Invoice\n";
        echo "---------------------------------\n";
        foreach ($items as $item){
            echo $item['quantity']."x ".$item['name']." - ".$item['price'] * $item['quantity']." KES\n";
        }

        echo "---------------------------------\n\n";

        echo "Subtotal: ".$invoice['subtotal']." KES\n";
        echo "Discount ($discountRate%): ".$invoice['discount']." KES \n";
        echo "Tax ($taxRate%): ".$invoice['saletax']." KES \n\n";

        echo "---------------------------------\n";
        echo "Total: ".number_format($invoice['total'],2)." KES \n";

      */
    }

    generateInvoice($products, TAX_RATE, DISCOUNT_THRESHOLD, DISCOUNT_RATE);

    require 'index.view.php';