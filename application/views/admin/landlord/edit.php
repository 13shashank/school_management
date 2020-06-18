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
                        <label for="first_name">First Name</label>
                         <input type="text" name="first_name" <?php if(form_error('first_name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('first_name')){ echo set_value('first_name'); }elseif(!empty($row->first_name)){ echo $row->first_name; } ?>"     class="form-control" id="first_name" placeholder="Enter First Name">
                         <div class="text-danger"> <?php echo form_error('first_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="last_name">Last Name</label>
                         <input type="text" name="last_name"  <?php if(form_error('last_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('last_name')){ echo set_value('last_name'); }elseif(!empty($row->last_name)){ echo $row->last_name; } ?>"     class="form-control" id="last_name" placeholder="Enter Last Name">
                         <div class="text-danger"> <?php echo form_error('last_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                         <input type="email"  name="email"  <?php if(form_error('email')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('email')){ echo set_value('email'); }elseif(!empty($row->email)){ echo $row->email; } ?>"   class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                         <div class="text-danger"> <?php echo form_error('email'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" <?php if(form_error('password')){ echo 'style="border-color:red"'; } ?>  class="form-control" id="exampleInputPassword1" placeholder="Password">
                          <div class="text-danger"> <?php echo form_error('password'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address"  <?php if(form_error('address')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('address')){ echo set_value('address'); }elseif(!empty($row->address)){ echo $row->address; } ?>"   class="form-control" id="address" placeholder="Address">
                          <div class="text-danger"> <?php echo form_error('address'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" name="phone"  <?php if(form_error('phone')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('phone')){ echo set_value('phone'); }elseif(!empty($row->phone)){ echo $row->phone; } ?>"   class="form-control" id="phone" placeholder="phone">
                          <div class="text-danger"> <?php echo form_error('phone'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image"  class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <div class="text-danger"> <?php echo form_error('image'); ?>  </div>
                                </div>                     
                            </div>
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