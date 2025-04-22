<?php
// Simulate order processing without database

// Get form data
$name = htmlspecialchars($_POST['name'] ?? '');
$flavor = htmlspecialchars($_POST['flavor'] ?? '');
$scoops = intval($_POST['scoops'] ?? 1);
$toppings = $_POST['toppings'] ?? [];
$special = htmlspecialchars($_POST['special'] ?? '');

// Prices (instead of database)
$flavor_prices = [
    'Vanilla Dream' => 3.50,
    'Chocolate Fudge' => 4.00,
    'Strawberry Bliss' => 3.75,
    'Mint Chip' => 4.25,
    'Cookie Dough' => 4.50,
    'Rocky Road' => 4.75
];

$topping_prices = [
    'Sprinkles' => 0.50,
    'Hot Fudge' => 1.00,
    'Whipped Cream' => 0.75,
    'Cherry' => 0.25
];

// Calculate total
$base_price = $flavor_prices[$flavor] ?? 0;
$toppings_total = 0;

foreach ($toppings as $topping) {
    $toppings_total += $topping_prices[$topping] ?? 0;
}

$total = ($base_price * $scoops) + $toppings_total;

// Generate order summary
$order_summary = "
    <h1>Sweet Scoops Order Confirmation</h1>
    <p>Thank you, $name! Your order has been received.</p>
    
    <h2>Order Details:</h2>
    <p><strong>Flavor:</strong> $flavor</p>
    <p><strong>Scoops:</strong> $scoops</p>
    
    <p><strong>Toppings:</strong> " . (empty($toppings) ? 'None' : implode(', ', $toppings)) . "</p>
    
    " . ($special ? "<p><strong>Special Instructions:</strong> $special</p>" : "") . "
    
    <h3>Total: $" . number_format($total, 2) . "</h3>
    
    <p>Your ice cream will be ready in about 10 minutes. Thank you for choosing Sweet Scoops!</p>
";

// In a real application, you would save to a database here
// For this demo, we'll just display the confirmation

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | Sweet Scoops</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sweet Scoops</h1>
    </header>
    
    <div class="container confirmation">
        <?php echo $order_summary; ?>
        <a href="index.php" class="btn">Back to Menu</a>
    </div>
</body>
</html>