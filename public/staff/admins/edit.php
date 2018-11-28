<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $admin = [];
  $admin['id'] = $id;
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = update_admin($admin);
  if($result === true) {
    $_SESSION['message'] = 'Admin updated.';
    redirect_to(url_for('/staff/admins/index.php'));
  } else {
    $errors = $result;
  }
} else {
  $admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Edit</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
					      <div class="form-group">
						      <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo h($admin['first_name']); ?>">
                          </div>
                          <div class="form-group">
						      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo h($admin['last_name']); ?>">
                          </div>
                          <div class="form-group">
						      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo h($admin['username']); ?>">
                          </div>
                          <div class="form-group">
						      <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo h($admin['email']); ?>">
					      </div>
					      <div class="form-group">
						      <input type="password" class="form-control" name="password" placeholder="Password"value="">
                          </div>
                          <div class="form-group">
						      <input type="password" class="form-control" name="confirm_password" placeholder="Confrim Password" value="">
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
