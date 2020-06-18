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
            
              <form action="<?php echo school_url('export/print'); ?>" method="post" enctype='multipart/form-data'>
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="session">Session</label>
                        <select name="session" id="session" class="form-control">
                                <option disabled selected value>Choose the option</option>
                               
                                <?php foreach($session as $c ) { ?>
                                <option value="<?php echo $c->session_id; ?>" <?php if(!empty($row) && $c->session_id == $row->stu_session_id) { echo "selected"; } else { echo set_select('stu_class',$c->session_id); } ?> ><?php echo $c->session; ?></option>
                               <?php }?>                          
                           </select>
                         <div class="text-danger"> <?php echo form_error('session'); ?>  </div>
                      </div>
                    </div>
               
                </div>
                 
                 
                 
             

                <div class="">
                  <button type="submit" name="caste_description" value="caste_description" class="btn btn-primary"> print caste description</button>
                  <button type="submit" name="agewise_caste_description" value="caste_description" class="btn btn-primary"> print age wise caste description</button>
                </div>
              </form>
            </div>






          </div>
        </div>
      </div>
    </section>

