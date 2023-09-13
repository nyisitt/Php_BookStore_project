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

    <?php
    include('./confs/auth.php');
    include('./confs/confs.php');
    $id = $_GET["id"];
    $result = mysqli_query($conn,"SELECT * FROM books WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    
    ?>
    <h1>Edit book</h1>
    <ul class="menu">
        <li><a href="./book-list.php">Manage Books</a></li>
        <li><a href="./cat-list.php">Manage Categories</a></li>
        <li><a href="./orders.php">Manage Orders</a></li>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
    <form action="book-update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row ["id"]?>"><br>

    <label for="title">BOOK Title</label><br>
    <input type="text" name ="title" id="title" value="<?php echo $row["title"]?>"><br><br>

    <label for="author">Author</label><br>
    <input type="text" name="author" id ="author" value="<?php echo $row['author']?>"><br><br>

    <label for="author">Summary</label><br>
    <textarea name="summary" id="author" cols="30" rows="10"> <?php echo $row["summary"]?></textarea><br><br>

    <label for="author">Price</label><br>
    <input type="text" name="price" id ="author" value="<?php echo $row['price']?>"><br><br>

    <label for="cat">Category</label><br>
    <select name="category_id" id="cat">
        <option value=""> ----Choose----</option>
        <?php 
        $categories = mysqli_query($conn,"SELECT id,name FROM categories");
        while($cat= mysqli_fetch_assoc($categories)):
                    ?>
      <option value="<?php echo $cat['id']?>"  <?php if($cat['id']==$row['category_id'])echo "selected" ?>>              
               
                <?php echo $cat['name']?>
                </option>
                <?php endwhile;?>
    </select>
    <br><br>

    <img src="covers/<?php echo $row['cover']?>" alt="" height="150">
    <label for="cover"> Change cover</label><br>
    <input type="file" name="cover" id="cover">
    <br><br>
    <input type="submit" value="Update Book" >
    <a href="./book-list.php">Back</a>
    </form>
</body>
</html>