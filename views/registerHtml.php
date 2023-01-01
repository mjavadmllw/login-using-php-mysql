<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <main>
        <div class="row">
            <div class="colm-form">
                <?php if (!isset($_SESSION['id'])): ?>
                    <div class="form-container">
                        <form method="post" action="#">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="username" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <input type="submit" name="submit" class="btn-login" value="Register">
                        </form>
                        <?php if (isset($error)): ?>
                            <p style="color: red;"> <?php echo $error ?></p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <h3>You registered successfully</h3>
                    <a href="/login.php" class="btn-new">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>