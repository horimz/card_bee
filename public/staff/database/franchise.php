<?php

require_once('../../../private/initialize.php');

require_login();

$franchise_set = find_all_franchise();

?>

<?php $page_title = 'Add Franchise Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="colorlib-main">
	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Admin</span>
						<h2 class="colorlib-heading">Franchise</h2>
                        <a class="action" href="<?php echo url_for('/staff/database/franchise-new.php'); ?>">Add New Franchise</a>
                        
                        <table class="list">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>

                            <?php while($franchise = mysqli_fetch_assoc($franchise_set)) { ?>
                                <tr>
                                <td><?php echo h($franchise['name']); ?></td>
                                <td><?php echo h($franchise['type']); ?></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/franchise-show.php?id=' . h(u($franchise['id']))); ?>">View</a></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/franchise-edit.php?id=' . h(u($franchise['id']))); ?>">Edit</a></td>
                                <td><a class="action" href="<?php echo url_for('/staff/database/franchise-delete.php?id=' . h(u($franchise['id']))); ?>">Delete(가맹점 존재 시 삭제 불가)</a></td>
                                </tr>
                        <?php } ?>
                        </table>

                            <?php
                            mysqli_free_result($franchise_set);
                            ?>

				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- close id='olorlib-page' -->


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

