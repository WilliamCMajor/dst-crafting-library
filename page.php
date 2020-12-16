<?php
include("includes/header.php");
?>


<?php
$item_id = $_GET['item_id'];
if(is_numeric($item_id))
{
    $result = mysqli_query($con,"SELECT * FROM craft WHERE item_id = $item_id");
    while($row = mysqli_fetch_array($result))
    {
        $name = $row['item_name'];
        $description = $row['item_description'];
        $filename = $row['img_filename'];
        $category = $row['category'];
        $science_requirement = $row['science_requirement'];

        $require_item1 = $row['require_item1'];
        $require_item1_num = $row['require_item1_num'];
        $require_item2 = $row['require_item2'];
        $require_item2_num = $row['require_item2_num'];
        $require_item3 = $row['require_item3'];
        $require_item3_num = $row['require_item3_num'];

        $damage = $row['damage'];
        $durability = $row['durability'];
        $how_to_obtain = $row['how_to_obtain'];

        $item_id = $row['item_id'];

        echo "<h2>$name</h2>";
        echo "<hr>";
        echo "<div class=\"pageImg\"><img src=\"uploads/thumbnail/$filename\" /></div>";
        echo "<div class=\"pageDesc\">$description</div>";
        echo "<hr>";
        echo "<h3>Category: </h3>$category";
        echo "<h3>Science Requirement: </h3>$science_requirement";
        echo "<hr>";

        echo "<h3>Crafting Requirement:</h3>";
        echo "<div class=\"craft-require\"><img src=\"uploads/requirement_item/$require_item1.png\" /> <span>$require_item1 x $require_item1_num</span></div>";
        echo "<div class=\"craft-require\"><img src=\"uploads/requirement_item/$require_item2.png\" /> <span>$require_item2 x $require_item2_num</span></div>";

        if($require_item3_num != 0){
            echo "<div class=\"craft-require\"><img src=\"uploads/requirement_item/$require_item3.png\" /> <span>$require_item3 x $require_item3_num</span></div>";
        }
        
        if($damage){echo "<p>Damage: $damage</p>";}
        if($durability){echo "<p>Durability: $durability</p>";}
        echo "<hr>";

        echo "<h3>How to obtain:</h3> <p>$how_to_obtain</p>";
        echo "<hr>";
        
    }
}else{
    echo "<div id=\"pageTitle\">Not a correct info!!</div>";
}

$next = mysqli_query($con,"SELECT item_id FROM craft WHERE item_id=(SELECT min(item_id) from craft where item_id > $item_id)");
while($row = mysqli_fetch_array($next))
{
    $idNext = $row['item_id'];
}
$prev = mysqli_query($con,"SELECT item_id FROM craft WHERE item_id=(SELECT max(item_id) from craft where item_id < $item_id)");
while($row = mysqli_fetch_array($prev))
{
    $idPrev = $row['item_id'];
}
?>
<ul class="pagination pagination-nav">
    <?php
    if($idPrev){
        $nextPrevButtons .= "<li class=\"page-item page-link\"><a href=\"page.php?item_id=$idPrev\" class=\"\">Previous</a></li>";
    }
    else{
        $nextPrevButtons .= "<li class=\"page-item page-link\"><a href=\"\" class=\"\">Previous</a></li>";
    }
    
    if($idNext){
        $nextPrevButtons .= "<li class=\"page-item page-link\"><a href=\"page.php?item_id=$idNext\" class=\"\"> Next</a></li>";
    }
    else{
        $nextPrevButtons .= "<li class=\"page-item page-link\"><a href=\"\" class=\"\"> Next</a></li>";
    }
    
    echo "<li class=\"page-item page-link\">$nextPrevButtons</li>";
    ?>
</ul>

<?php
include("includes/footer.php");
?>

