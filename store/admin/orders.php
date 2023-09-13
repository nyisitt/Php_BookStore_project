<?php include('./confs/auth.php')?>
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
    <h1>Order List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">logout</a></li>
    </ul>
<?php 
include("./confs/confs.php");
$orders = mysqli_query($conn,"SELECT * FROM `order`");

?>
<ul class="orders">

<?php while ($order=mysqli_fetch_assoc($orders)):?>
<?php if($order['status']):?>
    <li class="delivered">
        <?php else:?>
    <li>
    <?php endif;?>

    <div class="order">
        <b><?php echo $order['name']?></b><br>
        <i><?php echo $order['email']?></i><br>
        <span><?php echo $order['phone']?></span><br>
        <p><?php echo $order['address']?></p><br>

        <?php if($order['status']):?>
           * <a href="./order-status.php?id=<?php echo $order['id']?>&status=0">Undo</a>
            <?php else:?>
               * <a href="./order-status.php?id=<?php echo $order['id']?>&status=1">Mark as Delivered</a>
                <?php endif;?>
    </div>
    <div class="items">
        <?php
        $order_id = $order['id'];
        $sql = "SELECT `order_items`.*,books.title FROM order_items LEFT JOIN books ON order_items.book=books.id WHERE order_items.order=$order_id";
        $items = mysqli_query($conn,$sql);
        while($item = mysqli_fetch_assoc($items)):

        ?>
        
        <b>
            <a href="../user/book-detail.php?id=<?php echo $item['book']?>">
        <?php echo $item["title"]?>
        </a>
        (<?php echo $item['qty']?>)<br>
        </b>
        <?php endwhile;?>
    </div>
    </li>
    <?php endwhile;?>
</ul>

</body>
</html>