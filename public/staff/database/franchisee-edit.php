<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/franchise.php'));
}
$id = $_GET['id'];              // franchisee id
$franchise = find_franchise_id_by_franchisee_id($id);               

if(is_post_request()) {
  $franchisee = [];
  $franchisee['id'] = $id ?? '';
  $franchisee['branch'] = $_POST['branch'] ?? '';
  $franchisee['address'] = $_POST['address'] ?? '';
  $franchisee['phone_number'] = $_POST['phone_number'] ?? '';
//   $franchisee['franchise_id'] = $franchise['franchise_id'] ?? '';

  $result = update_franchisee($franchisee); 
  if($result === true) {
    $_SESSION['message'] = 'Franchisee updated.';
    redirect_to(url_for('/staff/database/franchise-show.php?id=' . h(u($franchise['franchise_id']))));
  } else {
    $errors = $result;
  }
} else {
  $franchisee = find_franchisee_by_id($id);          
}

?>

<?php $page_title = 'Edit Franchisee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Edit</h2>

                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($franchise['franchise_id']))); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/franchisee-edit.php?id=' . h(u($id))); ?>" method="post">    
                            <div class="form-group">
                                <input type="text" class="form-control" name="branch" placeholder="Branch" value="<?php echo h($franchisee['branch']); ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo h($franchisee['address']); ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="<?php echo h($franchisee['phone_number']); ?>">
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
