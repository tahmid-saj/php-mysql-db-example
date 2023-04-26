<?php include "db.php";
include "functions.php";

if (isset($_POST['submit'])) {
    deleteRows();
}
?>

<?php include "includes/header.php"?>
<body>

    <div class="container">
        <div class="col-sm-6">
        <h1>Delete</h1>
        <form action="login_delete.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <select name="id" id="">

                        <?php
                            showAllData();
                        ?>

                    </select>
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="DELETE">
        </form>
        </div>
    </div>
    
</body>
<?php include "includes/header.php"?>