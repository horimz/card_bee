<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/database/franchise-show.php'));
}
$id = $_GET['id'];  // franchise id value

if(is_post_request()) {
  $benefit = [];
  $benefit['franchise_id'] = $id ?? '';
  $benefit['card_id'] = $_POST['card_id'] ?? '';

  $result = insert_affiliate($benefit);        
  if($result === true) {
    $_SESSION['message'] = 'Benefit added.';
    redirect_to(url_for('/staff/database/franchise-show.php?id=' . h(u($id))));
  } else {
    $errors = $result;
  }
} else {
  $card_set = find_all_cards();
}

?>

<?php $page_title = 'Add Benefit'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Add benefit</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($id))); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/benefit-new.php?id=' . h(u($id))); ?>" method="post">
                        
                        <div class="form-group">
                          <select name="card_id">
                            <?php while($card = mysqli_fetch_assoc($card_set)) { ?>
                              <option value="<?php echo h($card['id']); ?>"><?php echo h($card['name']); ?></option>
                            <?php } ?>  
                            <?php mysqli_free_result($card_set); ?>
                          </select>
                        </div>                        
                        
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-send-message" value="Add">
                        </div>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
