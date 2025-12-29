<?php 
//Practical Exercise :
//1)Create a simple class in PHP that demonstrates encapsulation by using private and public  properties and methods.

class BankAccount {
    private $balance;

   
    public function __construct($amount) {
        $this->balance = $amount;
    }

    
    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient balance!<br>";
        }
    }


    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount(1000);
$account->deposit(500);
$account->withdraw(200);

echo "Current Balance: " . $account->getBalance();  
?>


