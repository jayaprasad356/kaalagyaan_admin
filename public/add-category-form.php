<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $name = $db->escapeString(($_POST['name']));
       
        
        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
      
       
       
       if (!empty($name) ) {
            
            $sql_query = "INSERT INTO categories (name)VALUE('$name')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_category'] = "<section class='content-header'>
                                                <span class='text text-success'>Category Added Successfully</span> </section>";
            } else {
                $error['add_staff'] = " <span class='text text-danger'>Failed</span>";
            }
            }
        }
?>

    <?php echo isset($error['add_category']) ? $error['add_category'] : ''; ?>


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
                                    <form  name="add_category_form" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                                <h3>Add Category</h3>
                                                <section>
                                                    <h6 class="h-0 m-0">&nbsp;</h6>
                                                    <div class="row gutters">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            
                                                            <div class="field-wrapper">
                                                                <input type="text" placeholder="Enter Category Name" name="name" required>
                                                                <div class="field-placeholder">Category Name  <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?></div>
                                                                <p>Ex: Restaurent,Offices,theatres etc..</p>
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
    $('#add_staff_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
         
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>


<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>