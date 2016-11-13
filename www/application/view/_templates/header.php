<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Dashboard</title>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- JS -->
<!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
<!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/semantic.min.css">
<link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<!-- logo -->
<div class="ui inverted menu">
	<?php if (isset ($model)) {
		$itemNumber = 0;
		foreach ($model->menuItems as $menuItem) {
			$itemClass = "item";
			if($itemNumber == 0)
			{
				$itemClass .= " active";
			}
		?>
		<a class="<?=$itemClass ?>"><i class="<?=$menuItem->icon?> icon active"></i><?=$menuItem->text?></a>
	<?php
			$itemNumber++;
		}
	}?>
  <div class="right inverted menu" style="font-size: 35px">
  	
  	<a class="item">
  		<span class="date"></span>&nbsp;
  		<i class="wait icon"></i>
  		<span class="time">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  	</a>
  </div>
</div>
