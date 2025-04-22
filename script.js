document.addEventListener('DOMContentLoaded', function() {
    const orderForm = document.getElementById('orderForm');
    const flavorSelect = document.getElementById('flavorSelect');
    const scoopsInput = document.getElementById('scoops');
    const orderSummary = document.getElementById('orderSummary');
    const summaryContent = document.getElementById('summaryContent');
    
    // Update order summary as user fills out the form
    orderForm.addEventListener('change', updateOrderSummary);
    orderForm.addEventListener('input', updateOrderSummary);
    
    function updateOrderSummary() {
        const name = document.getElementById('name').value;
        const flavor = flavorSelect.value;
        const scoops = scoopsInput.value;
        const toppings = Array.from(document.querySelectorAll('input[name="toppings[]"]:checked')).map(el => el.value);
        const special = document.getElementById('special').value;
        
        if (!flavor) {
            orderSummary.style.display = 'none';
            return;
        }
        
        // Calculate price (simplified client-side version)
        const flavorPrices = {
            'Vanilla Dream': 3.50,
            'Chocolate Fudge': 4.00,
            'Strawberry Bliss': 3.75,
            'Mint Chip': 4.25,
            'Cookie Dough': 4.50,
            'Rocky Road': 4.75
        };
        
        const toppingPrices = {
            'Sprinkles': 0.50,
            'Hot Fudge': 1.00,
            'Whipped Cream': 0.75,
            'Cherry': 0.25
        };
        
        const basePrice = flavorPrices[flavor] || 0;
        let toppingsTotal = 0;
        
        toppings.forEach(topping => {
            toppingsTotal += toppingPrices[topping] || 0;
        });
        
        const total = (basePrice * scoops) + toppingsTotal;
        
        // Build summary HTML
        let html = `<p><strong>Flavor:</strong> ${flavor}</p>`;
        html += `<p><strong>Scoops:</strong> ${scoops}</p>`;
        html += `<p><strong>Toppings:</strong> ${toppings.length ? toppings.join(', ') : 'None'}</p>`;
        
        if (special) {
            html += `<p><strong>Special Instructions:</strong> ${special}</p>`;
        }
        
        html += `<p><strong>Estimated Total:</strong> $${total.toFixed(2)}</p>`;
        
        if (name) {
            html = `<p>Hello, ${name}! Here's your order:</p>` + html;
        }
        
        summaryContent.innerHTML = html;
        orderSummary.style.display = 'block';
    }
    
    // Form submission (additional validation could be added here)
    orderForm.addEventListener('submit', function(e) {
        // In a real app, you might do additional validation here
        // For this demo, we'll just let it submit
    });
});