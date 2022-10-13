<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

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
            
            $sql_query = "INSERT INTO cities (name,state,pincode) VALUES ('$name','$state','$pincode')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_city'] = "<section class='content-header'>
                                                <span class='text text-success'>City Added Successfully</span> </section>";
            } else {
                $error['add_city'] = " <span class='text text-danger'>Failed</span>";
            }
            }
        }
?>

    <?php echo isset($error['add_city']) ? $error['add_city'] : ''; ?>


<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row Start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    
                    <div class="card">                            
                            <form id="add_city_form" method="post" enctype="multipart/form-data">
                              <div class="card-body">
                                    <h3>Add City Information</h3><br>
                                    <section>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                                
                                                <div class="field-wrapper">
                                                    <input type="text" placeholder="Enter City Name" name="name" required >
                                                    <div class="field-placeholder">City Name <span class="text-danger">*</span></div>
                                                </div>

                                            </div>
                                        <div class="row gutters">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                                                
                                                <div class="field-wrapper">
                                                    <input type="text" placeholder="Enter State Name" name="state" required>
                                                    <div class="field-placeholder"> State <span class="text-danger">*</span></div>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                                                
                                                <div class="field-wrapper">
                                                    <input type="text" placeholder="Enter Pincode" name="pincode" required>
                                                    <div class="field-placeholder"> Pincode <span class="text-danger">*</span></div>
                                                    
                                                </div>

                                            </div>
                                        
                                        </div>
                                    </section>

                                    <div class="box-footer">
                                            <button type="submit" class="btn btn-primary" name="btnAdd">Finish</button>
                                            <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
									</div>
                                
                               </div>
                            </form>

                        </div>
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
    $('#add_city_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            state="required",
            pincode="pincode",
         
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