<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/index.php'));
}

$id = $_GET['id'];      // franchisee id
$franchise = find_franchise_id_by_franchisee_id($id);               

if(is_post_request()) {
  $result = delete_franchisee($id);                              
  $_SESSION['message'] = 'Franchisee deleted.';
  redirect_to(url_for('/staff/database/franchise-show.php?id=' . h(u($franchise['franchise_id']))));
} else {
  $franchisee = find_franchisee_by_id($id);   
}

?>

<?php $page_title = 'Delete Franchisee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Delete</h2>
                        
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($franchise['franchise_id']))); ?>">&laquo; Back to List</a>
                        <p>Are you sure you want to delete this Franchisee?</p>
                        <form action="<?php echo url_for('/staff/database/franchisee-delete.php?id=' . h(u($franchisee['id']))); ?>" method="post">
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
