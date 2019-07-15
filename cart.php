<!DOCTYPE >
<?php include("functions/functions.php"); 
       include("admin/include/db.php");
?>

<html>
  <head>
    <title>Home - Carlos Martin</title>
      <link rel = "stylesheet"
        type = "text/css"
        href = "style.css"/>
      <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet"> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <body >
    <!-- Creates the header -->
    <header class="navbar">
      <!--Creates the logo and links it to the home page-->
      <div class="container-width" >
        <div  class="logo-container">
          <a href="home.php">
            <div id="logo-button" class="logo">Carlos Martin
            </div>
          </a>
        </div>

        <a href="#">
          <div id="contactMe" class="menu-item">Cart
          </div>
        </a>

        <a href="#">
          <div id="" class="menu-item">Help
          </div>
        </a>

      </div>
    </header>
    

    
    <!-- Banner with picture and text -->


    <section class="flex-sect">
        <form  style='text-align: center' method='POST' enctype='multipart/form-data'>
            <table  style='text-align: center' align='center' width='600' border='2px'>
                <tr>
                    <td>Remove</td>
                    <td>Item</td>
                    <td>Quantity</td>
                    <td>Price per unit</td>
                    <td>Total Price</td>
                </tr>
                <?php 
                    $ip = getIP();

                    $get_cart_items = "select * from Cart where ip_add='$ip'";
                    $run_cart_items = mysqli_query($connection, $get_cart_items);
                    $sub_total = 0;          
                    while($row_cart_items = mysqli_fetch_array($run_cart_items)) {
                        $item_id = $row_cart_items['prod_id'];
       
                        $item_quantity = $row_cart_items['quantity'];

                        $get_prod = "select * from Product where product_id=$item_id";
                        $prod = mysqli_fetch_array(mysqli_query($connection, $get_prod));
                        $prod_name = $prod['product_name'];
                        $prod_price = $prod['product_price'];
                        $prod_quantity = $prod['product_quantity'];
                        $prod_image = $prod['product_image'];
                        $item_total = $item_quantity * $prod_price;
                        $item_total = number_format((float)$item_total, 2, '.', '');
                        $sub_total += $item_total;
                        
                    echo "<tr> <td><input type='checkbox' name='d$item_id' value='$item_id'/> </td>
                            <td>
                            <img src='./pictures/$prod_image' width='120' height='80'> </td>
                            <td>
                            <h6>$prod_quantity left </h6>

                            <input type='number' required name='p$item_id' value='$item_quantity' min='0' max='$prod_quantity'>

                          
                            </td>
                            <td>$$prod_price</td>
                            <td>$$item_total</td>
                            </tr>";
                    }
                    echo "<tr>
                            <td colspan='4' style='text-align:right'>Subtotal&nbsp</td>
                            <td>$$sub_total</td>
                            </tr>"
                ?>

            </table>
            <input type='submit' name='delete' value='Delete Selected'/>
            <input type='submit' name='update' value='Update Cart'/>
            <input type='submit' name='complete' value='Complete Purchase' />
        </form>
    </section>


  
  </body>
  </html>
  <?php 

    
    if(isset($_POST['update'])) {
      $ip = getIP();
      $get_cart_items = "select * from Cart where ip_add='$ip'";
      $run_cart_items = mysqli_query($connection, $get_cart_items);

      while($row_cart_items = mysqli_fetch_array($run_cart_items)) {
        $get_id = $row_cart_items['prod_id'];
        $temp = 'p'.$get_id;
        $new_quantity = $_POST["$temp"];
        $update_query = "update `Cart` SET `quantity` = '$new_quantity' WHERE `ip_add`='$ip' AND `prod_id`=$get_id";
        $run_query = mysqli_query($connection, $update_query);
      }
      echo "<meta http-equiv='refresh' content='0'>";
    }
    else if(isset($_POST['delete'])) {
      $ip = getIP();
      $get_cart_items = "select * from Cart where ip_add='$ip'";
      $run_cart_items = mysqli_query($connection, $get_cart_items);

      while($row_cart_items = mysqli_fetch_array($run_cart_items)) {
        $get_id = $row_cart_items['prod_id'];
        $temp = 'd'.$get_id;
        $id = $_POST["$temp"];
        $delete_query = "delete from Cart where `ip_add`='$ip' AND `prod_id`=$id";
        $run_query = mysqli_query($connection, $delete_query);
      }
      echo "<meta http-equiv='refresh' content='0'>";
    }
    else if(isset($_POST['complete'])) {
      $ip = getIP();
      $get_cart_items = "select * from Cart where ip_add='$ip'";
      $run_cart_items = mysqli_query($connection, $get_cart_items);
      
      while($row_cart_items = mysqli_fetch_array($run_cart_items)) {
        $get_id = $row_cart_items['prod_id'];
        $get_quantity = $row_cart_items['quantity'];

        $get_prod = "select * from Product where product_id=$get_id";
        $prod = mysqli_fetch_array(mysqli_query($connection, $get_prod));

        $new_quantity = $prod['product_quantity'] - $get_quantity;
        
        $update_query = "update Product SET product_quantity = $new_quantity  where product_id=$get_id";
        $delete_query = "delete from Cart where `ip_add`='$ip' AND `prod_id`=$get_id";
        $run_delete = mysqli_query($connection, $delete_query);
        $run_query = mysqli_query($connection, $update_query);
      }
     

      echo "<meta http-equiv='refresh' content='0'>";
       echo "<h1> Thank you for your purchase! Check your email for an order confirmation </h1>";
      header("Location: home.php"); 
      exit();
    }
    
?> 