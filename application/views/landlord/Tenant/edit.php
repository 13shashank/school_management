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
                        <label for="t_first_name">First Name</label>
                         <input type="text" name="t_first_name" <?php if(form_error('t_first_name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('t_first_name')){ echo set_value('t_first_name'); }elseif(!empty($row->t_first_name)){ echo $row->t_first_name; } ?>"     class="form-control" id="t_first_name" placeholder="Enter First Name">
                         <div class="text-danger"> <?php echo form_error('t_first_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="t_last_name">Last Name</label>
                         <input type="text" name="t_last_name"  <?php if(form_error('t_last_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('t_last_name')){ echo set_value('t_last_name'); }elseif(!empty($row->t_last_name)){ echo $row->t_last_name; } ?>"     class="form-control" id="t_last_name" placeholder="Enter Last Name">
                         <div class="text-danger"> <?php echo form_error('t_last_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                         <input type="t_email"  name="t_email"  <?php if(form_error('t_email')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('t_email')){ echo set_value('t_email'); }elseif(!empty($row->t_email)){ echo $row->t_email; } ?>"   class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                         <div class="text-danger"> <?php echo form_error('t_email'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="t_start_date">Start_date</label>
                          <input type="date" name="t_start_date" <?php if(form_error('t_start_date')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('t_start_date')){ echo set_value('t_start_date'); }elseif(!empty($row->t_start_date)){ echo $row->t_start_date; } ?>"    class="form-control" id="t_start_date" placeholder="start date">
                          <div class="text-danger"> <?php echo form_error('t_start_date'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="t_address">Address</label>
                          <input type="text" name="t_address"  <?php if(form_error('t_address')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('t_address')){ echo set_value('t_address'); }elseif(!empty($row->t_address)){ echo $row->t_address; } ?>"   class="form-control" id="t_address" placeholder="Address">
                          <div class="text-danger"> <?php echo form_error('t_address'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="t_phone">Phone</label>
                          <input type="number" name="t_phone"  <?php if(form_error('t_phone')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('t_phone')){ echo set_value('t_phone'); }elseif(!empty($row->t_phone)){ echo $row->t_phone; } ?>"   class="form-control" id="t_phone" placeholder="phone">
                          <div class="text-danger"> <?php echo form_error('t_phone'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="t_phone">Rent</label>
                          <input type="number" name="t_rent"  <?php if(form_error('t_rent')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('t_rent')){ echo set_value('t_rent'); }elseif(!empty($row->t_rent)){ echo $row->t_rent; } ?>"   class="form-control" id="t_rent" placeholder="Rent">
                          <div class="text-danger"> <?php echo form_error('t_rent'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>
                          
                              
                                    <input type="file" name="t_image"  class="form-control" id="t_image">
                                   
                                    <div class="text-danger"> <?php echo form_error('t_image'); ?>  </div>
                                                 
                           
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