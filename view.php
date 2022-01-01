<?php  
$title ='View Record';
require_once 'includes/header.php';
require_once 'db/conn.php';


if(isset($_GET['id'])){
    $id= $_GET['id'];
    $result= $crud->getAttendeeDetails($id);

}else{

    echo "<h1 class='text-danger'> Try again</h1>";
}
?>

<?php   require_once 'includes/footer.php'; ?><?php
    $title = 'View Record'; 

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';        
    } else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>

<div class=" col-md-6 ">
    <img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ; ?>" class="img img-thumbnail" style="width: 40%; height: 40%" />
    <br>
    <br>
    <div class="card " style="width: 18rem;">    
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name'];  ?>    
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $result['dateofbirth'];  ?>
            </p>
            <p class="card-text">
                Email: <?php echo $result['emailaddress'];  ?>
            </p>
            <p class="card-text">
                Contact: <?php echo $result['contactnumber'];  ?>
            </p>    
        </div>
        <div class="text-center">
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Update</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
             <?php } ?>
        </div>
        <br>        
    </div>    
</div>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>