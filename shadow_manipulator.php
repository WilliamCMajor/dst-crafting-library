<?php
include("includes/header.php");
?>

<h1><?php echo APP_NAME; ?></h1>

<h2>Shadow Manipulator</h2>
<hr>
<div class="thumbnail-container">
    <?php $result = mysqli_query($con, "SELECT * FROM craft WHERE science_requirement LIKE 'Shadow Manipulator'"); ?>
    
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

<div class="widgets position">
    <h3>Science Requirement Category</h3>
    <a href="general.php">       
        <img src="uploads/tools_icon/Icon_Tools.png" alt="General">
        <p>General</p>
    </a>

    <a href="science_machine.php">       
        <img src="uploads/tools_icon/Science_Machine_Build.png" alt="Science Machine">
        <p>Science Machine</p>
    </a>

    <a href="alchemy-engine.php">       
        <img src="uploads/tools_icon/Alchemy_Engine_Build.png" alt="Alchemy Engine">
        <p>Alchemy Engine</p>
    </a>

    <a href="prestihatitator.php">       
        <img src="uploads/tools_icon/Prestihatitator_Build.png" alt="Prestihatitator">
        <p>Prestihatitator</p>
    </a>

    <a href="shadow_manipulator.php">       
        <img src="uploads/tools_icon/Shadow_Manipulator_Build.png" alt="Shadow Manipulator Build">
        <p>Shadow Manipulator</p>
    </a>
    
</div>

<?php include("includes/widgets.php"); ?>

<?php
include("includes/footer.php");
?>