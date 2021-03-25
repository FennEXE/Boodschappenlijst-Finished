<ul>
		<?php foreach ($secondItems as $seconditem) : ?>
			<li><b>Product:</b> <?= $seconditem->name; ?></li>
			<li><b>Amount:</b> <?= $seconditem->number; ?></li>
			<li><b>Price:</b> &euro;<?= number_format($seconditem->price, 2, ',', ' '); ?></li>
			<br>
		<?php endforeach; ?>	
</ul>