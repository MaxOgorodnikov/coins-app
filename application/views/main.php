<!DOCTYPE>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Test Task: Coins App</title>
     
    <?php
		require_once($config['paths']['templates'] . '/header.php');
	?>
</head>
 
<body>
	<div class="container">
			<div class="page-header">
				<h1>Coins App</h1>
			</div>
			<p class="lead">A simple PHP application that given a number of pennies will calculate the minimum number of Sterling coins needed to make that amount.</p>
			<form action="" method="post" id="coinsForm" name="coinsForm">
				<p>Please enter an amount. You could use <em>£</em>, <em>p</em> and any kind of float numbers. E.g.:
		
				<input type="text" name="userInput" class="form-control" value="£12.23p" placeholder="Please enter an amount" pattern="^(£?)(\d+)(\.?|\,?)(\d+)(p?)$" required/>
				
				<input type="submit" class="btn btn-lg btn-primary"/>
				<label class="checkbox-inline"><input type="checkbox" value="" name="lightboxSwitcher" id="lightboxSwitcher" checked="checked">Lightbox output</label>
			</form>
			<div id="coinsResult">
				<p><em>Result:</em></p>
				<div></div>
			</div>
			<div class="lightbox">
				<div>
					<p><em>Result:</em></p>
					<div></div>
				</div>
			</div>
		</div>
	<?php
		require_once($config['paths']['templates'] . '/footer.php');
	?>
</body>
</html>