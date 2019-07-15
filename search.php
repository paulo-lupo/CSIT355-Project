<!DOCTYPE >
<?php include("functions/functions.php"); ?>
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

        <input type='text' name='search'>
        </input>
        <button>Search</button>
      </div>
    </header>
    

    
    <!-- Banner with picture and text -->

    <form style='padding-top: 50px' action="search.php" method="get" enctype="multipart/form-data">
      <table align='center' width='600'>
        <tr>
            <td><input size='10' type='text' name='user_query' placeholder='Search a product'/></td>
             <td>
                <input value='search' name='search' style='text-align: center' type='submit'/>
             </td>
        </tr>
      </table>
    </form>
    <section class="flex-sect">
      <div data-tabs="1" id="ihnutl">
        <div id="tab1" data-tab-content="1" class="tab-content">
          <div class="row" id="ie1l4q">
            <div class="cell" id="itbv3j">
              <form class="form">
                <label ><h2>Filters</h2></label>

                <?php 
                getTags();
                ?>
              </form>
              <form class="form">
                  <label><strong>Dimension</strong></label>
                  <div class="form-group">
                    <input type="checkbox" class="checkbox"/>
                    <label class="label">11"x17"</label>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" class="checkbox"/>
                    <label class="label">13"x19"</label>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" class="checkbox"/>
                    <label class="label">17"x22"</label>
                  </div>
                </form>
            </div>
           
            <div class="cell" id="ievkbj">

                <div id="product_box">
                  <?php 
                  
                  getSearch(); 
                  
                  ?>
                </div>

            </div>
          </div>
        </div>
        
      </div>
    </section>


  
  </body>
  </html>