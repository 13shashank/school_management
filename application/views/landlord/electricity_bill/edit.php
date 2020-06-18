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
                        <label for="t_first_name">Name</label>

                              <select  name="ebill_tenant_id" class="form-control">
                              <?php foreach($tenant as $t) { ?>
                              <option value="<?php echo $t->t_id; ?>"><?php echo $t->t_first_name; echo '&nbsp'; echo $t->t_last_name; ?></option>
                              <?php } ?>
                            </select>
                            <div class="text-danger"> <?php echo form_error('ebill_tenant_id'); ?>  </div>

                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="ebill_present_reading">Present Reading</label>
                         <input type="number" name="ebill_present_reading"  <?php if(form_error('ebill_present_reading')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('ebill_present_reading')){ echo set_value('ebill_present_reading'); }elseif(!empty($row->ebill_present_reading)){ echo $row->ebill_present_reading; } ?>"     class="form-control" id="ebill_present_reading" placeholder="Enter Present Reading">
                         <div class="text-danger"> <?php echo form_error('ebill_present_reading'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="ebill_last_reading">Last Reading</label>
                         <input type="ebill_last_reading"  name="ebill_last_reading"  <?php if(form_error('ebill_last_reading')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('ebill_last_reading')){ echo set_value('ebill_last_reading'); }elseif(!empty($row->ebill_last_reading)){ echo $row->ebill_last_reading; } ?>"   class="form-control" id="ebill_last_reading" placeholder="Enter Last Reading">
                         <div class="text-danger"> <?php echo form_error('ebill_last_reading'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="ebill_date">Bill Date</label>
                          <input type="date" name="ebill_date" <?php if(form_error('ebill_date')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('ebill_date')){ echo set_value('ebill_date'); }elseif(!empty($row->ebill_date)){ echo $row->ebill_date; } ?>"    class="form-control" id="ebill_date" placeholder="Bill date">
                          <div class="text-danger"> <?php echo form_error('ebill_date'); ?>  </div>
                       </div>
                    </div>
                  
                  <!--  <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>

                                    <input type="file" name="t_image"  class="form-control" id="t_image">
                                   
                                    <div class="text-danger"> <?php //echo form_error('t_image'); ?>  </div>
                                                 
                           
                        </div>
                        
                    </div>-->


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