<?php
require 'Functions.php';
require 'Connection.php';

$error = [];

if (isset($_POST['submit'])) {
    $email = (updateForm($_POST, 'email')) ? trim($_POST['email']) : '';
    $password = (updateForm($_POST, 'password')) ? trim($_POST['password']) : '';

    if (empty($email)) {
        $error['email'] = "Email cannot be empty";
    }

    if (empty($password)) {
        $error['password'] = "Password cannot be empty";
    }

    if (count($error) == 0) {
        try {
            // Fetch hashed password from the database
            $stmt = $connection->prepare("SELECT id, email, password, name FROM register WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                // Verify the entered password with the hashed password from the database
                if (password_verify($password, $user['password'])) {
                    // Password is correct, start session and redirect
                    session_start();
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['id'] = $user['id'];
                    header('location: dashboard.php');
                    exit();
                } else {
                    // Incorrect password
                    $error['login'] = 'Wrong email or password';
                    $email = '';
                }
            } else {
                // User not found
                $error['login'] = 'Wrong email or password';
                $email = '';
            }
        } catch (Exception $e) {
            $error['database'] = $e->getMessage();
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">


</head>
<body>


<?php
// session_start();

// // Check if there is a success message
// if (isset($_SESSION['successmsg'])) {
//     echo '<h3 class="success" style="margin-top: 5px">' . $_SESSION['successmsg'] . '</h3>';
//     unset($_SESSION['successmsg']); // Clear the session variable
// }
?>



    <header>

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

    <!-- <div class="login"> -->
    <div class="container-login">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form1">
            <div class="username">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" style="height: 28px; width: 60%;" value="<?php echo htmlspecialchars($email); ?>"></br>
                
                
                <?php if (isset($error['email'])) { ?>
                    <p class="error-message" style="font-size: 16px; color:red;"><?php echo $error['email']; ?></p>
                <?php } ?>
            
            
            </div>  

            <div class="password">
                <label for =""password>Password</label>
                <input type="password" name="password" style="height: 28px; width: 60%;"></br>



                <?php if (isset($error['password'])) { ?>
                    <p class="error-message" style="font-size: 16px; color:red; "><?php echo $error['password']; ?></p>
                <?php } ?>

            

            </div>

            <button  name = "submit" class="btn1" type="submit">Login</button>


            <?php if (isset($error['login'])) { ?>
                <p class="error-message" style="font-size: 16px; color:red;"><?php echo $error['login']; ?></p>
            <?php } ?>

            <p>Not Registered? <a href="register.php">Click here to register</a></p>
            
            </div>
        </form>
    <!-- </div> -->
</div>


    
</body>
</html>