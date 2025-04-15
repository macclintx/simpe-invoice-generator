    <?php

    define('TAX_RATE', 16); //16% VAT
    define('DISCOUNT_THRESHOLD', 80000); //discount applies if total exceeds 80000
    define('DISCOUNT_RATE', 10); //10% discount


    //array of items
    $products = [
        ['name' => 'Laptop', 'price' => 75000, 'quantity' => 2],
        ['name' => 'Mouse', 'price' => 1500, 'quantity' => 3],
        ['name' => 'Keyboard', 'price' => 3500, 'quantity' => 4]
    ];



    function calculateTotal($items, $taxRate, $discountThreshold, $discountRate){
     
          $total = 0;
          $subTotal = 0;
          foreach ($items as $item){
            $subTotal += $item['price'] * $item['quantity'];
          }

          $saleTax = $subTotal * ($taxRate/100);

          if($subTotal > $discountThreshold){
            $discount = $subTotal * ($discountRate/100);
          }

          $total += $subTotal - $discount + $saleTax;

          return [
            "subtotal" => $subTotal,
            "discount" => $discount,
            "saletax" => $saleTax,
            "total" => $total
          ];
        
    }


    function generateInvoice($items, $taxRate, $discountThreshold, $discountRate){
        $invoice = calculateTotal($items, $taxRate, $discountThreshold, $discountRate);
        

        echo "Itemized Invoice\n";
        echo "---------------------------------\n";
        foreach ($items as $item){
            echo $item['quantity']."x ".$item['name']." - ".$item['price'] * $item['quantity']." KES\n";
        }

        echo "---------------------------------\n\n";

        echo "Subtotal: ".$invoice['subtotal']." KES\n";
        echo "Discount (10%): ".$invoice['discount']." KES \n";
        echo "Tax (16%): ".$invoice['saletax']." KES \n\n";

        echo "---------------------------------\n";
        echo "Total: ".$invoice['total']." KES \n";


    }

    generateInvoice($products, TAX_RATE, DISCOUNT_THRESHOLD, DISCOUNT_RATE);

    
   