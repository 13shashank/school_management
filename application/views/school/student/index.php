

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
                <a class="btn btn-primary" href="<?php echo school_url('student/print');?>">print</a>
                <a class="btn btn-primary" href="<?php echo school_url('student/export');?>">Export</a>
                <a class="btn btn-primary" href="<?php echo school_url('student/edit');?>">Add</a>
                </div>
                
            </div>
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="student-datatable">
                  <thead>
                    <tr>
                      <!-- <th >Image</th> -->
                      <th>Name</th>
                      <th>Father Name</th>
                      <th>Mother Name</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Caste</th>
                      <th>Scholar Number</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  if($records) {  foreach ($records as $record):   ?>
                  <tr>
                  <!-- <td><?php //echo $record->;  ?></td> -->
                  <td><?php echo $record->student_name;  ?></td>
                  <td><?php echo $record->stu_father_name;  ?></td>
                  <td><?php echo $record->stu_mother_name;  ?></td>
                  <td><?php echo $record->class;  ?></td>
                  <td><?php echo $record->stu_gender;  ?></td>
                  <td><?php echo $record->stu_caste;  ?></td>
                  <td><?php echo $record->stu_scholar_number;  ?></td>
                  <td>   
                        <a href="<?php echo site_url('school/student/edit/'.$record->student_id)  ?>"> <i class="fas fa-edit"></i> </a> 
                         <a href="javascript:void(0)"  onclick="return deleteRecord('user','user/delete/<?php echo $record->student_id ; ?>'); "> <i class="fas fa-trash"></i></a>  
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
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <?php echo $pagination; ?>
              </div>
            </div>




          </div>
        </div>
    </div>
</section>

