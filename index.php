<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Scoops Ice Cream Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="images/logo.png" alt="Sweet Scoops Logo" class="logo">
        </div>
        <h1>Sweet Scoops</h1>
        <p>Home of the creamiest ice cream in town!</p>
    </header>
    
    <div class="container">
        <section class="menu">
            <h2>Our Flavors</h2>
            <div class="flavors">
                <?php
                // Ice cream flavors data with image references
                $flavors = [
                    [
                        'name' => 'Vanilla Dream', 
                        'price' => 3.50, 
                        'description' => 'Classic vanilla with real vanilla beans',
                        'image' => 'vanilla.jpg'
                    ],
                    [
                        'name' => 'Chocolate Fudge', 
                        'price' => 4.00, 
                        'description' => 'Rich chocolate with fudge swirls',
                        'image' => 'chocolate.jpg'
                    ],
                    [
                        'name' => 'Strawberry Bliss', 
                        'price' => 3.75, 
                        'description' => 'Fresh strawberries in every bite',
                        'image' => 'strawberry.jpg'
                    ],
                    [
                        'name' => 'Mint Chip', 
                        'price' => 4.25, 
                        'description' => 'Cool mint with chocolate chunks',
                        'image' => 'mint choco.jpg'
                    ],
                    [
                        'name' => 'Cookie Dough', 
                        'price' => 4.50, 
                        'description' => 'Vanilla ice cream with chunks of cookie dough',
                        'image' => 'cookie.jpg'
                    ],
                    [
                        'name' => 'Rocky Road', 
                        'price' => 4.75, 
                        'description' => 'Chocolate with marshmallows and nuts',
                        'image' => 'rocky road.jpg'
                    ]
                ];
                
                foreach ($flavors as $flavor) {
                    echo '<div class="flavor">';
                    echo '<div class="flavor-image">';
                    echo '<img src="images/' . $flavor['image'] . '" alt="' . $flavor['name'] . '">';
                    echo '</div>';
                    echo '<h3>' . $flavor['name'] . '</h3>';
                    echo '<p class="price">$' . number_format($flavor['price'], 2) . '</p>';
                    echo '<p class="description">' . $flavor['description'] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
        <section class="order-form">
            <h2>Place Your Order</h2>
            <form action="process_order.php" method="post" id="orderForm">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label>Select Flavor:</label>
                    <select name="flavor" id="flavorSelect" required>
                        <option value="">-- Choose a flavor --</option>
                        <?php
                        foreach ($flavors as $flavor) {
                            echo '<option value="' . $flavor['name'] . '">' . 
                                 $flavor['name'] . ' - $' . number_format($flavor['price'], 2) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="scoops">Number of Scoops (1-3):</label>
                    <input type="number" id="scoops" name="scoops" min="1" max="3" value="1" required>
                </div>
                
                <div class="form-group">
                    <label>Toppings:</label>
                    <div class="toppings">
                        <label><input type="checkbox" name="toppings[]" value="Sprinkles"> Sprinkles (+$0.50)</label>
                        <label><input type="checkbox" name="toppings[]" value="Hot Fudge"> Hot Fudge (+$1.00)</label>
                        <label><input type="checkbox" name="toppings[]" value="Whipped Cream"> Whipped Cream (+$0.75)</label>
                        <label><input type="checkbox" name="toppings[]" value="Cherry"> Cherry (+$0.25)</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="special">Special Instructions:</label>
                    <textarea id="special" name="special"></textarea>
                </div>
                
                <button type="submit" class="btn">Place Order</button>
            </form>
            
            <div id="orderSummary" class="order-summary" style="display:none;">
                <h3>Your Order Summary</h3>
                <p id="summaryContent"></p>
            </div>
        </section>
        
        <!-- Rest of the order form remains the same -->
    </div>
    
    <script src="script.js"></script>
</body>
</html>