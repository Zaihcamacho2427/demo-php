<?php include 'header.php' 
?>
<div class="container">
    <h1>Welcome to an Online Shoe Store <?php echo $_GET['FIRST_NAME']?>!</h1>

   <p>You can get your shoes online and delivered to you. Take advantage of 
    our fast ordering and delivery service.</p>
    
     <form action="ProductSearchHandler.php">
        <p><b>Start shopping by searching products!</b></p>
        <input type="text" name="name"></input><br><br>
        <input type="submit" value="Search"></input>
    </form>
    
</div>