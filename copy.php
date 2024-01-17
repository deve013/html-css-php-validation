


<?php
$connection = mysqli_connect('localhost', 'root', '', 'amazon');
 

    if (
        isset($_GET['name']) &&
        isset($_GET['username']) &&
        isset($_GET['password']) &&
        isset($_GET['address']) &&
        isset($_GET['email'])
    ) {
        // Validate
        $name = mysqli_real_escape_string($connection, $_GET['name']);
        $username = mysqli_real_escape_string($connection, $_GET['username']);
        $password = password_hash($_GET['password'], PASSWORD_BCRYPT); // Hash the password
        $address = mysqli_real_escape_string($connection, $_GET['address']);
        $email = mysqli_real_escape_string($connection, $_GET['email']);

        // Check if any field is empty
        if (empty($name) || empty($username) || empty($password) || empty($address) || empty($email)) {
            echo "Please fill in all form fields";
        } else {
            // SQL query with prepared statement
            $sql = "INSERT INTO register (name, username, password, address, email) 
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, 'sssss', $name, $username, $password, $address, $email);

            if (mysqli_stmt_execute($stmt)) {
                echo "Record inserted successfully";
                echo "<script>clearForm(); return false;</script>";  // Call the clearForm function
            }
              // Call the clearForm function
            else {
                echo "Error inserting record: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo "All form fields are required";
    }


// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="shortcut icon" href="/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <!-- ... (your header code) ... -->
    </header>

    <div class="register">
        <div class="register-container">
            <h1>Register</h1>
            <form id="form-register" class="form-register" method="GET" >
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>

                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                </div>

                <div>
                    <label for="email">E-Mail</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" >
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </div>

                <button type="submit" name="submit">Register</button>

                <br><span>Already a member? <a href="login.php">Log In</a> </span>
            </form>
        </div>
    </div>

    <script>
        function clearForm() {
            document.getElementById("form-register").reset();
        }
    </script>
</body>
</html>
