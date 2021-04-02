<div class="groceryCalculator">
<table class="boodschappenlijst" border>
	<tbody>
		<tr>
			<th class="title">Product</th>
			<th class="title">Prijs</th>
			<th class="title">Aantal</th>
			<th class="title">Subtotaal</th>
		</tr>
		
		<?php foreach ($Items as $item) : ?>
			<tr class="groceriesCalculator">
			<td id="<?php echo $item->name?>" class = "itemName"><?= $item->name; ?></td>
			<td id="<?php echo $item->name . "price"; ?>" class="prices"><?= $item->price; ?></td>
			<td id="number">
				<span id="broodQuantity" class="productQuantity">
				<input id="brood" class="product-Quantity" type="button" value="-" onclick="removeProduct(<?= array_search($item->id, array_column($Items, "id")); ?>)"> <a id="<?php echo $item->name; ?>ItemAmount" class="itemAmount"><?= $item->number; ?></a>
				<input id="brood" class="product+Quantity" type="button" value="+" onclick="addProduct(<?= array_search($item->id, array_column($Items, "id")); ?>)"></span>
			</td>
			<td id="<?php echo $item->name; ?>Cost" class="productTotalCost">0.00</td>
			</tr>
		<?php endforeach; ?>
		</form>
		<tr>
			<td colspan="3" class="totaltitle">Totaal</th>
			<td colspan="1" id="totalCost" class="totalcost">0</td></th>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	//Deze functie zorgt er voor dat alle nummers in financial() altijd twee decimalen hebben.
	function financial(x) {
		return Number.parseFloat(x).toFixed(2);
	}

	let totalCostHTML = document.getElementById("totalCost");

	//Converts PHP array of SQL table into a javascript array.
	var itemArr = <?php echo json_encode($Items); ?>;

	//Total cost variable, this will be put into the total cost cell in html.
	let totalCost = 0;
	
	//Combines all the values of an array and adds them up.
	const reducer = (accumulator, currentValue) => accumulator + currentValue;

	//This array will fill up with values whenever an item number is added via button.
	var subtotalArr = [];

	//This function is used with the + buttons
	function addProduct(groceryID) {
		itemArr[groceryID]["number"]++;
		
		document.getElementById(itemArr[groceryID]["name"] + "ItemAmount").innerHTML = itemArr[groceryID]["number"];
		document.getElementById(itemArr[groceryID]["name"]+"Cost").innerHTML = financial(itemArr[groceryID]["number"] * itemArr[groceryID]["price"]); 
		
		subtotalArr[groceryID] = itemArr[groceryID]["number"] * itemArr[groceryID]["price"];

		totalCost = subtotalArr.reduce(reducer);
		totalCostHTML.innerHTML = financial(totalCost);
	}

	//This function is used with the - buttons, amount can't go below 0.
	function removeProduct(groceryID) {
		if (itemArr[groceryID]["number"] < 1) return NULL
			
		itemArr[groceryID]["number"]--;
		document.getElementById(itemArr[groceryID]["name"] + "ItemAmount").innerHTML = itemArr[groceryID]["number"];
		document.getElementById(itemArr[groceryID]["name"]+"Cost").innerHTML = financial(itemArr[groceryID]["number"] * itemArr[groceryID]["price"]);
		
		subtotalArr[groceryID] = itemArr[groceryID]["number"] * itemArr[groceryID]["price"];

		totalCost = subtotalArr.reduce(reducer);
		totalCostHTML.innerHTML = financial(totalCost);
	}

</script>
</div>