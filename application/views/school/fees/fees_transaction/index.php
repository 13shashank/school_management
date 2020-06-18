
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



    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Striped Full Width Table</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body p-0">

              <!-- search start -->
                 <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12">
                    <fieldset class="scheduler-border" >
                        <legend  class="scheduler-border">Search:</legend>
                    <form class="form-inline" action="<?php echo school_url('fees/fees_transaction')?>" role="form" id="searchform" method="post">
                    <div class="form-group">
                        <label for="email">Academic Year</label>
                        <select name="session" id="session" class="form-control mr-5">
                                <option disabled selected value>Choose the option</option>
                               
                                <?php foreach($session as $c ) { ?>
                                <option value="<?php echo $c->session_id; ?>" <?php if(!empty($row) && $c->session_id == $row->stu_session_id) { echo "selected"; } else { echo set_select('stu_class',$c->session_id); } ?> ><?php echo $c->session; ?></option>
                               <?php }?>                          
                           </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tran_scholar_number"> Scholar number </label>
                        <input type="text" class="form-control mr-5" id="tran_scholar_number" name="tran_scholar_number" >
                    </div>
                    
                    <div class="form-group">
                        <label for="tran_class_id"> Class </label>
                        <select name="tran_class_id" id="tran_class_id" class="form-control mr-5">
                                <option disabled selected value>Choose the option</option>
                                <?php foreach($class as $c ) { ?>
                                <option value="<?php echo $c->class_id; ?>" <?php if(!empty($row) && $c->class_id == $row->stu_class) { echo "selected"; } else { echo set_select('stu_class',$c->class_id); } ?> ><?php echo $c->class; ?></option>
                               <?php }?>                          
                           </select>
                    </div>
                    
                    <button type="submit" name="find" class="btn btn-success mr-5" id="find" > Find </button>

                    <a href="<?php echo school_url('fees/fees_transaction');?>" class="btn btn-danger"  > Clear </a>
                    </form>
                    </fieldset>

                    </div>
                    </div>
<!-- search end -->
<!-- table start -->

 
        <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12">
                     <fieldset class="scheduler-border" >
                        <legend  class="scheduler-border">Table:</legend>
                        <table class="table table-striped" >
                  <thead>
                    <tr>
                      <!-- <th >Image</th> -->
                      <th>Scholar number</th>
                      <th>Student Name</th>  
                      <th>Class</th>
                      <th>Total Amount</th>
                      <th>Paid Amount</th>
                      <th>Due Balance</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  if($records) {  foreach ($records as $record):   ?>
                  <tr>
                 
                  <td><?php echo $record->tran_scholar_number?></td>
                  <td><?php echo $record->student_name?></td>
                  <td><?php echo $record->class?></td>
                  <td><?php echo $record->tran_fees_total_amount?></td>
                  <td><?php echo $record->tran_fees_paid_amount?></td>
                  <td><?php echo $record->tran_fees_due_amount?></td>
                
                  <td>   
                        <a href="<?php echo site_url('school/fees/edit/'.$record->transaction_id)  ?>"> <i class="fas fa-edit"></i> </a> 
                         <a href="javascript:void(0)"  onclick="return deleteRecord('user','user/delete/<?php echo $record->transaction_id ; ?>'); "> <i class="fas fa-trash"></i></a>  
                  </td>

                  </tr>


                 

                  <?php endforeach; 
                      } else { ?>
                       <tr class="text-center">
                       <td colspan="7">Record Not Found</td>
                       </tr>

                    <?php } ?>
                  </tbody>
                </table>
              
            </fieldset>  
         </div>
</div>                   
<div class="card-footer clearfix">
                <?php echo $pagination; ?>
              </div>   
<!-- table ends -->





              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</section>














