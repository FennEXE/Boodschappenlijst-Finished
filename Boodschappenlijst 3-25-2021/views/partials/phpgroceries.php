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

<?php include("javascript.php"); ?>
</div>