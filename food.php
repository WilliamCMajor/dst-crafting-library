<?php
include("includes/header.php");
?>

<h1><?php echo APP_NAME; ?></h1>


<div class="thumbnail-container">
    <?php $result = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Food'"); ?>
    
    <?php while($row = mysqli_fetch_array($result)) : ?>
    
    <?php
        $name = $row['item_name'];
        $filename = $row['img_filename'];
        $item_id = $row['item_id'];
        $category = $row['category'];
    
    
        echo "<div class=\"image-thumbnail\">";
        $imgUrl = "<a href=\"page.php?item_id=$item_id\">";
        $imgSrc = "<img src=\"uploads/display/$filename\" /></a>";
        $displayImg = $imgUrl . $imgSrc;
        echo $displayImg;
        echo "<p>$name</p>";
        echo "</div>";
        
    ?>
    
    <?php endwhile; ?>
</div>

<?php include("includes/widgets.php"); ?>

<?php
include("includes/footer.php");
?>