

<?php
    $title = 'Home'; 

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    $results = $crud->getSpecialties();

?>
    
    <h1 class="text-center">IT Conference Registration </h1>

    <form method="post" action="success.php" enctype="multipart/form-data">

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input  type="text" class="form-control" id="firstname" name="firstname" required>
        </div><br>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input  type="text" class="form-control" id="lastname" name="lastname" required>
        </div><br>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control datepicker" id="dob" name="dob" required>
        </div><br>
        <div class="form-group">
            <label for="specialty">Specialty</label>
            <select class="form-control" id="specialty" name="specialty">

 <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?><option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div><br>
        <div class="form-group">
            <label for="email">Email</label>
            <input required type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div><br>
        <div class="form-groupform-group">
            <label for="phone">Contact</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">We'll never share your contact with anyone else.</small>
        </div>
        <br/>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
                <label class="custom-file-label" for="avatar">Choose a File</label>
            <small id="avatar" class="form-text text-danger">File Upload Optional</small>

        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?>