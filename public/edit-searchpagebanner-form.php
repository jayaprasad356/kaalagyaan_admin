<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnEdit'])) {
	$title = $db->escapeString(($_POST['title']));
	$description = $db->escapeString(($_POST['description']));

	$category = $db->escapeString(($_POST['category']));
        
        
	if (empty($title)) {
		$error['title'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($description)) {
		$error['description'] = " <span class='label label-danger'>Required!</span>";
	}
	  
	if (empty($category)) {
		$error['category'] = " <span class='label label-danger'>Required!</span>";
	}
  
		if (!empty($title) && !empty($description) && !empty($category) ) 
		{
			if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
				//image isn't empty and update the image
				$old_image = $db->escapeString($_POST['old_image']);
				$extension = pathinfo($_FILES["image"]["name"])['extension'];
		
				$result = $fn->validate_image($_FILES["image"]);
				$target_path = 'upload/searchbanner/';
				
				$filename = microtime(true) . '.' . strtolower($extension);
				$full_path = $target_path . "" . $filename;
				if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
					echo '<p class="alert alert-danger">Can not upload image.</p>';
					return false;
					exit();
				}
				if (!empty($old_image)) {
					unlink($old_image);
				}
				$upload_image = 'upload/searchbanner/' . $filename;
				$sql = "UPDATE searchpage_banners SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
				$db->sql($sql);
			}
				
				$sql_query = "UPDATE searchpage_banners SET title='$title',category_id='$category',description='$description' WHERE id=$ID";
				$db->sql($sql_query);
				$result = $db->getResult();
				if (!empty($result)) {
					$result = 0;
				} else {
					$result = 1;
				}

				if ($result == 1) {
					
					$error['update_searchbanner'] = "<section class='content-header'>
													<span class='text text-success'>Banner Updated Successfully</span> </section>";
				} else {
					$error['update_searchbanner'] = " <span class='text text-danger'>Failed</span>";
				}
				}
			}
// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM searchpage_banners WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "searchpage_banners.php";
	</script>
<?php } ?>

    <?php echo isset($error['update_searchbanner']) ? $error['update_searchbanner'] : ''; ?>

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

		<!-- Content wrapper start -->
		<div class="content-wrapper">

					<!-- Row Start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="card">
								
								<form name="edit_searchpagebanner_form" method="post" enctype="multipart/form-data">
									<div class="card-body">
									<input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
											<h3>Edit Banner</h3>
											<section>
												<h6 class="h-0 m-0">&nbsp;</h6>
												<div class="row gutters">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
														<div class="field-wrapper">
															<input type="text" placeholder="Enter  Name" name="title" value="<?php echo $res[0]['title']; ?>">
															<div class="field-placeholder">Title<i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?></div>
														</div>

													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
														<div class="field-wrapper">		
															<select id='category' name="category"  data-live-search="true">
																<option value="">Select</option>
																	<?php
																	$sql = "SELECT id,name FROM `categories`";
																	$db->sql($sql);
																	$result = $db->getResult();
																	foreach ($result as $value) {
																	?>
																<option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['category_id'] ? 'selected="selected"' : '';?>><?= $value['name'] ?></option>
																<?php } ?>
															</select>
															<div class="field-placeholder">Product Category <span class="text-danger">*</span></div>
														</div>

													</div>
												
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														
														<div class="field-wrapper mt-3">
														<textarea name="description" id="description" class="form-control" rows="3"><?php echo $res[0]['description']; ?></textarea>
																<script type="text/javascript" src="css/js/ckeditor/ckeditor.js"></script>
																<script type="text/javascript">
																	CKEDITOR.replace('description');
																</script>															
							                                    <div class="field-placeholder">Place Description  <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?></div>
														</div>

													</div>
														<h6 class="h-0 m-0">&nbsp;</h6>
														<div class="row gutters">
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																<div class="field-wrapper">
																	<div class="field-placeholder">Upload Image <span class="text-danger">*</span></div>

																		<div class="dz-message needsclick">
																		<input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
                                                                         <p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="height:120px;max-width:100%" /></p>
																		</div>

																	</form>
																</div>
															</div>
														</div>
													
												</div>
											</section>
											<div class="card-footer">
											        <button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
											</div>

									</div>
								</form>

							</div>

						</div>
					</div>
					<!-- Row End -->

		</div>
		<!-- Content wrapper end -->

		<!-- App footer start -->
		<div class="app-footer">© Kaalagyaan 2022</div>
		<!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->


<div class="separator"> </div>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php $db->disconnect(); ?>