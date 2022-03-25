<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Inventory Tracker</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="script.js" rel="script"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-dark" style="background-color: #ff0000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Inventory Tracker</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor"
                aria-controls="navbarColor" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Add Item</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="edit.html">Edit Item</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="remove.html">Remove Item</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="show.php">Show Table</a>
                      </li>
                    </ul>
            </div>
        </div>
    </nav>

    <div id="inventory-title">
      <h1>Inventory Tracking System</h1>
      <p class="subHeading">Used to track quantity and price of a business's inventory</p>
    </div>
    
    <div id="table-search" class="table-format">
      <h3>Table Search</h3>
      <p >Search for items using the search bar below:</p>
      <input type="text" id="search-input" onkeyup="filter()" placeholder="Search for names.." class="mb-4">
    </div>
    
    <div id="table-main" class="table-responsive table-format">
      <table id="show-table" class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Item Name</th>
            <th scope="col">Inventory</th>
            <th scope="col">Unit Type</th>
            <th scope="col">Number Purchased</th>
            <th scope="col">Number Sold</th>
            <th scope="col">Inventory Left</th>
            <th scope="col">Purchase Price</th>
            <th scope="col">Total Value</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $itemName = $inventory = $unitType = $numPurchased 
          = $numSold = $price = $inventoryLeft = $totalValue = "";
          if ($data = fopen("data.txt", "r") or exit("The file is unable to be opened.")) {
            while(!feof($data)) {
              $line = explode(" ", fgets($data));
              $itemName = $line[0];
              $inventory = $line[1];
              $unitType = $line[2];
              $numPurchased = $line[3];
              $numSold = $line[4];
              $price = $line[5];
              $inventoryLeft = ($inventory+$numPurchased)-$numSold;
              $totalValue = sprintf('%.2f', ($price * $inventoryLeft));
              if (!empty($itemName and $inventory and $unitType and $numPurchased 
              and $numSold and $price and $inventoryLeft and $totalValue)){
                print "<tr><td>$itemName</td><td>$inventory</td><td>$unitType</td><td>$numPurchased</td>
                <td>$numSold</td><td>$inventoryLeft</td><td>$price</td><td>$totalValue</td></tr>";
              }
            }
            fclose($data);
          }
          ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  </html>