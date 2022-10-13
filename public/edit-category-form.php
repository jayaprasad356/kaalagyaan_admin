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
       
        
        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
      
       
       
       if (!empty($name) ) {
            
            $sql_query = "UPDATE  categories SET name='$name' WHERE id=$ID";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['update_category'] = "<section class='content-header'>
                                                <span class='text text-success'>Category Updated Successfully</span> </section>";
            } else {
                $error['update_category'] = " <span class='text text-danger'>Failed</span>";
            }
            }
        }
// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM categories WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "categories.php";
	</script>
<?php } ?>

    <?php echo isset($error['update_category']) ? $error['update_category'] : ''; ?>


				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row Start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
								<div class="card">
									<div class="card-header">
										<div class="card-title">Home Page</div>
									</div>										
										<form  name="edit_category_form" method="post" enctype="multipart/form-data">
										    <div class="card-body">

												<h3>Edit Category</h3>
												<section>
													<h6 class="h-0 m-0">&nbsp;</h6>
													<div class="row gutters">
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
															
															<div class="field-wrapper">
																<input type="text" placeholder="Enter Category Name" name="name" value="<?php echo $res[0]['name']; ?>">
																<div class="field-placeholder">Category Name  <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?></div>
																<p>Ex: Restaurent,Offices,theatres etc..</p>
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