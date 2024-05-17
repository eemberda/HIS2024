<?php
require "../config.php";
include "../header.php";
session_start();

if(isset($_SESSION["user_name"]) && isset($_SESSION['dr_id'])) {
    echo "<h2> Welcome ".$_SESSION['user_name']."</h2>"; 
    echo "<h4> Batch ".$_SESSION['dr_id']."</h4>"; 
}

echo $_SESSION['user_name'];

?>
<center>
    <a href="doctor_dashboard.php"><h5> Click here to go back to Home</h5></a>
</center>

<?php 
$connection = new PDO($dsn, $username, $password, $options);

try {
    if(isset($_POST['id'], $_POST['name'], $_POST['age'], $_POST['date'], $_POST['gender'], $_POST['district'], $_POST['appoi'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $district = $_POST['district'];
        $appoi = $_POST['appoi'];

        foreach($appoi as $key => $val) {
            $ntid = $key;
            $status = $val;

            $sel = "SELECT * FROM appointmentform WHERE id = :id AND date_apmnt = :date";
            $stmt = $connection->prepare($sel);
            $stmt->execute(['id' => $key, 'date' => $date]);
            $result = $stmt->fetchAll();

            $updateQuery = "UPDATE appointmentform SET status = :status WHERE id = :id";
            $updateStmt = $connection->prepare($updateQuery);
            $updateStmt->execute(['status' => $status, 'id' => $key]);
        }
    } else {
        echo "One or more required fields are missing.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
