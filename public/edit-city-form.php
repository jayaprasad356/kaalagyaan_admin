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

      
	$name = $db->escapeString(($_POST['name']));
	$state = $db->escapeString(($_POST['state']));
	$pincode = $db->escapeString(($_POST['pincode']));

	
	
	if (empty($name)) {
		$error['name'] = " <span class='label label-danger'>Required!</span>";
	}
	  
	if (empty($state)) {
		$error['state'] = " <span class='label label-danger'>Required!</span>";
	}
	  
	if (empty($pincode)) {
		$error['pincode'] = " <span class='label label-danger'>Required!</span>";
	}
  
   
   
   if (!empty($name) && !empty($state) && !empty($pincode)  ) {
		
		$sql_query = "UPDATE cities SET name='$name',state='$state',pincode='$pincode' WHERE id=$ID";
		$db->sql($sql_query);
		$result = $db->getResult();
		if (!empty($result)) {
			$result = 0;
		} else {
			$result = 1;
		}

		if ($result == 1) {
			
			$error['update_city'] = "<section class='content-header'>
											<span class='text text-success'>City Updated Successfully</span> </section>";
		} else {
			$error['update_city'] = " <span class='text text-danger'>Failed</span>";
		}
		}
	}
// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM cities WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "cities.php";
	</script>
<?php } ?>

    <?php echo isset($error['update_city']) ? $error['update_city'] : ''; ?>


				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row Start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
								<div class="card">									
										<form  name="edit_city_form" method="post" enctype="multipart/form-data">
										    <div class="card-body">

												<h3>Edit Category</h3>
												<section>
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
															
															<div class="field-wrapper">
																<input type="text" placeholder="Enter City Name" name="name" value="<?php echo $res[0]['name']; ?>" >
																<div class="field-placeholder">City Name <span class="text-danger">*</span></div>
															</div>

														</div>
													<div class="row gutters">
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
															
															<div class="field-wrapper">
																<input type="text" placeholder="Enter State Name" name="state" value="<?php echo $res[0]['state']; ?>">
																<div class="field-placeholder"> State <span class="text-danger">*</span></div>
																
															</div>

														</div>
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
															
															<div class="field-wrapper">
																<input type="text" placeholder="Enter Pincode" name="pincode" value="<?php echo $res[0]['pincode']; ?>">
																<div class="field-placeholder"> Pincode <span class="text-danger">*</span></div>
																
															</div>

														</div>
													
													</div>
                                                </section>

                                            </div>
                                            <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
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
<?php $db->disconnect(); ?>