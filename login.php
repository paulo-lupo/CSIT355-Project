
<?php
	// Setup variables
	$Username = @$_POST["username"];
	$Password = @$_POST["password"];
    $str = "Hello world!";
    echo $Password;
?>

<div class="form-group">
                  <input type="checkbox" class="checkbox"/>
                  <label class="label">Architecture</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" class="checkbox"/>
                  <label class="label">Interiors</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" class="checkbox"/>
                  <label class="label">Landscapes</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" class="checkbox"/>
                  <label class="label">CityScapes</label>
                </div>


                button {
  background-color: Transparent;
  background-repeat:no-repeat;
  border: none;
  cursor:pointer;
  overflow: hidden;
  outline:none;
}