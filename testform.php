<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Upload questions</title>
</head>
<body>
  <?php 
    if(isset($_SESSION['warning']))
    {
      echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
      unset($_SESSION['warning']);
    }
  ?>
  <br>
  <div class="card">
    <form action="addques.php" method="post">
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="z" placeholder="Enter the Question"></textarea>
          </div>
          <div class=" form-group row">

            <div class="col">
            <input type="text" class="form-control" name="a" placeholder="Option A">
            </div> 
          <div class=" col">
            <input type="text" class="form-control" name="b" placeholder="Option B">
            </div>
          </div>
            <div class="form-group row">

            <div class="col">
            <input type="text" class="form-control" name="c" placeholder="Option C">
            </div> 
         
          <div class="col">
            <input type="text" class="form-control" name="d" placeholder="Option D">
            </div>
          </div>
          <center>
            <select class="browser-default custom-select" name="e">
              <option selected>Select Correct Answer</option>
              <option value="a">Option A</option>
              <option value="b">Option B</option>
              <option value="c">Option C</option>
              <option value="d">Option D</option>
            </select>
          <div class="form-group">
          <div class="col-4">
          <button type="text" class="btn btn-primary">Next</button>
          </div>
        </form>
        </div></center>
  </div>
	<form >
   
</form>

</body>
</html>
