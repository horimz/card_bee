<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {
  $benefit = [];
  $benefit['detail'] = $_POST['detail'] ?? '';

  $result = insert_benefit($benefit);
  if($result === true) {
    $_SESSION['message'] = 'Benefit added.';
    redirect_to(url_for('/staff/database/benefits.php'));
  } else {
    $errors = $result;
  }
} else {
  // display the blank form
  $benefit = [];
  $benefit["detail"] = '';
}

?>

<?php $page_title = 'Create Benefit'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Create</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/benefits.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/benefits-new.php'); ?>" method="post">
                
                        <div class="form-group">
                          <input type="text" class="form-control" name="detail" placeholder="Detail" value="<?php echo h($benefit['detail']); ?>">
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
