<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/database/benefits.php'));
  }
$id = $_GET['id'];

if(is_post_request()) {
  $benefit = [];
  $benefit['id'] = $id ?? '';
  $benefit['detail'] = $_POST['detail'] ?? '';

  $result = update_benefit($benefit);
  if($result === true) {
    $_SESSION['message'] = 'Benefit updated.';
    redirect_to(url_for('/staff/database/benefits.php'));
  } else {
    $errors = $result;
  }
} else {
  $benefit = find_benefit_by_id($id);
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
                        <form action="<?php echo url_for('/staff/database/benefits-edit.php?id=' . h(u($id))); ?>" method="post">
                
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
