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
    <h1>New Book</h1>
    <ul class="menu">
        <li><a href="./book-list.php">Manage Books</a></li>
        <li><a href="./cat-list.php">Manage Categories</a></li>
        <li><a href="./orders.php">Manage Orders</a></li>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
    <form action="./book-add.php" method="POST" enctype="multipart/form-data">
    <label for="title">BOOK Title</label>
    <input type="text" name="title" id="title">

    <label for="author">Author</label>
    <input type="text" name="author" id="author">

    <label for="summary">Summary</label>
    <textarea name="summary" id="summary" ></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" id="price">

    <label for="categories">Category</label>
    <select name="category_id" id="categories">
    <?php
    
    include("./confs/confs.php");
    $result = mysqli_query($conn,"SELECT id,name FROM categories");
    while($row=mysqli_fetch_assoc($result)):
    
    ?>
    <option value="<?php echo $row['id']?>">
<?php echo $row['name']?></option>
        <?php endwhile;?>


    </select>

    <label for="cover">Cover</label>
    <input type="file" name="cover" id="cover"><br><br>
    <input type="submit" value="Add book"><br>
    <a href="./book-list.php" class="back">Back</a>

    </form>
</body>
</html>