<?php
include("../includes/logincheck.php");
include("../includes/header.php");

$item_id = $_GET['id'];
if(!isset($item_id)){
    $result = mysqli_query($con,"SELECT * FROM craft LIMIT 1") or die (mysqli_error($con));
    while($row = mysqli_fetch_array($result))
    {
        $item_id = $row['item_id'];
    }
    
}  

// IF user submits changes, then get the new info and update to database
if(isset($_POST['submit']))
{
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $category = $_POST['category'];
    $science_requirement = $_POST['science_requirement'];

    $require_item1 = $_POST['require_item1'];
    $require_item1_num = $_POST['require_item1_num'];
    $require_item2 = $_POST['require_item2'];
    $require_item2_num = $_POST['require_item2_num'];
    $require_item3 = $_POST['require_item3'];
    $require_item3_num = $_POST['require_item3_num'];

    $damage = $_POST['damage'];
    $durability = $_POST['durability'];
    $how_to_obtain = $_POST['how_to_obtain'];
    
    
    $sql = "UPDATE craft
            SET item_name = '$item_name',
                item_description = '$item_description',
                category = '$category',
                science_requirement = '$science_requirement',
                require_item1 = '$require_item1',
                require_item1_num = '$require_item1_num',
                require_item2 = '$require_item2',
                require_item2_num = '$require_item2_num',
                require_item3 = '$require_item3',
                require_item3_num = '$require_item3_num',           
                damage = '$damage',
                durability = '$durability',
                how_to_obtain = '$how_to_obtain'
                WHERE item_id = $item_id";
    $x = mysqli_query($con,$sql) or die(mysqli_error($con));
    
} 

// IF user click delete button, then delete info and update to database
// if(isset($_POST['delete']))
// {   
//     $sql = "DELETE craft
//             WHERE item_id = '$item_id'";
//     $x = mysqli_query($con,$sql) or die(mysqli_error($con));
//     header("Location:edit.php");
    
// } 

// Get all existing records and create dynamic nav system
$result = mysqli_query($con,"SELECT * FROM craft ORDER BY item_name");
while($row = mysqli_fetch_array($result)){
    $thisName = $row['item_name'];
    $thisID = $row['item_id'];
    $allLinks .= "\n\t\t<a href=\"edit.php?id=$thisID\" >$thisName</a><br />";
    // $thisPage = $_SERVER['PHP_SELF']."?id=".$thisID;

    if($thisID == $item_id)
    {
        $thisLink .= "\n<a href=\"edit.php?id=$thisID\" class=\"highlightlink\">$thisName</a><br />"; 

    }else
    {
        $thisLink .= "\n<a href=\"edit.php?id=$thisID\">$thisName</a><br />";
    }
    
}

// Get the existing content for the selected item to prepopulate form fields
$result = mysqli_query($con,"SELECT * FROM craft WHERE item_id = '$item_id'");
while($row = mysqli_fetch_array($result)){
    $n_name = $row['item_name'];
    $n_description = $row['item_description'];
    $n_category = $row['category'];
    $n_science_requirement = $row['science_requirement'];

    $n_require_item1 = $row['require_item1'];
    $n_require_item1_num = $row['require_item1_num'];
    $n_require_item2 = $row['require_item2'];
    $n_require_item2_num = $row['require_item2_num'];
    $n_require_item3 = $row['require_item3'];
    $n_require_item3_num = $row['require_item3_num'];

    $n_damage = $row['damage'];
    $n_durability = $row['durability'];
    $n_how_to_obtain = $row['how_to_obtain'];

}

?>

<h2>Edit Item</h2>
<div class="row">
    <div class="col-md-9">
        <form name="cssform" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="file">Image to upload</label>
                <input class="form-control" type="file" id="file" name="file" disabled>
            </div>
        
            <div class="mb-3">
                <label for="item_name">Item Name</label>
                <input class="form-control" type="text" id="item_name" name="item_name" value="<?php echo $n_name; ?>">
            </div>
        
            <div class="mb-3">
                <label for="item_description">Item Description</label>
                <textarea class="form-control" name="item_description" id="item_description" cols="30" rows="10"><?php echo $n_description; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="<?php echo $n_category; ?>"><?php echo $n_category; ?></option>
                    <option value="Tools">Tools</option>
                    <option value="Light">Light</option>
                    <option value="Survival">Survival</option>
                    <option value="Food">Food</option>
                    <option value="Science">Science</option>
                    <option value="Fight">Fight</option>
                    <option value="Structures">Structures</option>
                    <option value="Seafaring">Seafaring</option>
                    <option value="Refine">Refine</option>
                    <option value="Magic">Magic</option>

                </select>
	        </div>

        	<div class="mb-3">
        		<label for="science_requirement">Science Requirement</label>
                <select class="form-control" name="science_requirement" id="science_requirement" value="<?php echo $n_science_requirement; ?>">
                <option value="<?php echo $n_science_requirement; ?>"><?php echo $n_science_requirement; ?></option>
                <option value="No Science requirement">No Requirement</option>
                <option value="Science Machine">Science Machine(Science Tier 1)</option>
                <option value="Alchemy Engine">Alchemy Engine(Science Tier 2)</option>
                <option value="Prestihatitator">Prestihatitator(Magic Tier 1)</option>
                <option value="Shadow Manipulator">Shadow Manipulator(Magic Tier 2)</option>
                <option value="Ancient Pseudoscience Station">Ancient Pseudoscience Station(Ancient Science)</option>
        
        		</select>
        	</div>
        
        	<div class="mb-3">
                <label for="require_item1">Required items</label>
                
                <div class="input-group mb-3">
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="require_item1" value="<?php echo $n_require_item1; ?>">
                    </div>		
                    <div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
                    <input class="form-control" type="number" name="require_item1_num" value="0" value="<?php echo $n_require_item1_num; ?>">		
                </div>
        
                <div class="input-group mb-3">
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="require_item1" value="<?php echo $n_require_item2; ?>">
                    </div>		
                    <div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
                    <input class="form-control" type="number" name="require_item1_num" value="0" value="<?php echo $n_require_item2_num; ?>">		
                </div>

                <div class="input-group mb-3">
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="require_item1" value="<?php echo $n_require_item3; ?>">
                    </div>		
                    <div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
                    <input class="form-control" type="number" name="require_item1_num" value="0" value="<?php echo $n_require_item3_num; ?>">		
                </div>
        		
        	</div>
        
        	<div class="mb-3">
        		<label for="damage">Damage</label>
        		<input class="form-control" type="text" name="damage" value="<?php echo $n_damage; ?>">
        	</div>
        
        	<div class="mb-3">
        		<label for="durability">Durability</label>
        		<input class="form-control" type="text" name="durability" value="<?php echo $n_durability; ?>">
        	</div>
        
        	<div class="mb-3">
        		<label for="how_to_obtain">How to obtain?</label>
        		<textarea class="form-control" name="how_to_obtain" id="how_to_obtain" cols="30" rows="10"><?php echo $n_how_to_obtain; ?></textarea>
        	</div>      	
        	
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-info" value="Update New Item">
            </div>
        
        </form>
    </div>

    <div class="col-md-3">
    <?php echo $thisLink; ?>
    </div>
</div>

<button class="btn btn-danger" name="delete" onclick="if((confirm('Are you sure?'))!= false) {return location.href = 'delete.php?id=<?php echo $item_id;?>'};">Delete Item</button>

<?php
	include("../includes/footer.php");
?>