<p>
Validate the following number:<br>
Isaiah <br>
Visa<br>
test<br>
test<br>
April 2020<br>
</p>
<hr>

<div class="container">
<h1>Enter Card Information</h1>

    <form action="processCheckout2.php" method="post">
        <div class="form-group">
        <img src="pics/visa.png" id="visa" height='40'>
        <img src="pics/mastercard.png" id="mastercard" height='40'>
        </div>
    
        <div class="form-group">
        <label for="owner">Credit Card Holder</label>
        <input type="text" class="form-control" id="owner" name="owner">
        </div>
        
        <div class="form-group">
        <label for="cardNumber">Card Number</label>
        <input type="text" class="form-control" id="cardNumber" name="cardNumber">
        </div>
          
        <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv">
        </div>

        <div class="form-group">
        <label>Expiration Date</label>
        <select name="month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>
        
        <select name="year">
        <option value="20">2020</option>
        <option value="21">2020</option>
        <option value="22">2021</option>
        <option value="23">2022</option>
        <option value="24">2024</option>
        </select>
        </div>
        
        <div class="form-group">
        <button type="submit" class="btn btn-primary" id="confirm-purchase">Confirm</button>
        </div>
    </form>
</div>