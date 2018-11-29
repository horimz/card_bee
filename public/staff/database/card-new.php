<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {
  $card = [];
  // $card['id'] = $_POST['id'] ?? '';
  $card['name'] = $_POST['name'] ?? '';
  $card['type'] = $_POST['type'] ?? '';
  $card['benefit_id'] = $_POST['benefit_id'] ?? '';
  $card['company_id'] = $_POST['company_id'] ?? '';

  $result = insert_card($card);
  if($result === true) {
    $_SESSION['message'] = 'Card added.';
    redirect_to(url_for('/staff/database/card.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $card = [];
  $card["first_name"] = '';
  $card["last_name"] = '';
  $card["email"] = '';
  $card["username"] = '';
  $card['password'] = '';
  $card['confirm_password'] = '';

  $benefit_set = find_all_benefits();
  $company_set = find_all_companys();
}

?>

<?php $page_title = 'Create Card'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Create</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/card.php'); ?>">&laquo; Back to List</a>
                        <?php echo display_errors($errors); ?>
                        <form action="<?php echo url_for('/staff/database/card-new.php'); ?>" method="post">
                        
                        <!-- <div class="form-group">
                          <input type="text" class="form-control" name="id" placeholder="ID" value="<?php //echo h($card['id']); ?>">
                        </div> -->
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo h($card['name']); ?>">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="type" placeholder="Type" value="<?php echo h($card['type']); ?>">
                        </div>

                        <div class="form-group">
                          <select name="benefit_id">
                            <?php while($benefit = mysqli_fetch_assoc($benefit_set)) { ?>
                              <option value="<?php echo h($benefit['id']); ?>"><?php echo h($benefit['detail']); ?></option>
                            <?php } ?>  
                            <?php mysqli_free_result($benefit_set); ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <select name="company_id">
                            <?php while($company = mysqli_fetch_assoc($company_set)) { ?>
                              <option value="<?php echo h($company['id']); ?>"><?php echo h($company['name']); ?></option>
                            <?php } ?>  
                            <?php mysqli_free_result($company_set); ?>
                          </select>
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
