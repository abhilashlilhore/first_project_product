<?php include('../config/config.php'); 

//if($conn){echo 'success'; }
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title/image</th>
            <th scope="col">description</th>
            <th scope="col">Date</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>

        <?php $page_id=$_GET['pageno'];
        $n = '1';
        extract($_POST);
        $filter = "where products.id!='0'  ";
        if($keyWord!=""){
        $filter .= " and  (products.name  like '%$keyWord%')";
        }
        if($startdate!=""){
        $filter .= "and  ( products.date>= '$startdate' )";  
        }
        
        if($enddate!=""){
            $filter .= "and  ( products.date<= '$enddate' )";  
            }
        

        $results_per_page = 5;


        $query = "SELECT * FROM `products` $filter ";
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        
        $number_of_page = ceil($number_of_result / $results_per_page);

        if (!isset($page_id) or $page_id == 1 or $page_id == 0) {
            $page_first_result = 0;
        } else {
            $page_id = $page_id;

            $page_first_result = ($page_id - 1) * $results_per_page;
        }
        if($number_of_result>0){

        $productss = mysqli_query($conn, "SELECT * FROM `products`  $filter order by products.id  desc  LIMIT  $page_first_result ,  $results_per_page ");

        while ($productss_all = mysqli_fetch_array($productss)) {

        ?>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?php echo $productss_all['name'] ?><br>
                <img src="../assates/image/<?php echo $productss_all['image'] ?>" alt="<?php echo $productss_all['name'] ?>" width="100px">
            </th>
                <th scope="col"><?php echo wordwrap($productss_all['description'],20,'<br>') ?></th>
                <th scope="col"><?php echo $productss_all['date'] ?></th>
                <th scope="col"><?php echo $productss_all['qty'] ?></th>
                <th scope="col"><?php echo $productss_all['price'] ?></th>
            </tr>

        <?php }}else{echo 'no product found';} ?>
    </tbody>
</table>


<div class="pagination size1of1 unit">
  <?php if ($page_id == 1) : ?>
    <!-- <span class="current"><?php echo $page_id ?></span> -->
  <?php else : ?>
    <a class="prev" onclick="show_product('<?php echo ($page_id - 1) ?>')" href="javascript:;">Prev</a>
    <?php if ($page_id > 2) : ?>
      <a href="javascript:;" onclick="show_product('<?php echo 1; ?>')">1</a>
    <?php endif ?>
    <?php if ($page_id > 3) : ?>
      <span class="dots">...</span>
    <?php endif ?>
  <?php endif ?>
  <?php if ($page_id - 1 > 0) : ?>
    <a href="javascript:;" onclick="show_product('<?php echo $page_id - 1 ?>')"><?php echo $page_id - 1 ?></a>
  <?php endif ?>
  <span class="current"><?php echo $page_id ?></span>
  <?php if ($page_id + 1 < $number_of_page) : ?>
    <a href="javascript:;" onclick="show_product('<?php echo $page_id + 1 ?>')"><?php echo $page_id + 1 ?></a>
  <?php endif ?>
  <?php if ($page_id < $number_of_page) : ?>
    <?php if ($page_id < $number_of_page - 2) : ?>
      <span class="dots">...</span>
    <?php endif ?>
    <a href="javascript:;" onclick="show_product('<?php echo $number_of_page ?>')"><?php echo $number_of_page ?></a>
    <a class="next" href="javascript:;" onclick="show_product('<?php echo $page_id + 1 ?>')">Next</a>
  <?php endif ?>
</div>