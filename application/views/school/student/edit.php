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
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="student_name">Student Name</label>
                         <input type="text" name="student_name" <?php if(form_error('student_name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('student_name')){ echo set_value('student_name'); }elseif(!empty($row->student_name)){ echo $row->student_name; } ?>"     class="form-control" id="student_name" placeholder="Enter Student Name">
                        
                         <div class="text-danger"> <?php echo form_error('student_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="stu_class">class</label>
                  
                         <select name="stu_class" id="stu_class" class="form-control">
                                <option disabled selected value>Choose the option</option>
                                <?php foreach($class as $c ) { ?>
                                <option value="<?php echo $c->class_id; ?>" <?php if(!empty($row) && $c->class_id == $row->stu_class) { echo "selected"; } else { echo set_select('stu_class',$c->class_id); } ?> ><?php echo $c->class; ?></option>
                               <?php }?>                          
                           </select>
                       
                         <div class="text-danger"> <?php echo form_error('stu_class'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="stu_father_name">Father Name</label>
                         <input type="text" name="stu_father_name"  <?php if(form_error('stu_father_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_father_name')){ echo set_value('stu_father_name'); }elseif(!empty($row->stu_father_name)){ echo $row->stu_father_name; } ?>"     class="form-control" id="stu_father_name" placeholder="Enter Father Name">
                         <div class="text-danger"> <?php echo form_error('stu_father_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="stu_mother_name">Mother Name</label>
                         <input type="text"  name="stu_mother_name"  <?php if(form_error('stu_mother_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_mother_name')){ echo set_value('stu_mother_name'); }elseif(!empty($row->stu_mother_name)){ echo $row->stu_mother_name; } ?>"   class="form-control" id="stu_mother_name" placeholder="Enter Mother Name">
                         <div class="text-danger"> <?php echo form_error('stu_mother_name'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_dob">Date of birth</label>
                          <input type="date" name="stu_dob" onchange="calculateAge(this.value)" <?php if(form_error('stu_dob')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('stu_dob')){ echo set_value('stu_dob'); }elseif(!empty($row->stu_dob)){ echo $row->stu_dob; } ?>"    class="form-control" id="stu_dob" placeholder="Date of birth">
                     
                          <div class="text-danger"> <?php echo form_error('stu_dob'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6" style='display:none;' id="show_age" >
                       <div class="form-group">
                          <label for="stu_age">Age</label>
                          <input type="text" name="stu_agee" disabled <?php if(form_error('stu_age')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('stu_age')){ echo set_value('stu_age'); }elseif(!empty($row->stu_age)){ echo $row->stu_age; } ?>"  class="form-control" id="stu_age" placeholder="Age">
                          <input type="hidden" name="stu_age" id="stu_age_show">
                          <div class="text-danger" id="stu_age">  </div>
                          <div class="text-danger"> <?php echo form_error('stu_age'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_gender">Gender </label>
                          <select name="stu_gender" id="stu_gender" class="form-control">
                                <option disabled selected value>Choose the option</option>
                                <option value="male" <?php if(!empty($row) && $row->stu_gender == 'male') { echo "selected"; } else { echo set_select('stu_gender','male'); } ?> >Male</option>
                                <option value="female" <?php if(!empty($row) && $row->stu_gender == 'female') { echo "selected"; } else { echo set_select('stu_gender','female'); } ?>>Female</option>                               
                           </select>
                          <div class="text-danger"> <?php echo form_error('stu_gender'); ?>  </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_phone">Phone</label>
                          <input type="number" name="stu_phone"  <?php if(form_error('stu_phone')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_phone')){ echo set_value('stu_phone'); }elseif(!empty($row->stu_phone)){ echo $row->stu_phone; } ?>"   class="form-control" id="stu_phone" placeholder="phone">
                          <div class="text-danger"> <?php echo form_error('stu_phone'); ?>  </div>
                       </div>
                    </div>
                    
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_aadhar">Aadhar</label>
                          <input type="number" name="stu_aadhar"  <?php if(form_error('stu_aadhar')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_aadhar')){ echo set_value('stu_aadhar'); }elseif(!empty($row->stu_aadhar)){ echo $row->stu_aadhar; } ?>"   class="form-control" id="stu_aadhar" placeholder="Aadhar">
                          <div class="text-danger"> <?php echo form_error('stu_aadhar'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_address">Address</label>
                          <input type="text" name="stu_address"  <?php if(form_error('stu_address')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_address')){ echo set_value('stu_address'); }elseif(!empty($row->stu_address)){ echo $row->stu_address; } ?>"   class="form-control" id="stu_address" placeholder="Address">
                          <div class="text-danger"> <?php echo form_error('stu_address'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_caste">Caste</label>
                          <select name="stu_caste" id="stu_caste" class="form-control">
                              <option disabled selected value >Choose the option</option>
                                <option value="GEN"  <?php if(!empty($row) && $row->stu_caste == 'GEN') { echo "selected"; } else { echo set_select('stu_caste','GEN'); } ?>>GEN</option>
                                <option value="SC"  <?php if(!empty($row) && $row->stu_caste == 'SC') { echo "selected"; } else { echo set_select('stu_caste','SC'); } ?>>SC</option>   
                                <option value="ST"  <?php if(!empty($row) && $row->stu_caste == 'ST') { echo "selected"; } else { echo set_select('stu_caste','ST'); } ?>>ST</option> 
                                <option value="OBC"  <?php if(!empty($row) && $row->stu_caste == 'OBC') { echo "selected"; } else { echo set_select('stu_caste','OBC'); } ?>>OBC</option>                             
                           </select>
                          
                          <div class="text-danger"> <?php echo form_error('stu_caste'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_scholar_number">Scholar number</label>
                          <input type="text" name="stu_scholar_number"  <?php if(form_error('stu_scholar_number')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_scholar_number')){ echo set_value('stu_scholar_number'); }elseif(!empty($row->stu_scholar_number)){ echo $row->stu_scholar_number; } ?>"   class="form-control" id="stu_scholar_number" placeholder="Scholar number">
                          <div class="text-danger"> <?php echo form_error('stu_scholar_number'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_sssmid">SSSM ID</label>
                          <input type="text" name="stu_sssmid"  <?php if(form_error('stu_sssmid')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_sssmid')){ echo set_value('stu_sssmid'); }elseif(!empty($row->stu_sssmid)){ echo $row->stu_sssmid; } ?>"   class="form-control" id="stu_sssmid" placeholder="sssm id">
                          <div class="text-danger"> <?php echo form_error('stu_sssmid'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_has_bpl_card">Has BPL Card ?</label>
                          <select name="stu_has_bpl_card" id="stu_has_bpl_card" onchange="get_bplcard(this.value)"  class="form-control" >
                                <option disabled selected value >Choose the option</option>
                                <option value="yes" <?php if(!empty($row) && $row->stu_has_bpl_card == 'yes') { echo "selected"; } else { echo set_select('stu_has_bpl_card','yes'); } ?>>Yes</option>
                                <option value="no" <?php if(!empty($row) && $row->stu_has_bpl_card == 'no') { echo "selected"; } else { echo set_select('stu_has_bpl_card','no'); } ?>>No</option>   
                                                            
                           </select>
                          
                          <div class="text-danger"> <?php echo form_error('stu_has_bpl_card'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6" style='display:none;' id='stu_bpl__card_number'>
                       <div class="form-group">
                          <label for="stu_bpl__card_number">BPL Card number</label>
                          <input type="text" name="stu_bpl__card_number"  <?php if(form_error('stu_bpl__card_number')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_bpl__card_number')){ echo set_value('stu_bpl__card_number'); }elseif(!empty($row->stu_bpl__card_number)){ echo $row->stu_bpl__card_number; } ?>"   class="form-control"  placeholder="BPL Card number">
                          <div class="text-danger"> <?php echo form_error('stu_bpl__card_number'); ?>  </div>
                       </div>
                    </div>

                    
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_has_labour_card">Has Labour Card ?</label>
                          <select name="stu_has_labour_card" onchange="get_labourcard(this.value)"  id="stu_has_labour_card" class="form-control">
                                <option disabled selected value >Choose the option</option>
                                <option value="yes" <?php if(!empty($row) && $row->stu_has_labour_card == 'yes') { echo "selected"; } else { echo set_select('stu_has_labour_card','yes'); } ?>>Yes</option>
                                <option value="no" <?php if(!empty($row) && $row->stu_has_labour_card == 'no') { echo "selected"; } else { echo set_select('stu_has_labour_card','no'); } ?>>No</option>   
                                                            
                           </select>
                         
                          <div class="text-danger"> <?php echo form_error('stu_has_labour_card'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6" style='display:none;' id="stu_labour_card_number" >
                       <div class="form-group">
                          <label for="stu_labour_card_number">Labour Card number</label>
                          <input type="text" name="stu_labour_card_number"  <?php if(form_error('stu_labour_card_number')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_labour_card_number')){ echo set_value('stu_labour_card_number'); }elseif(!empty($row->stu_labour_card_number)){ echo $row->stu_labour_card_number; } ?>"   class="form-control" placeholder="Labour card number">
                          
                          <div class="text-danger"> <?php echo form_error('stu_labour_card_number'); ?>  </div>
                       </div>
                    </div>
                    
                    <div class="col-md-6" >
                       <div class="form-group">
                          <label for="stu_is_disabled">Is Disable ?</label>
                          <select name="stu_is_disabled" id="stu_is_disabled" onchange="get_isdisable(this.value)" class="form-control">
                               <option disabled selected value >Choose the option</option>
                                <option value="yes" <?php if(!empty($row) && $row->stu_is_disabled == 'yes') { echo "selected"; } else { echo set_select('stu_is_disabled','yes'); } ?>>Yes</option>
                                <option value="no" <?php if(!empty($row) && $row->stu_is_disabled == 'no') { echo "selected"; } else { echo set_select('stu_is_disabled','no'); } ?>>No</option>   
                                                            
                           </select>
                          
                          <div class="text-danger"> <?php echo form_error('stu_is_disabled'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6" style='display:none;' id="stu_type_disabled">
                       <div class="form-group">
                          <label for="stu_type_disabled">Type of Disability</label>
                          <input type="text" name="stu_type_disabled"  <?php if(form_error('stu_type_disabled')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_type_disabled')){ echo set_value('stu_type_disabled'); }elseif(!empty($row->stu_type_disabled)){ echo $row->stu_type_disabled; } ?>"   class="form-control"  placeholder="Disability type">
                          
                          
                          <div class="text-danger"> <?php echo form_error('stu_type_disabled'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_bank_name">Bank name</label>
                          <input type="text" name="stu_bank_name"  <?php if(form_error('stu_bank_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_bank_name')){ echo set_value('stu_bank_name'); }elseif(!empty($row->stu_bank_name)){ echo $row->stu_bank_name; } ?>"   class="form-control" id="stu_bank_name" placeholder="Bank name">
                          <div class="text-danger"> <?php echo form_error('stu_bank_name'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_account_number">Bank Account number</label>
                          <input type="text" name="stu_account_number"  <?php if(form_error('stu_account_number')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_account_number')){ echo set_value('stu_account_number'); }elseif(!empty($row->stu_account_number)){ echo $row->stu_account_number; } ?>"   class="form-control" id="stu_account_number" placeholder="Account number">
                          <div class="text-danger"> <?php echo form_error('stu_account_number'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_ifsc_code">Bank IFSC code</label>
                          <input type="text" name="stu_ifsc_code"  <?php if(form_error('stu_ifsc_code')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_ifsc_code')){ echo set_value('stu_ifsc_code'); }elseif(!empty($row->stu_ifsc_code)){ echo $row->stu_ifsc_code; } ?>"   class="form-control" id="stu_ifsc_code" placeholder="IFSC Code">
                          <div class="text-danger"> <?php echo form_error('stu_ifsc_code'); ?>  </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="stu_admission_date">Admission date</label>
                          <input type="date" name="stu_admission_date"  <?php if(form_error('stu_admission_date')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('stu_admission_date')){ echo set_value('stu_admission_date'); }elseif(!empty($row->stu_admission_date)){ echo $row->stu_admission_date; } ?>"   class="form-control" id="stu_admission_date" placeholder="Admission date">
                          <div class="text-danger"> <?php echo form_error('stu_admission_date'); ?>  </div>
                       </div>
                    </div>



                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>
                          
                              
                                    <input type="file" name="t_image"  class="form-control" id="t_image">
                                   
                                    <div class="text-danger"> <?php// echo form_error('t_image'); ?>  </div>
                                                 
                           
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


   <script>
   $(document).ready(function(){
    
      var dob = document.getElementById("stu_dob");
      var bpl_card = document.getElementById("stu_has_bpl_card");
      var labour_card = document.getElementById("stu_has_labour_card");
      var disability = document.getElementById("stu_is_disabled");
      if(dob){
 
         $("#show_age").show();
      }
      if(disability.value =='yes'){
         $("#stu_type_disabled").show();
      }
      if(labour_card.value =='yes'){
         $("#stu_labour_card_number").show();
      }
  
      if(bpl_card.value =='yes'){
         $("#stu_bpl__card_number").show();
      }
    
  });
   
  

    function get_bplcard(e){
       if(e=='yes'){
            $("#stu_bpl__card_number").show();
       }else{
         $("#stu_bpl__card_number").hide();
       }
 
	 
}
function get_labourcard(e){
       if(e=='yes'){
            $("#stu_labour_card_number").show();
       }else{
         $("#stu_labour_card_number").hide();
       }
 
	 
}

function get_isdisable(e){
       if(e=='yes'){
            $("#stu_type_disabled").show();
       }else{
         $("#stu_type_disabled").hide();
       }
 
	 
}

function calculateAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
   // document.getElementById
   $("#show_age").show();
   
   $('#stu_age_show').val(age); 
    $('#stu_age').val(age); 
    console.log(age)
   // return age;
}
   </script>