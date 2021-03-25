

<table class="boodschappenlijst" border>
	<col width=100>
	<col width=100>
	<col width=100>
	<col width=100>
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
			<td id="<?php echo $item->name . "price"; ?>" class="prices"><?=/*number_format(*/$item->price/*, 2, ',', ' ')*/; ?></td>
			<td id="number">
				<span id="broodQuantity" class="productQuantity">
				<input id="brood" class="product-Quantity" type="button" value="-" onclick="removeProduct(<?= array_search($item->name, array_column($Items, "name")); ?>)"> <a id="<?php echo $item->name; ?>ItemAmount" class="itemAmount"><?= $item->number; ?></a>
				<input id="brood" class="product+Quantity" type="button" value="+" onclick="addProduct(<?= array_search($item->name, array_column($Items, "name")); ?>)"></span>
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

	//Just a simple console.log function to see if all the data from the item array is indeed present
	//itemArr.forEach(element => console.log(element));

	//Total cost variable, this will be put into the total cost cell in html.
	let totalCost = 0;
	
	//Combines all the values of an array and adds them up.
	const reducer = (accumulator, currentValue) => accumulator + currentValue;

	//This array will fill up with values whenever an item number is added via button.
	var subtotalArr = [];

	//This function is used with the + buttons
	function addProduct(groceryID) {
		console.log(groceryID);
		var groceryCtrl = groceryID;

		console.log(groceryCtrl);
		itemArr[groceryCtrl]["number"]++;
		console.log(itemArr[groceryCtrl]["name"]);
		
		
		document.getElementById(itemArr[groceryCtrl]["name"] + "ItemAmount").innerHTML = itemArr[groceryCtrl]["number"];
		document.getElementById(itemArr[groceryCtrl]["name"]+"Cost").innerHTML = financial(itemArr[groceryCtrl]["number"] * itemArr[groceryCtrl]["price"]); 
		
		subtotalArr[groceryCtrl] = itemArr[groceryCtrl]["number"] * itemArr[groceryCtrl]["price"];
		//console.log(subtotalArr);
		totalCost = subtotalArr.reduce(reducer);
		//console.log(subtotalArr.reduce(reducer));

		totalCostHTML.innerHTML = financial(totalCost);
	}

	//This funciton is used with the - buttons, amount can't go below 0.
	function removeProduct(groceryID) {
		var groceryCtrl = groceryID;
		
		if (itemArr[groceryCtrl]["number"] > 0) {
			
			itemArr[groceryCtrl]["number"]--;
			console.log(itemArr[groceryCtrl]["name"]);
		
			document.getElementById(itemArr[groceryCtrl]["name"] + "ItemAmount").innerHTML = itemArr[groceryCtrl]["number"];
			document.getElementById(itemArr[groceryCtrl]["name"]+"Cost").innerHTML = financial(itemArr[groceryCtrl]["number"] * itemArr[groceryCtrl]["price"]);

			subtotalArr[groceryCtrl] = itemArr[groceryCtrl]["number"] * itemArr[groceryCtrl]["price"];
			//console.log(subtotalArr);
			totalCost = subtotalArr.reduce(reducer);
			//console.log(subtotalArr.reduce(reducer));

			totalCostHTML.innerHTML = financial(totalCost);
		} else null;
	}

</script>