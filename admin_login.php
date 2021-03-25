<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Admin Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <a class="navbar-brand text-white" href="index.html">CARecommend</a>
    </nav>

    <div class="container pt-3">
        <div class="jumbotron">
            <form action="admin_login_process.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="username">
                </div>
                <input value="Login" type="submit" class="btn btn-secondary">
            </form>
        </div>
    </div>
</body>
</html>