<!DOCTYPE >
<?php include("admin/include/db.php");
      include("functions/functions.php"); ?>




<html>
<head>
    <title>Home - Carlos Martin</title>
    <link rel = "stylesheet"
        type = "text/css"
        href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet"> 
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
    





    <section class="flex-sect">
        <?php 
            if(isset($_GET['prod_id'])){

                $product_id = $_GET['prod_id'];

                $get_prod = "select * from Product where product_id=$product_id";
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
                    
                    $get_size = "select * from Sizes where size_id=$prod_size";
                    $run_size = mysqli_query($connection, $get_size);
                    $size_array = mysqli_fetch_array($run_size);
                    $size = $size_array['size'];

                    $get_tag = "select * from Tags where tag_id=$prod_tag";
                    $run_tag = mysqli_query($connection, $get_tag);
                    $tag_array = mysqli_fetch_array($run_tag);
                    $tag = $tag_array['tag_name'];

                    echo "<div id='details_prod'>
                            <h2>$prod_name</h2>
                            <img src='./pictures/$prod_image' width='1000' height='700'>               

                            <span><h4 >$prod_description</h4></span>
                            <span><h4>Price: $$prod_price</h4></span>
                            <span><h4>Size: $size</h4> <h4>Tag: $tag</h4></span>
                            <form action='details.php?prod_id=$product_id' method='POST' enctype='multipart/form-data' >
                                <select required name='product_quantity'>
                                    <option value='0' selected disabled>-- Select a quantity--</option>"; 

                                                
                                    for($i=1; $i <=$prod_quantity; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    
                                    echo "</select>
                                    <br>
                                    <a href='home.php'><button type='button'>Go Back</button></a> 
                                    <input type='submit' name='add_cart' value='Add to Cart'/>
                                </form>

                            <span>
                        </div>";
                }
            }
        ?>
    </section>

</body>
</html>


<?php
    if(isset($_POST['add_cart'])) {
        $product_id = $_GET['prod_id'];
        $ip_add = getIP();
        $product_quantity=$_POST['product_quantity'];

        $insert_product = "INSERT INTO Cart (prod_id, ip_add, quantity)
          values ('$product_id','$ip_add','$product_quantity')";

        $insert_query = mysqli_query($connection, $insert_product);

        if($insert_query){
            echo "<script>alert('The product was added to your cart. \\nVisit your cart when you are ready to checkout')</script>";
        }
        else{
            echo "<script>alert('failed')</script>"; 
        };

    };
?>