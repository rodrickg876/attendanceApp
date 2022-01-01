<?php
    $title = 'Success'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    // require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //get POST  values
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        if ($_FILES['avatar']['size'] == 0 ){
            $destination = "uploads/blank.png";
        
        }
        else{
            $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);
        }




        

        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email,$contact,$specialty, $destination);
      $specialtyName = $crud->getSpecialtyById($specialty);
        
        if($isSuccess){
           
        //   SendEmail::SendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registerted for this year\'s IT Conference');
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

    }
?>
    
<div class=" col-md-6 ">
    <img src="<?php echo $destination; ?>" class="img img-thumbnail" style="width: 40%; height: 40%" />
    <br>
    <br>
    <div class="card " style="width: 18rem;">
    
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name'];  ?>    
            </h6>

            <p class="card-text">
                Date Of Birth: <?php echo $_POST['dob'];  ?>
            </p>
            <p class="card-text">
                Email: <?php echo $_POST['email'];  ?>
            </p>
            <p class="card-text">
                Contact: <?php echo $_POST['phone'];  ?>
            </p>
    
        </div>
    </div>
    
</div>
<br><br><br><br>
<?php require_once 'includes/footer.php'; ?>