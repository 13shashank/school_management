
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
@media print{
	#print{
		display:none;
	}
	
}
@page {
  size: auto;
  margin: 0;
       }
	   .contain{
		   margin:20px;
	   }
	   .col{
		font-weight: bold;
	   }
	   .row{
		   margin:unset;
	   }
</style>
<body>
<div class="contain">
<h4 class="text-center col"  style="text-decoration: underline;" >STUDENT DETAILS<h4>
<div class="row">
	<table class="table table-bordered mt-5" >
		<thead>
			<tr>
				<td class="col" >S.No.</td>
				<td class="col" >Scholar Number</td>
				<td class="col" >SSSM ID</td>
				<td class="col" >Student Name</td>
				<td class="col" >Father Name</td>
				<td class="col" >Mother Name</td>
				<td class="col" >Class</td>
				<td class="col" >Gender</td>
				<td class="col" >Caste</td>
				<td class="col" width=100 >Date of Birth</td>
				<td class="col" >Current Age</td>
				<td class="col" >Address</td>
				<td class="col" >phone</td>
				<td class="col" >Aadhar number</td>
				<td class="col" >BPL Card Number</td>
				<td class="col" >Labour Card Number</td>
				<td class="col" >Disability</td>
				<td class="col" >Bank Name</td>
				<td class="col" >Account Number</td>
				<td class="col" >IFSC Code</td>
				<td class="col" >Admission Date</td>
		
			</tr>
		</thead>
		<tbody>
			
			
			<?php $cn=1; foreach ($row as $row) { ?>
				<tr>
			<td><?php echo $cn; ?></td>
			<td><?php echo $row['stu_scholar_number']; ?></td>
			<td><?php echo $row['stu_sssmid'] ?></td>
			<td><?php echo $row['student_name'] ?></td>
			<td><?php echo $row['stu_father_name'] ?></td>
			<td><?php echo $row['stu_mother_name'] ?></td>
			<td><?php echo $row['class'] ?></td>
			<td><?php echo $row['stu_gender'] ?></td>
			<td><?php echo $row['stu_caste'] ?></td>
			<td><?php echo $row['stu_dob'] ?></td>
			<td><?php echo $row['stu_age'] ?></td>
			<td><?php echo $row['stu_aadhar'] ?></td>
			<td><?php echo $row['stu_phone'] ?></td>
			<td><?php echo $row['stu_aadhar'] ?></td>
			<td><?php echo $row['stu_bpl__card_number'] ?></td>
			<td><?php echo $row['stu_labour_card_number'] ?></td>
			<td><?php echo $row['stu_type_disabled'] ?></td>
			<td><?php echo $row['stu_bank_name'] ?></td>
			<td><?php echo $row['stu_account_number'] ?></td>
			<td><?php echo $row['stu_ifsc_code'] ?></td>
			<td><?php echo $row['stu_admission_date'] ?></td>
			</tr>
			<?php  $cn++; } ?>

			
		</tbody>
	</table>
	</div>
</div>
	
</body>
</html>
<button id="print" onclick="window.print()">Print this page</button>