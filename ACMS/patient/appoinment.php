<?php 
include "../header.php";
require "../config.php";
session_start();

if(isset($_SESSION["user_name"]) && isset($_SESSION["p_id"])) {
    $_SESSION["user_name"]; 
    echo $_SESSION["p_id"]; 

    $connection = new PDO($dsn, $username, $password, $options);

    $id = 123; // Example: manually set the ID
    $date = '2024-05-18'; // Example: manually set the date

    // Proceed with your script
    echo $id;
    echo $date;
?>
<!--sidebar start-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
         <center>  
         <?php 
            $user = $_SESSION["user_name"];
            $img = $connection->query("select gender from patient_reg where uname='$user'")->fetchColumn();
            if($img == "Male"){ ?>
                <img src="../img/download.jpg" width="100px" height="100px" class="prfl">
            <?php } else { ?>
                <img src="../img/drf.png" class="prfl">
            <?php } ?>

            <?php 
                if(isset($_SESSION["uname"])) {
                    echo "<center><h4>" . $_SESSION["uname"] . "</h4></center>"; 
                }
            ?>
            </center>
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="patient_dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="doctors_list.php"  class="dcjq-parent">
                        <span>Doctors Availability</span></a>
                </li>
                
                <li>
                    <a href="login.php">
                        <span>Logout Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>    

<script>
function validate() {
    var name = document.registration.name.value;
    var age = document.registration.age.value;
    var dname = document.registration.name.value;

    if(name == "" || name == null) {
        alert("Name can't be blank");
        document.registration.name.focus();
        return false;
    } else if(age == "" || age == null) {
        alert("Age can't be blank");
        document.registration.age.focus();
        return false;
    } else if(dname == "" || dname == null) {
        alert("Doctor name can't be blank");
        document.registration.name.focus();
        return false;
    } else {
        alert("Successfully validated");
        return true;
    }
}
</script>

<section id="main-content">
    <div class="login-wrap">
        <div class="login-html">
            <div class="login-form">
                <div class="group">
                <?php if(isset($_SESSION["date"])) {
                    $_SESSION["date"]; ?>

                    <form name="registration" method="POST" action="apmntaction.php" onsubmit="return validate()">
                        <h1>Appointment Form</h1>
                        <label for="Name" class="label"><b>Name</b></label>
                        <?php 
                            $name = $connection->query("select name from patient_reg where uname='$user'")->fetchColumn();
                        ?>
                        <input type="text" placeholder="Patient name" value= "<?php echo $name; ?>" name="name" class="input">
                </div>

                <div class="group">
                    <label for="age" class="label"><b>Age</b></label>
                    <?php 
                        $age = $connection->query("select age from patient_reg where uname='$user'")->fetchColumn();
                    ?>
                    <input type="text" placeholder="Enter Age" value="<?php echo $age; ?>" name="age" class="input">
                </div>

                <div class="group">
                    <label for="gender" class="label"><b>Gender</b></label>
                    <?php 
                        $gender = $connection->query("select gender from patient_reg where uname='$user'")->fetchColumn();
                        if($gender == "female"){
                    ?>
                    <input type="radio" name="gender" value="Female" class="rad" checked /> Female
                    <input type="radio" name="gender" value="Male" class="rad" /> Male
                    <?php } else { ?>
                    <input type="radio" name="gender" value="Female" class="rad" /> Female
                    <input type="radio" name="gender" value="Male" class="rad" checked /> Male
                    <?php } ?>
                </div>

                <div class="group">
                    <label for="appointment" class="label"><b>Date of Appointment</b></label>
                    <input type="date" value="<?php echo $_SESSION['date']; ?>" name="apntdate" class="input">
                </div>
                <div class="group">
                    <label for="Doctorname" class="label"><b>Doctor's Name</b></label>
                    <?php 
                        $num = $connection->query("select name from doctors where dr_id='$id'")->fetchColumn();
                    ?>
                    <input type="text" value="<?php echo $num; ?>" name="doctname" class="input">
                </div>

                <div class="group">
                    <label for="Doctorid" class="label"><b>Doctor's ID</b></label>
                    <input type="text" name="id" value="<?php echo $id; ?>" class="input">
                </div>

                <div class="group">
                    <input type="submit" name="submit" value="Submit" class="button">
                </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>
<?php
} else {
    echo "Please log in to access this page.";
}
?>
