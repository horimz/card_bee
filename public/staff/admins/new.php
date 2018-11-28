<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {
  $subject = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/staff/admins/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $admin["first_name"] = '';
  $admin["last_name"] = '';
  $admin["email"] = '';
  $admin["username"] = '';
  $admin['password'] = '';
  $admin['confirm_password'] = '';
}

?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Create</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">
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
