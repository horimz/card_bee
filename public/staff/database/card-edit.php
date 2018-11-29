<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/card.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $card = [];
  $card['id'] = $id;
  $card['name'] = $_POST['name'] ?? '';
  $card['type'] = $_POST['type'] ?? '';
  // $card['benefit_id'] = $_POST['benefit_id'] ?? '';
  // $card['company_id'] = $_POST['company_id'] ?? '';

  $result = update_card($card); 
  if($result === true) {
    $_SESSION['message'] = 'Card updated.';
    redirect_to(url_for('/staff/database/card.php'));
  } else {
    $errors = $result;
  }
} else {
  $card = find_card_by_id($id);          
}

?>

<?php $page_title = 'Edit Card'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Edit</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/card.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/card-edit.php?id=' . h(u($id))); ?>" method="post">
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo h($card['name']); ?>">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="type" placeholder="Type" value="<?php echo h($card['type']); ?>">
                          </div>
                          <!-- <div class="form-group">
                            <input type="text" class="form-control" name="benefit_id" placeholder="Benefit ID" value="<?php //echo h($card['benefit_id']); ?>">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="company_id" placeholder="Company ID" value="<?php //echo h($card['company_id']); ?>">
                          </div> -->
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
