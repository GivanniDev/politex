<?php 
require_once './functions.php';

if ( isset($_SESSION['login']) && $_SESSION['login'] == 'on'){

}else {
	header('Location: index.php');
}

$pageTitle = 'Товар добавлен!' 

?>
<?php include('./templates/head.php');?> 

<!-- Header -->
	<?php include('./templates/header.php'); ?>
    <section class="p-tb-92" ></section>

    <!-- Content page -->
	<section class="bg0  p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md ">
						<h3 class="mtext-111 cl2 p-b-16  text-center text-success">
						Великолепно, товар добавлен!
						</h3>

						<a href="admin.php" class="btn btn-success w-100 mr-1">Добавить еще один</a>
                        <br>
                        <br>
                        <a href="index.php" class="btn btn-success w-100">На главную</a>

					</div>
				</div>


       
        
    </div>
</div>
        </div>
</div>
</section>	

<?php 
include('./templates/template_footer.php');
?>
