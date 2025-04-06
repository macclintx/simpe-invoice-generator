    <?php

    define('TAX_RATE', 16); //16% VAT
    define('DISCOUNT_THRESHOLD', 80000); //discount applies if total exceeds 80000
    define('DISCOUNT_RATE', 10); //10% discount

    $item1_name = 'Laptop';
    $item1_price = 75000;
    $item1_quantity = 1;

    $item2_name = 'Mouse';
    $item2_price = 1500;
    $item2_quantity = 2;

    $item3_name = 'Keyboard';
    $item3_price = 3500;
    $item3_quantity = 3;



    function calculateTotal(){
        global 
                $item1_price,
                $item1_quantity,
                $item2_price,
                $item2_quantity,
                $item3_price,
                $item3_quantity,
                $discount,
                $tax,
                $subTotal;

            
        $subTotal = $item1_price + ($item2_price * $item2_quantity) + ($item3_price * $item3_quantity); 
        $tax = $subTotal * 0.16;
        if( $subTotal > DISCOUNT_THRESHOLD):
            $discount = $subTotal * 0.1;
            return ($subTotal + ($subTotal * (TAX_RATE/100))) - ($subTotal * (DISCOUNT_RATE/100));
        else:
            return $subTotal + ($subTotal * 0.16);
        endif;
        
    }


    function generateInvoice(){
        global 
                $item1_name,
                $item1_price,
                $item1_quantity,
                $item2_name,
                $item2_price,
                $item2_quantity,
                $item3_name,
                $item3_price,
                $item3_quantity,
                $subTotal,
                $discount,
                $tax;
                
        calculateTotal();

        echo "Itemized Invoice \n---------------------------\n";

        echo $item1_quantity . 'x '. $item1_name . ' - ' . $item1_price * $item1_quantity ;echo "\n";
        echo $item2_quantity . 'x '. $item2_name . ' - ' . $item2_price * $item2_quantity ;echo "\n";
        echo $item3_quantity . 'x '. $item3_name . ' - ' . $item3_price * $item3_quantity ;echo "\n";


        echo "---------------------------\n";

        echo "Subtotal: $subTotal KES \nDiscount (10%): $discount KES\nTax (16%): $tax KES\n";

        echo "\n---------------------------\n";
        echo "Total: ".calculateTotal();
    }

    generateInvoice();

    
   