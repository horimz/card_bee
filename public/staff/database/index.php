<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>
<?php $page_title = 'Database'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Database</h2>
						
						<form action="card.php" method="">
					      <div class="form-group">
						      <input type="submit" class="btn btn-primary btn-send-message" value="Add card information">
					      </div>
						</form>
						
						<form action="franchise.php" method="">
					      <div class="form-group">
						      <input type="submit" class="btn btn-primary btn-send-message" value="Add franchise information">
					      </div>
						</form>

						<form action="benefits.php" method="">
					      <div class="form-group">
						      <input type="submit" class="btn btn-primary btn-send-message" value="Add benefit information">
					      </div>
						</form>

                        <!-- <h3><a href="<?php //echo url_for('/staff/database/card/index.php'); ?>">Add card information</a></h3> -->
                        <!-- <h3><a href="<?php //echo url_for('/staff/admins/franchise/index.php'); ?>">Add franchise information</a></h3> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

