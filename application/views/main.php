<!DOCTYPE>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Test Task: Coins App</title>
     
    <?php
		require_once($config['paths']['templates'] . '/header.php');

		$result = (isset($_GET['result'])) ? $_GET['result'] : '';
		$userInput = (isset($_GET['userInput'])) ? $_GET['userInput'] : '£12.23p';
	?>
</head>
 
<body>
	<div class="container">
			<div class="page-header">
				<h1>Coins App</h1>
			</div>
			<p class="lead">A simple PHP application that given a number of pennies will calculate the minimum number of Sterling coins needed to make that amount.</p>
			<form action="../application/controllers/coinController.php" method="post" id="coinsForm" name="coinsForm">
				<p>Please enter an amount. You could use <em>£</em>, <em>p</em> and any kind of float numbers. E.g.:
		
				<input type="hidden" name="js_disabled" id="js_disabled" value="1"/>
				<input type="text" name="userInput" id="userInput" class="form-control" value="<?=$userInput?>" placeholder="Please enter an amount" pattern="^(£?)(\d+)(\.?|\,?)(\d+)?(p?)$" required/>

				<input type="submit" class="btn btn-lg btn-primary"/>
				<label class="checkbox-inline"><input type="checkbox" value="" name="lightboxSwitcher" id="lightboxSwitcher" checked="checked">Lightbox output</label>
				<label class="checkbox-inline"><input type="checkbox" value="" name="testsSwitcher" id="testsSwitcher" >Show tests results</label>
			</form>
			<div id="coinsResult">
				<p><em>Result:</em></p>
				<div><?=$result?></div>
			</div>
			<div class="lightbox">
				<div>
					<p><em>Result:</em></p>
					<div></div>
				</div>
			</div>
			<div id="testsResults">
				<div id="qunit"></div>
				<div id="qunit-fixture"></div>
			</div>
		</div>
	<?php
		require_once($config['paths']['templates'] . '/footer.php');
	?>
</body>
</html>