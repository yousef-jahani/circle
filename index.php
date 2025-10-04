<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brocode</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h1 style="color: cadetblue;">write radius of circle you want and i will find option you want.</h1>
        <label>Radius:</label><br>
        <input type="number" name="radius">
        <input type="submit" name="calculate" value="area">
        <input type="submit" name="calculate" value="circumference">
        <input type="submit" name="calculate" value="volume">  
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $radius = $_POST["radius"];
        $pi = pi();
        $radius = floatval($radius);
        $pi = round($pi,2);
        $area = $pi*pow($radius,2);
        $circumference = 2*$pi*$radius;
        $volume = (4/3)*$pi*pow($radius,3);
        if(isset($_POST["calculate"])){
            $calculation = $_POST["calculate"];
            echo "<h3>results:</h3>";
            echo "Radius:" . $radius . "<br>";
            switch ($calculation) {
                case 'area':
                    echo "Area : $area";
                    break;
                case 'circumference':
                    echo "circumference : $circumference";
                    break;
                case 'volume':
                    echo "volume : $volume";
                    break;
                default:
                    echo "you should choose an input";
                    break;
            }
        }
    }
    if (empty($_POST["radius"])) {
        echo "<p style=\"color: red;\">please fill the radius input with a number</p>";
    }
?>