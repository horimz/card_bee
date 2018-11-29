<?php

require_once('../../../private/initialize.php');

require_login();

$benefit_set = find_all_benefits();

?>

<?php $page_title = 'Add Card Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Benefits</h2>
                        <a class="action" href="<?php echo url_for('/staff/database/benefits-new.php'); ?>">Add New Benefit</a>
                        
                        <table class="list">
                            <tr>
                                <th>Detail</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>

                            <?php while($benefit = mysqli_fetch_assoc($benefit_set)) { ?>
                                <tr>
                                <td><?php echo h($benefit['detail']); ?></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/benefits-edit.php?id=' . h(u($benefit['id']))); ?>">Edit</a></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/benefits-delete.php?id=' . h(u($benefit['id']))); ?>">Delete(해당 혜택을 지원하는 카드가 있는 경우 삭제 불가)</a></td>
                                </tr>
                        <?php } ?>
                        </table>

                            <?php
                            mysqli_free_result($benefit_set);
                            ?>

				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

