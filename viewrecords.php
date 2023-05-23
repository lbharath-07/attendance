<?php 
    $title='viewrecords';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results=$crud->getattendees()
?>

<table class="table">
    <tr>
        <td>#</td>
        <td>firstname</td>
        <td>lastname</td>
        <td>specailty</td>
        <td>Actions</td>
    
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?> 
        <tr>
        <td><?php echo $r['attendee_id'] ?></td>
        <td><?php echo $r['firstname'] ?></td>
        <td><?php echo $r['lastname'] ?></td>
        <td><?php echo $r['name']?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
            <a onclick="return  confirm('Areyou sure you want to delete this record');" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php } ?> 
    
</table>

<br>
<br>
<br>


<?php 
    require_once 'includes/footer.php';
?>