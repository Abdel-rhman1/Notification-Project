<?php 
	include_once "layout/header.php";
    require_once "layout/navbar.php"; 
    include_once 'database.php';
?>
<div class="container custom-container" style="width:550px">
	<div class='image'>
		<span>
			<i class="fa fa-user" aria-hidden="true"></i>
		</span>
		<span class='change'></span>
	</div>
	<div class='name'>
		User Name
	</div>
	<div class='edit'>
		edit button
	</div>
</div>
<?php
	include_once "layout/footer.php";
?>