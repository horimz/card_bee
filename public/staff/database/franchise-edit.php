<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/franchise.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $franchise = [];
  $franchise['id'] = $id;
  $franchise['name'] = $_POST['name'] ?? '';
  $franchise['type'] = $_POST['type'] ?? '';

  $result = update_franchise($franchise); 
  if($result === true) {
    $_SESSION['message'] = 'Franchise updated.';
    redirect_to(url_for('/staff/database/franchise.php'));
  } else {
    $errors = $result;
  }
} else {
  $franchise = find_franchise_by_id($id);          
}

?>

<?php $page_title = 'Edit Franchise'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Edit</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/franchise-edit.php?id=' . h(u($id))); ?>" method="post">
                                  <div class="form-group">
                          <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo h($franchise['name']); ?>">
                                  </div>
                                  <div class="form-group">
                          <input type="text" class="form-control" name="type" placeholder="Type" value="<?php echo h($franchise['type']); ?>">
                                  </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-send-message" value="Edit">
                        </div>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
