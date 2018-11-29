<?php require_once('../../../private/initialize.php'); ?>

<?php
require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$franchise = find_franchise_by_id($id);
$franchisee_set = find_franchisee_by_franchise_id($id);
// $benefit_set = find_benefits_by_franchise_id($id);
$card_name_set = find_cards_by_franchise_id($id);       
?>

<?php $page_title = 'Show Franchise'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Franchise Information</h2>
                        <a class="back-link" href="<?php echo url_for('/staff/database/franchise.php'); ?>">&laquo; Back to List</a>
                        <h3>Franchise: <?php echo h($franchise['name']); ?></h3>
                                                
                        <br/>

                        <h4>Benefits</h4>
                        <a class="action" href="<?php echo url_for('/staff/database/benefit-new.php?id=' . h(u($franchise['id']))); ?>"); ?>Add New Benefit</a>                        
                        <table class="list">
                        <tr>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>&nbsp;</th>
                        </tr>

                        <?php while($card = mysqli_fetch_assoc($card_name_set)) { ?>
                            <?php $benefit = find_benefit_by_card_id($card['id']); ?>
                        <tr>
                            <td><?php echo h($card['name']); ?></td>
                            <td><?php echo h($benefit['detail']); ?></td>
                            <td><a class="action" href="<?php echo url_for('/staff/database/benefit-delete.php?id=' . h(u($franchise['id']))); ?>">Delete(미구현)</a></td>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php mysqli_free_result($card_name_set); ?>

                        <br/><br/>

                        <h4>Franchisee</h4>
                        <a class="action" href="<?php echo url_for('/staff/database/franchisee-new.php?id=' . h(u($franchise['id']))); ?>"); ?>Add New Franchisee</a>
                        <table class="list">
                        <tr>
                            <th>Branch</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        
                        <?php while($franchisee = mysqli_fetch_assoc($franchisee_set)) { ?>
                        <tr>
                            <td><?php echo h($franchisee['branch']); ?></td>
                            <td><?php echo h($franchisee['address']); ?></td>
                            <td><?php echo h($franchisee['phone_number']); ?></td>
                            <td><a class="action" href="<?php echo url_for('/staff/database/franchisee-edit.php?id=' . h(u($franchisee['id']))); ?>">Edit</a></td>
                            <td><a class="action" href="<?php echo url_for('/staff/database/franchisee-delete.php?id=' . h(u($franchisee['id']))); ?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php mysqli_free_result($franchisee_set); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

