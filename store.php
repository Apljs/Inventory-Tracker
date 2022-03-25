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

    <?php
    $db = $itemName = $inventory = $unitType = $numPurchased = $numSold = $price = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      $db = fopen("data.txt", "a") or exit("The file is unable to be opened.");
      $itemName = $_POST["item-name-input"];
      $inventory = $_POST["units-input"];
      $unitType = $_POST["unit-type-input"];
      $numPurchased = $_POST["purchase-input"];
      $numSold = $_POST["sold-input"];
      $price = $_POST["price-input"];
      if (!empty($itemName and $inventory and $unitType and $numPurchased and $numSold and $price)){
        $inData = $itemName." ".$inventory." ".$unitType." ".$numPurchased." ".$numSold." ".$price.PHP_EOL;
        fwrite($db, $inData);
      }
      fclose($db);
      print "<h4 class=\"table-format\">Thank you for your submission!</h4>";
    }

    function cleanData($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>