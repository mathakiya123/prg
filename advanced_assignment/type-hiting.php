<?php
//1)Write a method in a class that accepts type-hinted parameters and demonstrate how it
//works with different datatypes


class Calculator
{
    
    public function calculate(int $a, float $b, string $operation, bool $roundResult): float
    {
        if ($operation === "add")
	 {
            $result = $a + $b;
     	   } 
	elseif ($operation === "multiply")
	 {
            $result = $a * $b;
        } 

     else 
	{
            throw new InvalidArgumentException("Invalid operation");
        }

        if ($roundResult) 
	{
            return round($result, 2);
        }

        return $result;
    }
}


$calc = new Calculator();

echo $calc->calculate(10, 5.75, "add", true) . "<br>";
echo $calc->calculate(4, 2.5, "multiply", false);

?>

