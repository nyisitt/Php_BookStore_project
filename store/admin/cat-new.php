<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php   include('./confs/auth.php');?>
    <h1>New Category</h1>
    <ul class="menu">
        <li><a href="./book-list.php">Manage Books</a></li>
        <li><a href="./cat-list.php">Manage Categories</a></li>
        <li><a href="./orders.php">Manage Orders</a></li>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
    <form action="./cat-add.php" method="POST">
        <label for="name">Category</label>
        <input type="text" name="name" id="name " required>
        <br><br>
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"></textarea>
        <input type="submit" value="Add Category" required>

    </form>
</body>
</html>