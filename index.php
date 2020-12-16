<?php
include("includes/header.php");
?>

<h1><?php echo APP_NAME; ?></h1>

<!-- <a href="index.php?displayby=category&displayvalue=Light">Light</a> -->
<iframe width="1280" height="720" src="https://www.youtube.com/embed/9wuW3MXLyTI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<hr>

<div class="category-container">
    <div class="flex">
        <a href="tools.php"><img src="uploads/tools_icon/Icon_Tools.png" alt="tools icon"></a>
        <a href="tools.php"><h3>Tools</h3></a>
    </div>
    <div class="thumbnail-container">
        
        <?php $result_tool = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Tools'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_tool)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";       
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="light.php"><img src="uploads/tools_icon/Icon_Light.png" alt="Light icon"></a>
        <a href="light.php"><h3>Light</h3></a>
    </div>
    <div class="thumbnail-container">
        <?php $result_light = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Light'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_light)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="survival.php"><img src="uploads/tools_icon/Icon_Survival.png" alt="Survival icon"></a>
        <a href="survival.php"><h3>Survival</h3></a>
    </div>
    <div class="thumbnail-container">
        <?php $result_survival = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Survival'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_survival)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="food.php"><img src="uploads/tools_icon/Icon_Food.png" alt="Food icon"></a>
        <a href="food.php"><h3>Food</h3></a>
    </div>
    <div class="thumbnail-container">
        <?php $result_food = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Food'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_food)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="science.php"><img src="uploads/tools_icon/Icon_Science.png" alt="Science icon"></a>
        <a href="science.php"><h3>Science</h3></a>
    </div>
    <div class="thumbnail-container">
        <?php $result_science = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Science'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_science)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="fight.php"><img src="uploads/tools_icon/Icon_Fight.png" alt="Fight icon"></a>
        <a href="fight.php"><h3>Fight</h3></a>
    </div>
    <div class="thumbnail-container">
        <?php $result_fight = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Fight'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_fight)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>

<div class="category-container">
    <div class="flex">
        <a href="magic.php"><img src="uploads/tools_icon/Icon_Magic.png" alt="Magic icon">
            <h3>Magic</h3>
        </a>
        
    </div>
    <div class="thumbnail-container">
        <?php $result_magic = mysqli_query($con, "SELECT * FROM craft WHERE category LIKE 'Magic'"); ?>
        
        <?php while($row = mysqli_fetch_array($result_magic)) : ?>
        
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
            echo "$imgUrl$name</a>";
            echo "</div>";      
        ?>
        
        <?php endwhile; ?>
    </div>
</div>


<div class="widgets">
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

<?php
include("includes/footer.php");
?>