<?php 
include 'header2.php';
?>

<div class= "container">

<h1>Create a new user account</h1>

<form action= "ProcessNewUser.php">

  <div class="form-group">
    <label for="firstname">First Name: </label>
    <input type="text" class="form-control" id="firstname" placeholder="First Name" name= "firstname">
  </div>
  
  
  <div class="form-group">
    <label for="lastname">Last Name: </label>
    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name= "lastname">
  </div>
  
    <div class="form-group">
    <label for="username">Username: </label>
    <input type="text" class="form-control" id="username" placeholder="Username" name= "username">
  </div>
  
    <div class="form-group">
    <label for="Role">Role</label>
    <select class="form-control" id="Role" name= "Role">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>

    </select>
  </div>
  
      <div class="PassWord">
    <label for="PassWord">Password: </label>
    <input type="password" class="form-control" id="PassWord" placeholder="Password" name= "PassWord">
  </div>
  
  <button type="submit" class="btn btn-primary">Ok</button>
  
</form>

</div>