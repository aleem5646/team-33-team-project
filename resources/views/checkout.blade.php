@extends('layouts.customer-layout')
@section('title','Checkout')

@section('content')
<style>
    /* Layout */
    .container { 
        max-width: 1000px; margin: 0 auto; padding: 20px; 
        font-family: Arial, sans-serif; 
    }
    .checkout-section { 
        display: flex; gap: 30px; margin-top: 20px; 
        align-items: stretch; margin-bottom: 40px;
    }
    .checkout-left { flex: 2; }
    .checkout-right { 
        flex: 1; background: #dee1d4; padding: 20px; 
        border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
    }

    /* Form styling */
    label { display: block; margin-top: 15px; font-weight: bold; }
    input[type="text"], input[type="email"], input[type="tel"] {
        width: 100%; padding: 10px; margin-top: 5px; 
        border: 1px solid #ccc; border-radius: 6px;
    }
    .row { display: flex; gap: 5px; }
    .row .half { flex: 1; }
    .checkbox { margin-top: 20px; display: flex; align-items: center; }
    .checkbox input { margin-right: 8px; }
    .checkbox label { margin: 0; font-weight: normal; }

    /* Buttons */
    .confirm-btn {
        margin-top: 25px; background: #69714a; color: white;
        padding: 10px 20px; border: none; border-radius: 6px;
        cursor: pointer;
    }
    .confirm-btn:hover { background: #55603a; }

    /* Summary box */
    .summary-box h3 { margin-bottom: 15px; }
    .summary-item { display: flex; justify-content: space-between; margin-bottom: 10px; }
    .summary-total { border-top: 1px solid #ccc; padding-top: 10px; font-weight: bold; }

    /* Popup */
    .popup {
        display: none; position: fixed; top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        background: #d4edda; color: #155724;
        padding: 20px; border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        z-index: 1000; text-align: center;
    }
</style>

<div class="container">
    <div class="checkout-section">
        
        <!-- Left side: Form -->
        <div class="checkout-left">
            <form id="checkoutForm" method="POST" action="{{ route('order.confirm') }}">
                @csrf

                <label for="email">Email*</label>
                <input type="email" id="email" name="email" placeholder="name@example.com" required>

                <label>Shipping Address</label>
                <div class="row">
                    <div class="half">
                        <input type="text" name="first_name" placeholder="First name" required>
                    </div>
                    <div class="half">
                        <input type="text" name="last_name" placeholder="Last name" required>
                    </div>
                </div>

                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="apartment" placeholder="Apartment, suite, etc. (optional)">
                
                <div class="row">
                    <div class="half">
                        <input type="text" name="city" placeholder="City" required>
                    </div>
                    <div class="half">
                        <input type="text" name="postcode" placeholder="Postcode" required>
                    </div>
                </div>

                <input type="tel" name="phone" placeholder="Phone number (optional)">

                <div class="checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I confirm I have read all the terms.</label>
                </div>

                <button type="submit" class="confirm-btn">Confirm Order</button>
            </form>
        </div>

        <!-- Right side: Order Summary -->
        <div class="checkout-right summary-box">
            <h3>Summary of the Order</h3>
            <div class="summary-item">
                <span>Item Name</span>
                <span>£0.00</span>
            </div>
            <div class="summary-item">
                <span>Quantity</span>
                <span>0</span>
            </div>
            <div class="summary-item">
                <span>Shipping</span>
                <span>£0.00</span>
            </div>
            <div class="summary-total">
                <span>Total</span>
                <span>£0.00</span>
            </div>
            <!-- Placeholders only, backend will inject real data later -->
        </div>
    </div>
</div>

<!-- Thank You Popup -->
<div id="thankYouPopup" class="popup">
    🎉 Thank you! Your order has been confirmed.
</div>

<script>
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const popup = document.getElementById('thankYouPopup');
        popup.style.display = 'block';

        setTimeout(() => { popup.style.display = 'none'; }, 3000);

        this.submit();
    });
</script>
@endsection
