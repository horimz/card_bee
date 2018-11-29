<?php

require_once('../../../private/initialize.php');

require_login();                    // 이 페이지로 card_id를 어떻게 가져오지? 쿠키??

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/database/index.php'));
}
$id = $_GET['id'];
// $affiliate = [];
// $affiliate['franchise_id'] = $id;    
// $affiliate['card_id'] = $_GET['card_id'] ?? '';

if(is_post_request()) {
  //$result = delete_card($id);                  
  $_SESSION['message'] = 'Benefit deleted.';
  redirect_to(url_for('/staff/database/franchise-show.php?id=' . h(u($id))));
} else {
//   $card = find_card_by_id($id);               
}

?>

<?php $page_title = 'Delete Benefit'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Delete</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($id))); ?>">&laquo; Back to List</a>
                        <p>Are you sure you want to delete this benefit?</p>
                        <form action="<?php echo url_for('/staff/database/benefit-delete.php?id=' . h(u($id))); ?>" method="post">
					      <div class="form-group">
						      <input type="submit" class="btn btn-primary btn-send-message" value="Delete">
					      </div>
				      </form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
