<?php require("connect-db.php"); ?>
<?php require("request-db.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['submitBtn']))
  {
    if (createUser($_POST['firstname'], $_POST['lastname'], $_POST['computingid'], $_POST['email'], $_POST['year'], $_POST['dob'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipcode'], $_POST['password']))
    {
        header("Location: index.php?page=home");
        exit();
    }
    else {

    }
  }
}
?>


<!DOCTYPE html>
<html>

  <?php require("base.php"); ?>

  <body>  
    <div class="form-container">
      <div class="large-form-box">
        <h1>Create an account</h1>
        <form method="post" action="">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="computingid" class="form-label">Computing ID</label>
            <input type="text" name="computingid" id="computingid" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" name="year" id="year" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" name="dob" id="dob" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="street" class="form-label">Street</label>
            <input type="text" name="street" id="street" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" id="state" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="zipcode" class="form-label">Zip Code</label>
            <input type="text" name="zipcode" id="zipcode" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <button type="submit" name="submitBtn" value="Submit" class="btn btn-primary w-100">Create Account</button>
        </form>
      </div>
    </div>
    <br>
    <br>

    <?php // include('footer.html') ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>

  

</html>