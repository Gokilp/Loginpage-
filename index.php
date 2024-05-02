<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2> Welcome to Fakebook </h2>
    <label> Username </label>
    <input type="text" name="Username"> <br>
    <label> Password </label> <br>
    <input type="text" name="Password"> <br>
    <input type="submit" name="login" value="login">
</form>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "Username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "Please enter username";
    } else if (empty($password)) {
        echo "Please enter password";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users( user,password)  VALUES ('$username', '$hash')";

            mysqli_query($conn, $sql);
            echo "You are successfully registered";
        }
    mysqli_close($conn);
}

?>
