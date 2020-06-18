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
              <form method="post">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="school_name">School Name</label>
                         <input type="text" name="school_name" <?php if(form_error('school_name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('school_name')){ echo set_value('school_name'); }elseif(!empty($row->school_name)){ echo $row->school_name; } ?>"     class="form-control" id="school_name" placeholder="Enter School Name">
                         <div class="text-danger"> <?php echo form_error('school_name'); ?>  </div>
                      </div>
                    </div>

                   
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="school_email">Email address</label>
                         <input type="email"  name="school_email"  <?php if(form_error('school_email')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('school_email')){ echo set_value('school_email'); }elseif(!empty($row->school_email)){ echo $row->school_email; } ?>"   class="form-control" id="school_email" placeholder="Enter email">
                         <div class="text-danger"> <?php echo form_error('school_email'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="school_password">Password</label>
                          <input type="password" name="school_password" <?php if(form_error('school_password')){ echo 'style="border-color:red"'; } ?>  class="form-control" id="school_password" placeholder="password">
                          <div class="text-danger"> <?php echo form_error('school_password'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="school_address">Address</label>
                          <input type="text" name="school_address"  <?php if(form_error('school_address')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('school_address')){ echo set_value('school_address'); }elseif(!empty($row->school_address)){ echo $row->school_address; } ?>"   class="form-control" id="school_address" placeholder="address">
                          <div class="text-danger"> <?php echo form_error('school_address'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="school_phone">Phone</label>
                          <input type="number" name="school_phone"  <?php if(form_error('school_phone')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('school_phone')){ echo set_value('school_phone'); }elseif(!empty($row->school_phone)){ echo $row->school_phone; } ?>"   class="form-control" id="school_phone" placeholder="phone">
                          <div class="text-danger"> <?php echo form_error('school_phone'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="school_rc_number">Registration number</label>
                         <input type="text" name="school_rc_number"  <?php if(form_error('school_rc_number')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('school_rc_number')){ echo set_value('school_rc_number'); }elseif(!empty($row->school_rc_number)){ echo $row->school_rc_number; } ?>"     class="form-control" id="school_rc_number" placeholder="Enter Registration number">
                         <div class="text-danger"> <?php echo form_error('school_rc_number'); ?>  </div>
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="school_dise_code">Dise Code</label>
                         <input type="text" name="school_dise_code"  <?php if(form_error('school_dise_code')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('school_dise_code')){ echo set_value('school_dise_code'); }elseif(!empty($row->school_dise_code)){ echo $row->school_dise_code; } ?>"     class="form-control" id="school_dise_code" placeholder="Enter Dise Code">
                         <div class="text-danger"> <?php echo form_error('school_dise_code'); ?>  </div>
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