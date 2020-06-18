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
              <form method="post" enctype='multipart/form-data' >
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="fees_session_id">Academic Year</label>
                          <select name="fees_session_id" id="fees_session_id" class="form-control">
                                <option disabled selected value>Choose the option</option>
                               
                                <?php foreach($session as $c ) { ?>
                                <option value="<?php echo $c->session_id; ?>" <?php if(!empty($row) && $c->session_id == $row->fees_session_id) { echo "selected"; } else { echo set_select('fees_session_id',$c->session_id); } ?> ><?php echo $c->session; ?></option>
                               <?php }?>                          
                           </select>
                         <div class="text-danger"> <?php echo form_error('fees_session_id'); ?>  </div>
                      </div>
                 </div>


                 <div class="col-md-6">
                       <div class="form-group">
                        <label for="fees_class_id">class</label>
                  
                         <select name="fees_class_id" id="fees_class_id" class="form-control">
                                <option disabled selected value>Choose the option</option>
                                <?php foreach($class as $c ) { ?>
                                <option value="<?php echo $c->class_id; ?>" <?php if(!empty($row) && $c->class_id == $row->fees_class_id) { echo "selected"; } else { echo set_select('fees_class_id',$c->class_id); } ?> ><?php echo $c->class; ?></option>
                               <?php }?>                          
                           </select>
                       
                         <div class="text-danger"> <?php echo form_error('fees_class_id'); ?>  </div>
                      </div>
                    </div>

                    <?php echo '&nbsp; &nbsp;'?><button type="button" onclick="Add()" class="btn btn-primary btn-sm" >Add Field +</button>
                <div class="col-md-12">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fees_type">Title</label>
                                
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fees_type">Amount</label>
                                
                                    </div>                                   
                                    </div>                               
                                </div>                       
                        </div>
                 </div>

                 <div class="col-md-12" id="add">

                 <?php if(!empty($fees_type)) { foreach($fees_type as $key=>$value){   ?>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                
                                        <input type="text" name="fees_type_title[]" <?php if(form_error('fees_type_title')){ echo 'style="border-color:red"'; } ?> value="<?php echo $key ?>"     class="form-control"  placeholder="Enter Title">
                                        
                                        <div class="text-danger"> <?php echo form_error('fees_type_title'); ?>  </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                    
                                
                                        <input type="text" name="fees_type_amount[]" <?php if(form_error('fees_type_amount')){ echo 'style="border-color:red"'; } ?> value="<?php echo $value ?>"     class="form-control"  placeholder="Enter Amount">
                
                                        <div class="text-danger"> <?php echo form_error('fees_type_amount'); ?>  </div>
                                    </div>                                   
                                  </div>                               
                        </div>                       
                       
                        <?php } }else {  ?>
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                
                                        <input type="text" name="fees_type_title[]" <?php if(form_error('fees_type_title')){ echo 'style="border-color:red"'; } ?> value=" "     class="form-control"  placeholder="Enter Title">
                                        
                                        <div class="text-danger"> <?php echo form_error('fees_type_title'); ?>  </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                    
                                
                                        <input type="text" name="fees_type_amount[]" <?php if(form_error('fees_type_amount')){ echo 'style="border-color:red"'; } ?> value=" "     class="form-control"  placeholder="Enter Amount">
                
                                        <div class="text-danger"> <?php echo form_error('fees_type_amount'); ?>  </div>
                                    </div>                                   
                                  </div>                               
                        </div>  
                        <?php } ?>





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

    <script>
function Add(){
  $('#add').append('<div class="row">'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        
                                
                                        '<input type="text" name="fees_type_title[]"  class="form-control"  placeholder="Enter Title">'+
                                        
                                       
                                    '</div>'+
                                  '</div>'+

                                  '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                    
                                
                                        '<input type="text" name="fees_type_amount[]"  class="form-control amount"   placeholder="Enter Amount">'+
                
                                        
                                    '</div>'   + 
                                    '<button type="button" class="btn btn-outline-danger" onclick="remove(this)"><i class="far fa-times-circle"></i></i></button>'+                               
                                  '</div>'   +   
                                                           
                                                     
                        '</div>');
                
}
function remove(e){
  $(e).parents().eq(1).remove();
}



function click(e){
console.log(e)
}
</script>




   