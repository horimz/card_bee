<?php

require_once('../../../private/initialize.php');

require_login();

$card_set = find_all_cards();

?>

<?php $page_title = 'Add Card Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Cards</h2>
                        <a class="action" href="<?php echo url_for('/staff/database/card-new.php'); ?>">Add New Card</a>
                        
                        <table class="list">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Benefit</th>
                                <th>Company</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>

                            <?php while($card = mysqli_fetch_assoc($card_set)) { ?>
                                <?php $benefit = find_benefit_by_card_id($card['id']); ?>
                                <?php $company = find_company_by_card_id($card['id']); ?>
                                <tr>
                                <td><?php echo h($card['name']); ?></td>
                                <td><?php echo h($card['type']); ?></td>
                                <td><?php echo h($benefit['detail']); ?></td>
                                <td><?php echo h($company['name']); ?></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/card-edit.php?id=' . h(u($card['id']))); ?>">Edit</a></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/card-delete.php?id=' . h(u($card['id']))); ?>">Delete(해당 카드를 지원하는 가맹점이 존재하지 않는 경우만 삭제)</a></td>
                                </tr>
                        <?php } ?>
                        </table>

                            <?php
                            mysqli_free_result($card_set);
                            ?>

				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

