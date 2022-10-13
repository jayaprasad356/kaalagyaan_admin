<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $title = $db->escapeString(($_POST['title']));
		$description = $db->escapeString(($_POST['description']));

        $category = $db->escapeString(($_POST['category']));

		  // get image info
		  $menu_image = $db->escapeString($_FILES['product_image']['name']);
		  $image_error = $db->escapeString($_FILES['product_image']['error']);
		  $image_type = $db->escapeString($_FILES['product_image']['type']);
  
		  // create array variable to handle error
		  $error = array();
			  // common image file extensions
		  $allowedExts = array("gif", "jpeg", "jpg", "png");
  
		  // get image file extension
		  error_reporting(E_ERROR | E_PARSE);
		  $extension = end(explode(".", $_FILES["product_image"]["name"]));

       
        
        
        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
		if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
		  
        if (empty($category)) {
            $error['category'] = " <span class='label label-danger'>Required!</span>";
        }
      
       
       
       if (!empty($title) && !empty($description) && !empty($category) ) {

				$result = $fn->validate_image($_FILES["product_image"]);
				// create random image file name
				$string = '0123456789';
				$file = preg_replace("/\s+/", "_", $_FILES['product_image']['name']);
				$menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

				// upload new image
				$upload = move_uploaded_file($_FILES['product_image']['tmp_name'], 'upload/about/' . $menu_image);

				// insert new data to menu table
				$upload_image = 'upload/about/' . $menu_image;
            
            $sql_query = "INSERT INTO about (title,category_id,description,image)VALUE('$title','$category','$description','$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_about'] = "<section class='content-header'>
                                                <span class='text text-success'>About Information Added Successfully</span> </section>";
            } else {
                $error['add_homebanner'] = " <span class='text text-danger'>Failed</span>";
            }
            }
        }
?>

    <?php echo isset($error['add_about']) ? $error['add_about'] : ''; ?>


<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

		<!-- Content wrapper start -->
		<div class="content-wrapper">

					<!-- Row Start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="card">
								
								<form name="add_about_form" method="post" enctype="multipart/form-data">
									<div class="card-body">
											<h3>Add About Information</h3>
											<section>
												<h6 class="h-0 m-0">&nbsp;</h6>
												<div class="row gutters">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
														<div class="field-wrapper">
															<input type="text" placeholder="Enter  Name" name="title" required>
															<div class="field-placeholder">Title<i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?></div>
														</div>

													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
														<div class="field-wrapper">
															
															<select id='category' name="category" class="select-single js-states" title="Select Product Category" data-live-search="true" required>
																<option value="">select</option>
																	<?php
																	$sql = "SELECT id,name FROM `categories`";
																	$db->sql($sql);
																	$result = $db->getResult();
																	foreach ($result as $value) {
																	?>
																		<option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
																<?php } ?>
															</select>
															<div class="field-placeholder">Product Category <span class="text-danger">*</span></div>
														</div>

													</div>
												
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														
														<div class="field-wrapper mt-3">
														<textarea name="description" id="description" class="form-control" rows="3"></textarea>
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
																			<input type="file" name="product_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="product_image" required/>
																			<img id="blah" src="#" alt="" />
																		</div>

																	</form>
																</div>
															</div>
														</div>
													
												</div>
											</section>
									<div class="card-footer">
												<button type="submit" class="btn btn-primary" name="btnAdd">Finish</button>
												<input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_about_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            description: "required",
            category:"required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
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

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>