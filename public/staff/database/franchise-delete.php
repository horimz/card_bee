<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/franchise.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_franchise($id);                  
  $_SESSION['message'] = 'Franchise deleted.';
  redirect_to(url_for('/staff/database/franchise.php'));
} else {
  $franchise = find_franchise_by_id($id);               
}

?>

<?php $page_title = 'Delete Franchise'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Delete</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise.php'); ?>">&laquo; Back to List</a>
                        <p>Are you sure you want to delete this Franchise?</p>
                        <form action="<?php echo url_for('/staff/database/franchise-delete.php?id=' . h(u($franchise['id']))); ?>" method="post">
					      <div class="form-group">
						      <input type="submit" class="btn btn-primary btn-send-message" value="Delete">
					      </div>
				      </form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
