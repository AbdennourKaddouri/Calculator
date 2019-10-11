<?php
$num1 = 0;
$num2 = 0;
$total = 0;
$choice = "";
$error = "";

if( isset( $_POST['submit']))
{
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $choice = $_POST['choice'];

    //voorwaarden

    if(is_numeric($num1) && is_numeric($num2))
    {
        if ($choice == 'plus')
        {
            $total = $num1 + $num2;
        }
        if ($choice == 'multiply')
        {
            $total = $num1 * $num2;
        }
        if ($choice == 'divide')
        {
            $total = $num1 / $num2;
        }
        if ($num2==0)
        {
            $total = "kan niet delen door 0";
        }
        if ($choice == 'minus')
        {
            $total = $num1 - $num2;
        }
        if ($choice == 'pow')
        {
            $total = pow($num1,$num2);
        }
    }
    else if(is_numeric($num1))
    {
        if ($choice == 'sqrt')
        {
            if($num1 < 0)
            {
                $error = "Je kan geen negatieve getallen gebruiken";
            }
            else
            {
                $total = sqrt($num1);
            }
        }
        if ($choice == 'miles to km')
        {
            $total = $num1 * 1.609;
        }
        if ($choice == 'km to miles')
        {
            $total = $num1 * 0.621;
        }
    }
    else 
    {
        $error = "Je mag alleen getallen invullen.";
    }
} 
?>
<html>
<head>
<title>Calculator</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
    <body>
        <div class="container">
            <div class="top-part">
                <?php
                if($error != "")
                {
                    echo $error;
                }
                else
                {
                    echo $total;
                }
                ?>
            </div>
                 <div class="bottom-part">
                <form method="POST" action="">
                    <ul>
                        <li>
                            <label>Number 1</label>
                            <input name="number1" class="input-numbers" type="text" value="" placeholder="Your first number">
                        </li>
                        <li>
                            <label>Operator</label>
                            <select name="choice"><br>
                                <option value = "plus"> +</option>
                                <option value = "minus"> -</option>
                                <option value = "multiply"> *</option>
                                <option value = "divide"> /</option>
                                <option value = "sqrt">√</option>
                                <option value = "pow">^</option>
                                <option value = "miles to km">miles > km</option>
                                <option value = "km to miles">km > miles</option>
                            </select>
                        </li>
                        <li id="second-input">
                            <label>Number 2</label>
                            <input name="number2" class="input-numbers" type="text" value="" placeholder="Your second number">
                        </li>
                        <li>
                            <input class="btn-calculate" name="submit" type="submit" value="Calculate">
                            <input class="btn-reset" name="reset" type="submit" value="Reset">
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </body>
</html>