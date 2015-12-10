<?php
session_start();
function dateDifference($date1, $date2) {
	$d1 = (is_string($date1) ? strtotime($date1) : $date1);
	$d2 = (is_string($date2) ? strtotime($date2) : $date2);

	$diff_secs = abs($d1 - $d2);
	$base_year = min(date("Y", $d1), date("Y", $d2));

	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);

	return array("years" => abs(substr(date('Ymd', $d1) - date('Ymd', $d2), 0, -4)), "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => ( int ) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => ( int ) date("s", $diff));
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>communication</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" id="layout-css" href="css/layout.min.css"
		type="text/css" media="all">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			.gm-style .gm-style-mtc label, .gm-style .gm-style-mtc div {
				font-weight: 400
			}

		</style>
		<style type="text/css">
			.gm-style .gm-style-cc span, .gm-style .gm-style-cc a, .gm-style .gm-style-mtc div {
				font-size: 10px
			}

		</style>
		<style type="text/css">
			@media print {
				.gm-style .gmnoprint, .gmnoprint {
					display: none
				}
			}

			@media screen {
				.gm-style .gmnoscreen, .gmnoscreen {
					display: none
				}
			}

		</style>
		<style type="text/css">
			.gm-style {
				font-family: Roboto, Arial, sans-serif;
				font-size: 11px;
				font-weight: 400;
				text-decoration: none
			}

		</style>
		<script type="text/javascript" src="js/comment-reply.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="head_img_container">
				<img src="images/header.png" alt="" class="img-responsive"
				alt="Responsive image" />
			</div>
			&nbsp;
			<h1>Welcome <?= $_SESSION['username'] ?> !</h1>
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="admin_assign_new_project.php" class="list-group-item">Assign new project</a>
						<a href="admin_maintain_project.php" class="list-group-item">Maintain Project</a>
						<a href="admin_maintain_employee.php" class="list-group-item">Maintain Employee</a>
						<a href="admin_maintain_customer.php" class="list-group-item active">Maintain Customer</a>
						<a href="update_information.php" class="list-group-item">Update Information</a>
						<a href="admin_change_password.php" class="list-group-item">Change Password</a>
						<a href="admin_communication.php" class="list-group-item">Communication</a>
						<a href="logout.php" class="list-group-item">Log Out</a>
					</div>
				</div>
				<div class="col-md-9">
					<form action="comm_add.php" enctype="multipart/form-data"
					method="post">
						<input type="hidden" name="owner"
						value="<?= $_SESSION['username'] ?>" />
						<label for="message">Message</label>
						<textarea class="form-control" id="message" name="message" rows="5"
						cols="50" placeholder="Message here"></textarea>
						<div class="input-group" style="padding-top: 2px">
							<span class="input-group-btn"> <span
								class="btn btn-primary btn-file"> Browse
									<input name="image"
									type="file">
								</span> </span>
							<input type="text" class="form-control" readonly>
						</div>

						<div class="post-button right" style="padding-top: 5px">
							<input type="submit" class="btn btn-large btn-primary"
							value="Post">
						</div>
					</form>
					</br>
					<?php
					$m = new MongoClient();
					$db = $m -> php_test;
					$comment = $db -> communication;

					$where = array('reference' => "");
					$cursor = $comment -> find($where);
					$cursor -> sort(array('update_date' => -1));
					?>

					<?php
					$ctr = 1;
					foreach ( $cursor as $id => $value ) {
					?>

					<!-- .post-pagination -->
					<div id="comments">
						<ol class="comment-list">

							<li class="comment even thread-even depth-1 clearfix">

								<div id="comment-1" class="comment-inner clearfix">

									<div class="comment-author vcard">
										<cite class="fn">[<a>&nbsp;<?= $value["postedBy"] ?>&nbsp;</a>] </cite>

										<div class="reply">
											<a><?php
											$diff = dateDifference(date('Y-M-d h:i:s', $value["create_date"] -> sec), date("Y-m-d h:i:s"));
											if ($diff["days_total"] > 0) {
												echo $diff["days_total"] . "days";
											} else if ($diff["hours_total"] > 0) {
												echo $diff["hours_total"] . "hrs";
											} else {
												echo $diff["minutes_total"] . "mins";
											}
										?>
											ago</a>
											<?php
											if ($value ["postedBy"] == $_SESSION ['username']) {
											?>
											&nbsp;<a
											class="comment-delete-link"
											href="comm_remove.php?id=<?= $value["_id"] ?>"><span
											class="glyphicon glyphicon-minus"></span>&nbsp;Delete</a>
											<?php
											}
											?>
											&nbsp;<a
											class="comment-comment-link"
											href="javascript:jQuery('#reply<?= $value["_id"] ?>').toggle();"><span
											class="glyphicon glyphicon-comment"></span>&nbsp;Comment</a>

										</div>

									</div>
									<?php
									if (! empty ( $value ["image"] )) {
									?>
									<div class="img_container">
										<img class="img-responsive" alt="Image posting"
										src="comm_images/<?=$value["image"] ?>" />
									</div>
									<?php
									}
									?>
									<div class="comment-content">
										<p>
											<?= $value["message"] ?>
										</p>
									</div>
									<div class="form-group" id="reply<?= $value["_id"] ?>"
									style="display: none">
										<form action="comm_add.php" method="post">
											<input type="hidden" name="owner"
											value="<?= $_SESSION['username'] ?>" />
											<input type="hidden"
											name="reference" value="<?= $value["_id"] ?>" />
											<input
											class="form-control" type="text" name="message"
											placeholder="Write a comment..." />
										</form>
									</div>
								</div>
								<ul class="children">
									<?php
									$where = array (
									'reference' => $value ["_id"]
									);
									$reply = $comment->find ( $where );
									foreach ( $reply as $repId => $replyValue ) {
									?>
									<li
									class="comment byuser comment-author-redmax bypostauthor odd alt depth-2 clearfix">
										<div id="comment-2" class="comment-inner clearfix">
											<div class="comment-author vcard">
												<cite class="fn">[<a>&nbsp;<?= $replyValue["postedBy"] ?>&nbsp;</a>] </cite>

												<div class="reply">

													<a><?php
													$diff = dateDifference(date('Y-M-d h:i:s', $replyValue["create_date"] -> sec), date("Y-m-d h:i:s"));
													if ($diff["days_total"] > 0) {
														echo $diff["days_total"] . "days";
													} else if ($diff["hours_total"] > 0) {
														echo $diff["hours_total"] . "hrs";
													} else {
														echo $diff["minutes_total"] . "mins";
													}
													?>
													ago</a>
													<?php
if ($replyValue ["postedBy"] == $_SESSION ['username']) {
													?>
													&nbsp;<a
													class="comment-delete-link"
													href="comm_remove.php?id=<?= $replyValue["_id"] ?>"><span
													class="glyphicon glyphicon-minus"></span>&nbsp;Delete</a>
													<?php
													}
													?>
												</div>

											</div>
											<!-- .comment-author -->
											<div class="comment-content">
												<p>
													<?= $replyValue["message"] ?>
												</p>
											</div>
											<!-- .comment-content -->
										</div>
										<!-- .comment-inner -->
									</li>
									<?php
									}
									?>
								</ul>
								<!-- .children -->
							</li>
							<!-- #comment-## -->
							</ul>
							<!-- .children -->
							</li>
							<!-- #comment-## -->
						</ol>

					</div>
					<!-- #comments -->

					<?php
					}
					?>
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this), numFiles = input.get(0).files ? input.get(0).files.length : 1, label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
			});
			$(document).ready(function() {
				$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
					var input = $(this).parents('.input-group').find(':text'), log = numFiles > 1 ? numFiles + ' files selected' : label;
					if (input.length) {
						input.val(log);
					} else {
						if (log)
							alert(log);
					}
				});
			});

		</script>
	</body>
</html>