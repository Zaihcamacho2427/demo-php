<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">SHOE STORE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if (!isset($_SESSION['USER_NAME'])): ?>

      <?php else: ?>
      <li class="nav-link" class="nav-item active">Welcome <?php echo $_SESSION['USER_NAME']; ?>!<span class="sr-only">(current)</span>
      </li>
      <?php endif; ?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?pageNumber=1">Search Products<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="showCart.php">Cart<span class="sr-only">(current)</span></a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="processLogout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
      
      
      
      <?php if($_SESSION['role'] == '1'):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Access
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="NewProduct.php">Add New Product</a>
          <a class="dropdown-item" href="adminProducts.php">Product Admin Page</a>
          <a class="dropdown-item" href="showPeople.php">Search Users</a>
          <a class="dropdown-item" href="adminUsers.php">User Admin Page</a>
           <a class="dropdown-item" href="showReportCreator.php">Reports</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>
    
    <form action="productSearchHandler.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="productName" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
