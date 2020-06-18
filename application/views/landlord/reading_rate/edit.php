<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
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
          <!-- left column -->
          <div class="col-md-12">
          <div class="card card-primary">
            <!--  <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>-->
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype='multipart/form-data'>
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="t_first_name">RATE</label>
                         <input type="number" name="rate" <?php if(form_error('rate')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('rate')){ echo set_value('rate'); }elseif(!empty($row->rate)){ echo $row->rate; } ?>"     class="form-control" id="rate" placeholder="Enter Rate">
                         <div class="text-danger"> <?php echo form_error('rate'); ?>  </div>
                      </div>
                    </div>

                 
                </div>
                 
                 
                <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>






          </div>
        </div>
      </div>
    </section>