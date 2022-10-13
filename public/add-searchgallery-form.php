<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

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

       

				$result = $fn->validate_image($_FILES["product_image"]);
				// create random image file name
				$string = '0123456789';
				$file = preg_replace("/\s+/", "_", $_FILES['product_image']['name']);
				$menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

				// upload new image
				$upload = move_uploaded_file($_FILES['product_image']['tmp_name'], 'upload/searchgallery/' . $menu_image);

				// insert new data to menu table
				$upload_image = 'upload/searchgallery/' . $menu_image;
            
            $sql_query = "INSERT INTO searchgallery (image)VALUE('$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_searchgallery'] = "<section class='content-header'>
                                                <span class='text text-success'>Gallery Added Successfully</span> </section>";
            } else {
                $error['add_searchgallery'] = " <span class='text text-danger'>Failed</span>";
            }
            }
?>

    <?php echo isset($error['add_searchgallery']) ? $error['add_searchgallery'] : ''; ?>


<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

		<!-- Content wrapper start -->
		<div class="content-wrapper">

					<!-- Row Start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="card">
								
								<form name="add_searchgallery_form" method="post" enctype="multipart/form-data">
									<div class="card-body">
											<h3>Add Gallery</h3>
											<section>
												<h6 class="h-0 m-0">&nbsp;</h6>
												    <div class="row gutters">
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="border:1px solid;">
																<div class="field-wrapper" >
																	<div class="field-placeholder">Upload Image <span class="text-danger">*</span></div>

																		<div class="dz-message needsclick">
																			<input type="file" name="product_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="product_image" required/>
																			<img id="blah" src="#" alt="" style="margin:10px;"/>
																		</div>					
															    </div>
														    </div>
												    </div>
											</section>
		                            </div>

									<div class="card-footer">
												<button type="submit" class="btn btn-primary" name="btnAdd">Finish</button>
												<input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
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
                        .width(500)
                        .height(400);
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