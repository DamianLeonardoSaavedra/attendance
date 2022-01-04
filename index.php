<?php
$title = 'Index';

require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

?>

<h1 class="text-center">Registration for IT Conferece</h1>

<form method="post" action="succes.php">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>
    <div class="form-group">
        <label for="specialty">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input required type="email" class="form-control" id="email" name="email">
        <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone">
        <small id="phone" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<br />
<br />
<?php require_once 'includes/footer.php'; ?>