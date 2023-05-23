<?php 
    $title='view';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
    }
    else{
        $id=$_GET['id'];
        $results=$crud->getattendeedetails($id);
    
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $results['firstname'] . ' ' . $results['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">
        <?php echo $results['name']; ?>
    </h6>
    <p class="card-text">
        Date Of Birth: <?php echo $results['dateofbirth']; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $results['emailaddress']; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php echo $results['contactnumber']; ?>
    </p>
  </div>
</div>
<br/>
<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="edit.php?id=<?php echo $results['attendee_id']?>" class="btn btn-warning">Edit</a>
<a onclick="return  confirm('Areyou sure you want to delete this record');" href="delete.php?id=<?php echo $results['attendee_id']?>" class="btn btn-danger">Delete</a>
  
    <?php } ?>
<br>
<br>
<br>


<?php 
    require_once 'includes/footer.php';
?>