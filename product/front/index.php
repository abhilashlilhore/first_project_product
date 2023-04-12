<?php include('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <link rel="stylesheet" href="../assates/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Add Product </h2> <a href="show_product.php" class="btn btn-success">Products</a>

    <form id="catnm">

      <input type="hidden" value="1" id="autoincriment">

      <div class="row">

        <div class="col-xl-2">
          <div class="form-group">
            <label class="sr-only" for="email">Image</label>
            <input class="form-control" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required name="image[]">
            <img id="blah" alt="your image" width="100" height="100" />

          </div>
        </div>

        <div class="col-xl-2">
          <div class="form-group">
            <label class="sr-only" for="email">Title</label>
            <input type="" class="form-control" placeholder="Enter Title" name="title[]" required>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="form-group">
            <label class="sr-only" for="pwd">Description</label>
            <textarea name="description[]" id="" class="form-control" placeholder="Description field should not allow more than 250 characters.." required maxlength="250"></textarea>
          </div>
        </div>

        <div class="col-xl-1">
          <div class="form-group">
            <label class="sr-only" for="pwd">Quantity</label>
            <input type="number" class="form-control" placeholder="Enter Quantity" name="qty[]" required min="0">
          </div>
        </div>

        <div class="col-xl-2">
          <div class="form-group">
            <label class="sr-only" for="pwd">Price</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Price" name="price[]" required min="0">
            <input type="date" class="form-control" placeholder="Enter Date" name="date[]" required >
          </div>

        </div>
        <div class="col-xl-1">
          <button type="button" class="btn btn-default" onclick="add_more()">+</button>

        </div>

      </div>

      

      <div id="more_product"></div>
      <div class="row">
        <button type="submit" class="btn btn-info" title="Add Product">Save</button>
      </div>

  </div>
  </form>

  <div id="getdata"></div>
  </div>




</body>

</html>

<script src="../assates/comman.js"></script>