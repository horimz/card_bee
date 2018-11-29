<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/database/franchise-show.php'));
}
$id = $_GET['id'];  // franchise id

if(is_post_request()) {
  $franchisee = [];
  //$franchisee['id'] = $_POST['id'] ?? '';
  $franchisee['branch'] = $_POST['branch'] ?? '';
  $franchisee['address'] = $_POST['address'] ?? '';
  $franchisee['phone_number'] = $_POST['phone_number'] ?? '';
  $franchisee['franchise_id'] = $id ?? '';

  $result = insert_franchisee($franchisee);                 
  if($result === true) {
    $_SESSION['message'] = 'Franchisee added.';
    redirect_to(url_for('/staff/database/franchise-show.php?id=' . h(u($id))));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $franchisee = [];
  $franchisee["id"] = '';
  $franchisee["branch"] = '';
  $franchisee["address"] = '';
  $franchisee["phone_number"] = '';
  $franchisee["franchise_id"] = '';

}

?>

<?php $page_title = 'Add Franchisee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Create</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($id))); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/franchisee-new.php?id=' . h(u($id))); ?>" method="post">
                        
                        <div class="form-group">
                          <input type="text" class="form-control" name="branch" placeholder="Branch" value="<?php echo h($franchise['branch']); ?>">
                                  </div>
                                  <div class="form-group">
                          <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo h($franchise['address']); ?>">
                                  </div>
                                  <div class="form-group">
                          <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="<?php echo h($franchise['phone_number']); ?>">
                                  </div>
                        
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-send-message" value="Create">
                        </div>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
