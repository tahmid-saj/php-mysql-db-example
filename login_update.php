<?php include "db.php";
include "functions.php";

if (isset($_POST['submit'])) {
    updateTable();
}
?>

<?php include "includes/header.php"?>
<body>

    <div class="container">
        <div class="col-sm-6">
            <h1>Update</h1>
        <form action="login_update.php" method="post">
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

                <input class="btn btn-primary" type="submit" name="submit" value="UPDATE">
        </form>
        </div>
    </div>
    
</body>
<?php include "includes/header.php"?>