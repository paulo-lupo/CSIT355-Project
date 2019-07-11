<!DOCTYPE html>
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
          <a href="#">
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
    
    <div class='banner'>
      <div class="wrapper">
                <img class="first" src="./pictures/DG6TzGH_1eY.jpg">
                
                <form class='form-cart'>
                <h1 style='color:white'>Ammount: </h1>
                  <select>
                    <?php
                    for ($i=1; $i<=10; $i++)
                    {
                    ?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                    }
                  ?>
                  </select>
                  <button class='second'>Add to Cart</button>
                </form>
              </div>
    </div>

  
              


  
  </body>
  </html>