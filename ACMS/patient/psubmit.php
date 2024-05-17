<?php
    require "../config.php";
    include "../header.php";
    session_start();

    $connection = new PDO($dsn, $username, $password, $options);

    // Check if session variables exist
    $session_uname = isset($_SESSION["uname"]) ? $_SESSION["uname"] : null;
    $session_type_id = isset($_SESSION['type_id']) ? $_SESSION['type_id'] : null;

    if ($session_uname && $session_type_id) {
        echo $cname = $session_uname;
    }

    // Check if POST variables exist
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $age = isset($_POST['age']) ? $_POST['age'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $phone = isset($_POST['phn']) ? $_POST['phn'] : null;
    $address = isset($_POST['address']) ? $_POST['address'] : null;
    $uname = isset($_POST['uname']) ? $_POST['uname'] : null;
    $pass = isset($_POST['pswd']) ? $_POST['pswd'] : null;
    $cpass = isset($_POST['cpswd']) ? $_POST['cpswd'] : null;

    $flag = 0;

    // Name validation
    if (preg_match("/^[a-zA-Z -]+$/", $name) === 0) {
        echo "<br>Name is not valid";
        $flag++;
    }

    // Email Validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "$email is a valid email address";
    } else {
        echo "<br>$email is not a valid email address";
        $flag++;
    }

    // Gender Validation
    if (empty($gender)) {
        echo "Select your gender";
        $flag++;
    }

    // Age Validation
    if (empty($age)) {
        echo "Enter age";
        $flag++;
    }

    // Address Validation
    if (empty($address)) {
        echo "Enter a valid address";
        $flag++;
    }

    // Phone Validation
    if (preg_match("/^[0-9]{10}$/", $phone) === 0) {
        echo "Phone number is not valid";
        $flag++;
    }

    // Username Validation (allow letters, numbers, underscores, and dashes)
    if (preg_match("/^[a-zA-Z0-9_-]+$/", $uname) === 0) {
        echo "<br>Username is not valid";
        $flag++;
    }

    // Password Validation
    if (strlen($pass) <= 6) {
        echo "Your Password Must Contain At Least 6 Characters!";
        $flag++;
    } elseif (!preg_match("#[0-9]+#", $pass)) {
        echo "Your Password Must Contain At Least 1 Number!";
        $flag++;
    } elseif (!preg_match("#[A-Z]+#", $pass)) {
        echo "Your Password Must Contain At Least 1 Capital Letter!";
        $flag++;
    } elseif (!preg_match("#[a-z]+#", $pass)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter!";
        $flag++;
    }

    // Confirm Password Validation
    if ($pass !== $cpass) {
        echo "Password Mismatch!";
        $flag++;
    }

    // Insertion
    try {
        if ($flag < 1) {
            $sel = "SELECT * FROM patient_reg WHERE email = :email";
            $statement = $connection->prepare($sel);
            $statement->execute(['email' => $email]);
            $result = $statement->fetchAll();

            if ($result && $statement->rowCount() > 0) {
                echo "Email already exists";
                echo "<a href='login.php'>Try again</a>";
            } else {
                $sel = "SELECT * FROM patient_reg WHERE phn = :phone";
                $statement = $connection->prepare($sel);
                $statement->execute(['phone' => $phone]);
                $result = $statement->fetchAll();

                if ($result && $statement->rowCount() > 0) {
                    echo "Phone already exists";
                    echo "<a href='login.php'>Try again</a>";
                } else {
                    $sel = "INSERT INTO patient_reg (name, email, age, gender, phn, address, uname, pswd) 
                            VALUES (:name, :email, :age, :gender, :phone, :address, :uname, :pass)";
                    $statement = $connection->prepare($sel);
                    $statement->execute([
                        'name' => $name,
                        'email' => $email,
                        'age' => $age,
                        'gender' => $gender,
                        'phone' => $phone,
                        'address' => $address,
                        'uname' => $uname,
                        'pass' => $pass
                    ]);

                    echo "Registered Successfully...";
                    header("Location: login.php");
                }
            }
        }
    } catch (PDOException $e) {
        echo $sel . "<br>" . $e->getMessage();
    }
?>
