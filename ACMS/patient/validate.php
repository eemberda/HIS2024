<?php
session_start();
include "../header.php";
require "../config.php";
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
                <img src="../img/f.png" class="prfl">
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
                <li class="sub-menu dcjq-parent-li">
                    <a href="appoinment.php" class="dcjq-parent">
                        <span>Appointment Form</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span>Logout Page</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
<?php
$usname = isset($_POST['usname']) ? $_POST['usname'] : '';
$pswd1 = isset($_POST['pswd1']) ? $_POST['pswd1'] : '';
$type_id = isset($_POST['type_id']) ? $_POST['type_id'] : '';

$flag = 0;
if ($flag < 1) {
    $sel = "SELECT * FROM patient_reg WHERE uname = :usname AND pswd = :pswd";
    $statement = $connection->prepare($sel);
    $statement->execute(['usname' => $usname, 'pswd' => $pswd1]);
    $result = $statement->fetchAll();

    if ($result && $statement->rowCount() > 0) {
        foreach ($result as $row) { ?>
            <center><br>
            <?php echo "<h2> Welcome " . htmlspecialchars($row["name"]) . "</h2>"; ?>
            <?php echo htmlspecialchars($row["email"]); ?>
            <?php echo htmlspecialchars($row["id"]); ?>
            <div class="row">
                <div class="col">
                    <a href="patient_dashboard.php">Home</a>
                </div>
                <div class="col">
                    <a href="logout.php">Log Out</a>
                </div>
            </div>
            </center>
        <?php }
        $_SESSION['user_name'] = $usname;
        $_SESSION['p_id'] = $row["id"];
        $_SESSION['type_id'] = $type_id; // Set type_id in session
    } else {
        header("Location: login.php");
        echo '<script language="javascript">';
        echo 'alert("Invalid Credentials")';  // Now showing an alert box.
        echo '</script>';
    }
}
?>
