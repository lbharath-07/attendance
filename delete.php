<?php 
    
    require_once 'db/conn.php';

    // get values from the post operation
    if(isset($_GET['id'])){
        // extract values from the $_post array
        $id=$_GET['id'];
    

        // call crud function 
        $results=$crud->DELETEattendee($id);

        //redirect to viewrecords.php
        if($results){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }

    }
    else{
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }

    ?>