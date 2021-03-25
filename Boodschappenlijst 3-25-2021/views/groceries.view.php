<?php require('partials/head.php'); ?>
	<body>
		<div class="nav">
			<?php require('views/partials/nav.php'); ?>
		</div>
		<div class="groceryCalculator">
			<?php require('partials/phpgroceries.php'); ?>
		</div>
		<div class="groceryList">
			<?php require('partials/grocerylist.php'); ?>
		</div>
		<div class="bottomcenter">
		<?php require('partials/sqlInjector.php'); ?>
		</div>
	</body>
	
<?php require('partials/footer2.php'); ?>