<?php


require 'Functions.php';
require 'Connection.php';

$error = [];
$successmsg = '';

if (isset($_POST['submit'])) {
    $name = updateForm($_POST, 'name') ? $_POST['name'] : '';
    $username = updateForm($_POST, 'username') ? $_POST['username'] : '';
    $email = updateForm($_POST, 'email') ? $_POST['email'] : '';
    $password = updateForm($_POST, 'password') ? $_POST['password'] : '';
    $address = updateForm($_POST, 'address') ? $_POST['address'] : '';

    if (empty($name)) {
        $error['name'] = "Name must not be empty.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error['name'] = "Name must only contain letters and spaces.";
    }

    if (empty($username)) {
        $error['username'] = "Username must not be empty.";
    }elseif (!preg_match("/^[0-9a-zA-Z]+$/", $username)) {
        $error['username'] = "Username must only contain numbers and letters.";
    }


    if (empty($email)) {
        $error['email'] = "Email must not be empty.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Enter a valid email address.";
    } else {
            
        // Check if the email is already registered
        $checkEmailQuery = "SELECT * FROM register WHERE email = ?";
        $checkStmt = $connection->prepare($checkEmailQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $error['email'] = "Email is already registered.";
        }
        
    }


    // if (empty($email)) {
    //     $error['email'] = "Email must not be empty.";
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $error['email'] = "Enter a valid email address.";
    // }
    
    if (empty($password)) {
        $error['password'] = "Password must not be empty.";
    } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Z])[0-9A-Za-z!@#$%&]{8,30}$/', $password)) {    
        $error['password'] = "Must contain at least one number and one uppercase or lowercase letter, and be between 8 and 30 characters.";
    } else {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    


    if (empty($address)) {
        $error['address'] = "Address must not be empty.";
    }elseif (!preg_match("/^[0-9a-zA-Z ]+$/", $address)) {
        $error['address'] = "Address must only contain letters and spaces.";
    }

    if (count($error) == 0) {
        try {
            // Use prepared statement to prevent SQL injection
            $query = "INSERT INTO register (name, username, email, password, address) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sssss", $name, $username, $email, $hashedPassword, $address);

            // Execute the query
            if ($stmt->execute()) {
                $successmsg = 'You have successfully registered.';
                $name = $username = $email = $password = $address = "";

                header('Location: login.php');  
                exit();

            } else {
                $error['register'] = "Error executing the query: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } catch (Exception $e) {
            $error['register'] = $e->getMessage();
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="register-body">

    <header>
        <!--  header code -->
        <div class="navbar">
             <div class="nav-logo border">
                <a href="index.php">
                    <div class="logo">
                    
                    </div>
                </a>
             </div>

            <div class="nav-address border" >
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-location-dot"></i>  
                    <p class="add-sec">Nepal</p>
                </div>
            </div>
            
            <div class="nav-search">
                <select class="search-select border">
                    <option>
                        All
                    </option>
                </select>
                <input placeholder="Search" class="search-input">
                <div class="search-icon border">
                    <i class="fa-solid fa-magnifying-glass border"></i>
                </div>
            </div>

            <div class="nav-icon">
                <div class="icon-first border">
                    <i class="fa-solid fa-language"></i>
                    <p>EN</p>
                </div>
            </div>

            <div class="nav-signin border">
                <a href="login.php"><p><span>Hwllo, sign in</span></p></a>
                <a href="login.php"><p class="nav-second">Accounts & Link</p></a>
    
            </div>

            <div class="nav-return border">
                <p><span>Return</span></p>
                <p class="nav-second">& Orders</p>
    
            </div>

            <div class="nav-cart border">
                <i class="fa-solid fa-cart-shopping"></i>
                <p class="cart-text">Cart</p>
            </div>

        </div>

        <div class="panel ">
            <div class="panel-all border ">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-ops">
                <div class="panel-ops1">
                    <p class="border">Today's Deals</p>
                    <p class="border"> Customer Service</p>
                    <p class="border">Registry</p>
                    <p class="border">Gift Card</p>
                    <p class="border">Sell</p>
                </div>
            </div>
            <div class="panel-deals border">
                <p>Shops Deals in Electronic</p>
            </div>

        </div>

    </header>

    <div class="register">
        <div class="register-container">
            <h1>Register</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form2">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>"><br>
                        <p class="error-message" style="font-size: 16px; color:red; ">
                        <?php echo displayError($error, 'name'); ?><br>
                        </p>
                    </div>
                    
                    
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>"><br>
                        <p class="error-message" style="font-size: 16px; color:red; ">
                            <?php echo displayError($error, 'username'); ?><br>
                        </p>
                    </div>
                    

                    <div>
                        <label for="email">E-Mail</label>
                        <input type="TEXT" name="email" value="<?php echo $email; ?>"><br>
                        <p class="error-message" style="font-size: 16px; color:red; ">
                        <?php echo displayError($error, 'email'); ?><br></p>
                    </div>
                    


                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password"><br>
                        <p class="error-message" style="font-size: 16px; color:red; ">
                        <?php echo displayError($error, 'password'); ?><br></p>
                    </div>
                    

                    <div>
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>"><br>
                        <p class="error-message" style="font-size: 16px; color:red; ">
                        <?php echo displayError($error, 'address'); ?><br></p>
                    </div>
                    


                    <button type="submit" name="submit">Register</button>

                    <!-- Error message -->
                    <p class="error-message" style="font-size: 16px; color:red; ">
                    <br><?php echo displayError($error, 'register'); ?></p>

                    <!-- Registered Message -->

                    <?php if (isset($successmsg)) { ?>
                        <h3 class="success" style="margin-top: 5px"><?php echo $successmsg; ?></h3>
                    <?php } ?>

                    <br><span>Already a member? <a href="login.php">Log In</a> </span>
                </form>
        </div>
    </div>

    


   
</body>
</html>