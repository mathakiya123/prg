<?php
//1)Create a class marked as final and attempt to extend it to show the restriction

//-> final class cannot be inherited 


// Final class
final class Payment
{
    public function process()
    {
        echo "Payment processed successfully.";
    }
}

//  Attempt to extend a final class (NOT allowed)
class OnlinePayment extends Payment
{
    public function processOnline()
    {
        echo "Online payment processed.";
    }
}

// Object creation
$payment = new Payment();
$payment->process();
