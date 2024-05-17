<?php 
  include "../header.php";
      require "../config.php";
      session_start();
      if(isset($_SESSION["user_name"]) && isset($_SESSION["p_id"])) {
          $_SESSION["user_name"]; 
          $_SESSION["p_id"]; 

          $connection = new PDO($dsn, $username, $password, $options);
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
                if($img == "Male") { ?>
                    <img src="../img/download.jpg" width="100px" height="100px" class="prfl">
                <?php } else { ?>
                    <img src="../img/drf.png" class="prfl">
                <?php } ?>

                <?php 
                    if(isset($_SESSION["uname"])) {
                        echo "<center><h4>" . $_SESSION["uname"] . "</h4></center>"; 
                    } else {
                        echo "<center><h4>Unknown User</h4></center>";
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
                    <a href="doctors_list.php" class="dcjq-parent">
                        <span>Doctors Availability</span>
                    </a>
                </li>
                
                <li>
                    <a href="login.php">
                        <span>Logout Page</span>
                    </a>
                </li>
                <!--<li class="sub-menu dcjq-parent-li">
                    <a href="parent_list.php" class="dcjq-parent">
                        <span>Parent Management</span>
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        <span>Attendance Management</span>
                    </a>
                </li>-->
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>    
<!DOCTYPE html>
<html>
<head>
    <title>Doctor List</title>
</head>
<body>
<section id="main-content">
    <div class="login-wrap">
        <div class="login-html">
            <div class="login-form">
                <script>
                function validate() {
                    var date = document.search.date.value;
                    var department = document.search.department.value;

                    if(date == "") {
                        alert("Date can't be blank");
                        document.search.date.focus();
                        return false;
                    }
                    if(department == "") {
                        alert("Department can't be blank");
                        document.search.department.focus();
                        return false;
                    }
                }
                </script>

                <form name="search" method="POST" onsubmit="return validate()" action="reqappointment.php">
                    <center>
                        <label for="Date" class="label"><b>Date</b></label>
                        <input type="date" placeholder="Date" name="date" class="fld" required><br><br>
                        <select name="department" class="fld" required>
                            <option value="">Select</option>
                            <option value="GM">General Medicine</option>
                            <option value="Pediatricians">Pediatricians</option>
                            <option value="Gynecologists">Gynecologists</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dermatologists">Dermatologists</option>
                            <option value="Family Physicians">Family Physicians</option>
                            <option value="Neurologists">Neurologists</option>
                            <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                        </select>
                        <button type="submit" class="btn">Search</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php 
} else {
    echo "Please log in to access this page.";
}
?>
