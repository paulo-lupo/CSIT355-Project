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
        <form  style='text-align: center' action='cart.php' method='GET' enctype='multipart/form-data'>
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
                        
                    echo "<tr><td><input type = 'checkbox' /></td>
                            <td>
                            <img src='./pictures/$prod_image' width='120' height='80'> </td>
                            <td>$item_quantity</td>
                            <td>$prod_price</td>
                            <td>$item_total</td>
                            </tr>";
                    }
                    echo "<tr>
                            <td colspan='4' style='text-align:right'>Subtotal&nbsp</td>
                            <td>$sub_total</td>
                            </tr>"
                ?>

            </table>
            <input type='submit' name='complete' value='Delete Selected'/>
            <input type='submit' name='complete' value='Update Cart'/>
            <input type='submit' name='complete' value='Complete Purchase'/>
        </form>
    </section>


  
  </body>
  </html>