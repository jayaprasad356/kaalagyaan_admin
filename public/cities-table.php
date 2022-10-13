
<div class="content-wrapper-scroll">

          <!-- Content wrapper start -->
    <div class="content-wrapper">
            
          
          <!-- Row start -->
            <!-- <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="stats-tile">
                  <div class="sale-icon">
                    <i class="icon-shopping-bag1"></i>
                  </div>
                  <div class="sale-details">
                    <h2>25</h2>
                    <p>Cities Added</p>
                  </div>
                  <div class="sale-graph">
                    <div id="sparklineLine1"></div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Cities</div>
                    <div class="graph-day-selection float-right" role="group">
                      <!-- <button type="button" class="btn active mr-3 ">Export to Excel</button> -->
                      <a href="add-city.php"
                        type="button"
                        class="btn active">Add City</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table products-table" class="table table-hover" data-toggle="table"  data-url="api-firebase/get-bootstrap-table-data.php?table=cities" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="false" data-show-columns="false" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="false" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                       
                            <thead>
                                <tr>
                                    
                                    <th  data-field="id" data-sortable="true">ID</th>
                                    <th data-field="name" data-sortable="true">City Name</th>
                                    <th data-field="state" data-sortable="true">State</th>
                                    <th data-field="pincode" data-sortable="true">Pincode</th>
                                    <th  data-field="operate" data-events="actionEvents">Action</th>
                                </tr>
                            </thead>
                           
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->
</div>      
        

<script>
    $('#seller_id').on('change', function() {
        $('#products_table').bootstrapTable('refresh');
    });
    $('#community').on('change', function() {
        $('#users_table').bootstrapTable('refresh');
    });

    function queryParams(p) {
        return {
            "category_id": $('#category_id').val(),
            "seller_id": $('#seller_id').val(),
            "community": $('#community').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>
    