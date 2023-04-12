<?php  include('../../config/config.php');
extract($_POST);

// print_r($_POST);

// $date=date('now');

$count=count($title);
for ($i = 0; $i < $count; $i++) {
    
    $image_type =strtotime('now').$_FILES['image']['name'][$i];

    move_uploaded_file($_FILES['image']['tmp_name'][$i], "../../assates/image/" . $image_type);

        if($title[$i]!=""){  

          $ins_qualification = mysqli_query($conn, " INSERT INTO `products` ( `name`, `description`, `qty`, `image`, `date`, `price`) VALUES ( '" . $title[$i] . "', '" . $description[$i] . "', '" . $qty[$i] . "', '" . $image_type. "', '" . $date[$i] . "', '" . $price[$i] . "')");
    
        }
    
  }

  if($ins_qualification ){
    echo '<div class="alert alert-success"  style="">
  <button type="button" class="close" data-dismiss="alert" style="margin-left: 5px">  x  </button>
  <strong >Insert Successfull</strong></div>';

  echo "<script>

  var sss = setInterval(goto , 1000);

  function goto(){ window.location='show_product.php'; }
      </script>";
  }

?>