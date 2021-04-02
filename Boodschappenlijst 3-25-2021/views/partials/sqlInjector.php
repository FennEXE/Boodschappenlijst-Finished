<div class="groceryController">
	<table  class="groceryInjector">
		<tr>
			<td class="groceryCell">
			<b>Voeg een product toe</b>
				<form method="POST" action="/dynInsert">
					<br>
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<br><br>
					<b>Naam</b>
					<br>
					<input name="insertName"></input>
					<br><br>
					<b>Prijs</b>
					<br>
					<input type="number" min="0.01" step="any" name="insertPrice"></input>
					<br>
					<button type="submit">Insert</button>
					<br>
				</form>
			</td>
		</tr>
		<tr>
			<td class="groceryCell">
			<b>Verwijder een Product</b>
				<form method="POST" action="/dynDelete">
					<br>
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<br><br>
					<b>Naam</b>
					<br>
					<input name="deleteName"></input>
					<br>
					<button type="submit">Delete</button>
					<br>
				</form>
			</td>
		</tr>
		<tr>
			<td class="groceryCell">
			<b>Pas de prijs van een product aan</b>
				<form method="POST" action="/dynUpdate">
					<br>
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<br><br>
					<b>Naam</b>
					<br>
					<input name="updateName"></input>
					<br><br>
					<b>Prijs</b>
					<br>
					<input type="number" min="0.01" step="any" name="updatePrice"></input>
					<br>
					<button type="submit">Update</button>
					<br>
				</form>
			</td>
		</tr>
	</table>
</div>