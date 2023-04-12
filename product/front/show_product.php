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
        <h2>Show Product </h2> <a href="index.php" class="btn btn-success">Add Products</a>
        <input type="search" name="keyword" onkeyup="show_product()"placeholder="Title" id="keyword">

        <input type="date" id="startdate" placeholder="Start Date" onchange="show_product()" id="keyword">
        <input type="date" id="enddate" placeholder="End Date" onchange="show_product()" id="keyword">
        <a href="show_product.php" class="btn btn-success">Reset</a>


        <div id="getdata"></div>
    </div>




</body>

</html>

<script>
    function show_product(pageno) {

        // alert();
        var page=pageno?pageno:'0';
        var keyWord =$("#keyword").val();
        var startdate =$("#startdate").val();
        var enddate =$("#enddate").val();

        $.ajax({
            url: "product_listing.php?pageno="+page,
            type: "POST",
            data:{'keyWord':keyWord,'startdate':startdate,'enddate':enddate },

            success: function(data) {
                // alert(data);

                $("#getdata").html(data);
            },

            error: function() {
                alert('error');
            }
        });

    }

    show_product()
</script>