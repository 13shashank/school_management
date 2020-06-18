

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
				if(!empty($this->session->flashdata('alert'))){ ?>
				<span id="flash-messages" width="20px"><?php	print_r($this->session->flashdata('alert'));  ?> </span> <?php } ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="text-right">
          <a class="btn btn-primary" href="<?php echo landlord_url('electricity_bill/edit');?>">Add</a>
          </div>
               
              </div>
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="ebill-datatable">
                  <thead>
                    <tr>
                      <th >Tenant Name</th>
                      <th>Present Reading</th>
                      <th>Last Reading</th>
                      <th>Final Reading</th>
                      <th>Rate Per reading</th>
                      <th>Electricity bill</th>
                      <th>Bill Date</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>




          </div>
        </div>
    </div>
</section>

