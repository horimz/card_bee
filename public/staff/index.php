<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>
<?php $page_title = 'Admin'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Staff area</h2>
						<p>User: <?php echo $_SESSION['username'] ?? ''; ?><a href="<?php echo url_for('/staff/index.php'); ?>"> Menu</a><a href="<?php echo url_for('/staff/logout.php'); ?>"> Logout</a></p>
                        <h3><a href="<?php echo url_for('/staff/database/index.php'); ?>">Database</a></h3>
                        <h3><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Admin accounts</a></h3>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

