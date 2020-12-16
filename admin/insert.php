<?php
	include("../includes/logincheck.php");
	include("../includes/header.php");

?>

<h2>Insert New Item</h2>
<form name="cssform" enctype="multipart/form-data" action="insert_db.php" method="post">
    <div class="mb-3">
        <label for="file">Image to upload</label>
        <input class="form-control" type="file" id="file" name="file">
    </div>

    <div class="mb-3">
        <label for="item_name">Item Name</label>
        <input class="form-control" type="text" id="item_name" name="item_name">
    </div>

    <div class="mb-3">
        <label for="item_description">Item Description</label>
        <textarea class="form-control" name="item_description" id="item_description" cols="30" rows="10"></textarea>
    </div>

	<div class="mb-3">
		<label for="category">Category</label>
		<select class="form-control" name="category" id="category">
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
		<select class="form-control" name="science_requirement" id="science_requirement">
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
				<input class="form-control" type="text" name="require_item1">
			</div>		
			<div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
			<input class="form-control" type="number" name="require_item1_num" value="0">		
		</div>
		

		<div class="input-group mb-3">
			<div class="col-md-8">
				<input class="form-control" type="text" name="require_item2">
			</div>		
			<div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
			<input class="form-control" type="number" name="require_item2_num" value="0">		
		</div>

		<div class="input-group mb-3">
			<div class="col-md-8">
				<input class="form-control" type="text" name="require_item3">
			</div>		
			<div class="inputgroup-prepend"><div class="input-group-text">#</div></div>
			<input class="form-control" type="number" name="require_item3_num" value="0">		
		</div>
		
	</div>

	<div class="mb-3">
		<label for="damage">Damage</label>
		<input class="form-control" type="text" name="damage">
	</div>

	<div class="mb-3">
		<label for="durability">Durability</label>
		<input class="form-control" type="text" name="durability">
	</div>

	<div class="mb-3">
		<label for="how_to_obtain">How to obtain?</label>
		<textarea class="form-control" name="how_to_obtain" id="how_to_obtain" cols="30" rows="10"></textarea>
	</div>

	
	
    <input type="submit" name="submit" class="btn btn-info" value="Insert New Item">

</form>

<?php
	include("../includes/footer.php");
?>