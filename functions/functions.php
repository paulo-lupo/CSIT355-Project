<?php
    
$connection = mysqli_connect("cyan", "dossapau", "Abestado.123", "dossapau_carlos_project" );

function cart() {
  if(isset($_GET['cart'])) {
    $prod_id= $_GET['cart'];
    
  }

}

function getIP(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function getTags() {

    global $connection;
    $get_tags = "select * from Tags";
    $run_tags = mysqli_query($connection, $get_tags);
    
    while($row_tag = mysqli_fetch_array($run_tags)) {
        $tag_id = $row_tag['tag_id'];
        $tag_name = $row_tag['tag_name'];
      echo "<div class='tags'>
        <li><a id='tg' href='home.php?tag=$tag_id'>$tag_name</a></li>
      </div>";
    }

}


function getProducts() {
  
  global $connection;
  if(!isset($_GET['tag'])){
    if(!isset($_GET['size'])){

      

      $get_prod = "select * from Product order by RAND() LIMIT 0,6";
      $run_prod = mysqli_query($connection, $get_prod);
      
      while($row_prod = mysqli_fetch_array($run_prod)) {
          $prod_id = $row_prod['product_id'];
          $prod_name = $row_prod['product_name'];
          $prod_description = $row_prod['product_description'];
          $prod_quantity = $row_prod['product_quantity'];
          $prod_price = $row_prod['product_price'];
          $prod_size = $row_prod['product_size'];
          $prod_tag = $row_prod['product_tag'];
          $prod_image = $row_prod['product_image'];

        echo "<div id='single_prod'>
        <h2>$prod_name</h2>
        <img src='./pictures/$prod_image' width='360' height='240'>
        <p></p>
        <a href='details.php?prod_id=$prod_id' ><button type='button'>Details</button></a>

        </div>
        ";
      }

    }
  }
  else if(isset($_GET['tag'])) {
    $tag = $_GET['tag'];

    $get_prod = "select * from Product where product_tag=$tag";
    $run_prod = mysqli_query($connection, $get_prod);

    while($row_prod = mysqli_fetch_array($run_prod)) {
      $prod_id = $row_prod['product_id'];
      $prod_name = $row_prod['product_name'];
      $prod_description = $row_prod['product_description'];
      $prod_quantity = $row_prod['product_quantity'];
      $prod_price = $row_prod['product_price'];
      $prod_size = $row_prod['product_size'];
      $prod_tag = $row_prod['product_tag'];
      $prod_image = $row_prod['product_image'];

      echo "<div id='single_prod'>
      <h2>$prod_name</h2>
      <img src='./pictures/$prod_image' width='360' height='240'>
      <p></p>
      <a href='details.php?prod_id=$prod_id' ><button type='button'>Details</button></a>

      </div>
      ";
      
    }

  }
}

function getSearch() {
      global $connection;
  if(isset($_GET['search'])){
    $search_query = $_GET['user_query'];

    $get_prod = "select * from Product where product_keywords like '%$search_query%'";
   
    $run_prod = mysqli_query($connection, $get_prod);
    

  	$row_prod = mysqli_fetch_array($run_prod);
	  if(is_null($row_prod)) {
	  	echo "<h2>There are no products that matches your search<h2>";
	  }
    while(!$row_prod==null) {
        $prod_id = $row_prod['product_id'];
        $prod_name = $row_prod['product_name'];
        $prod_description = $row_prod['product_description'];
        $prod_quantity = $row_prod['product_quantity'];
        $prod_price = $row_prod['product_price'];
        $prod_size = $row_prod['product_size'];
        $prod_tag = $row_prod['product_tag'];
        $prod_image = $row_prod['product_image'];

      echo "<div id='single_prod'>
      <h2>$prod_name</h2>
      <img src='./pictures/$prod_image' width='360' height='240'>
      <p></p>
      <a href='details.php?prod_id=$prod_id' ><button type='button'>Details</button></a>

      </div>
      ";
        $row_prod = mysqli_fetch_array($run_prod);
    };
    
    echo "<a href='home.php'><button type='button'>Go Back</button></a>";
    
  
  }
}




?>


