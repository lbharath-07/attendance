  
    <?php 
    $title='home';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results=$crud->getspecialties()
    ?>
    <br>
    <h1 class = "text-center">Registration for Swaggers Conference</h1>
    
    <form method="post" action="success.php">
        <div class="mb-3">
          <label for="firstname" class="form-label">First Name</label>
          <input required type="text" class="form-control" id="firstname" name="firstname" >
        </div>
        <div class="mb-3">
          <label for="lastname" class="form-label">Last Name</label>
          <input required type="text" class="form-control" id="lastname" name="lastname" >
        </div>
        <div class="mb-3">
          <label for="dob" class="form-label">Date Of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob" >
        </div>
        <div class="mb-3">
          <label for="specialty" class="form-label">Area Of Expertise</label>
          <select class="form-control" id="specialty" name="specialty">
              <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
              <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?></option>
              <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Contact Number</label>
          <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
          <small id="phoneHelp" class="form-text">We'll never share your number with anyone else.</small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
      </form>

      <br>
      <br>
      <br>
      <br>
      <br>
    
      <?php 
      require_once 'includes/footer.php';
      ?>