<?php
session_start();

// Read numbers from input.txt
$numbers = file(__DIR__ . "/../data/input.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$numbers = array_map('intval', $numbers);

// Sort numbers
sort($numbers);

// Get the highest number
$maxNumber = end($numbers);

// Handle increase/decrease
if (isset($_POST['action'])) {
    $currentValue = intval($_POST['max_value']);

    if ($_POST['action'] == 'increase') {
        $currentValue += 5;
    } elseif ($_POST['action'] == 'decrease') {
        $currentValue = max(0, $currentValue - 5);
    }

    $maxNumber = $currentValue; // Update max number
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Numbers</title>
    <style>
        ul {
            list-style: none;
        li {
            padding: 5px;
            font-size: 18px;
        }
    </style>
</head>
<body>
   
<?php
$numbers = file(__DIR__ . "/../data/input.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //reading numbers
$numbers = array_map('intval', $numbers); 
sort($numbers); //sorting them
$maxNumber = end($numbers); //finding the highest number
?>

<!-- front-end--> 
<div class="NumberList"> 
    <h2>Sorted List of Numbers</h2>
    <ul>
        <?php foreach ($numbers as $num): ?>
            <li><?php echo $num; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="MaxNumber">
    <h2>Highest number</h2>
        <input type="number" id="max_value" name="max_value" value="<?php echo $maxNumber; ?>" readonly>
        <button type="submit"  class="increase">+</button>
        <button type="submit"  class="decrease">-</button>
</div>


</body>
</html>