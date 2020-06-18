
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
<h4 class="text-center col"  style="text-decoration: underline;" ><?php echo $session ;?> Caste wise Discription<h4>
<div class="row">

	<table class="table table-bordered mt-5" >
		<thead>
			<tr>
				<td class="col" >Class</td>
				<td class="col" colspan="5" >Male</td>
                <td class="col" colspan="5"  >Female</td>
                <td class="col" colspan="5"  >Total</td>
			</tr>
            <tr>
                <td class="col" ></td>
				<td class="col" >SC</td>
                <td class="col" >ST</td>
                <td class="col" >OBC</td>
                <td class="col" >GEN</td>
				<td class="col" >Total</td>

                <td class="col" >SC</td>
                <td class="col" >ST</td>
                <td class="col" >OBC</td>
                <td class="col" >GEN</td>
				<td class="col" >Total</td>

                <td class="col" >SC</td>
                <td class="col" >ST</td>
                <td class="col" >OBC</td>
                <td class="col" >GEN</td>
				<td class="col" >Total</td>
            </tr>
		</thead>
		<tbody>
		<?php 
		// $male_total = 0;
             foreach($row as $data) {
        
				 foreach($data as $key=>$value){   ?>
				
					<tr>
			    <td><?php echo $key;  ?></td>  
				
       
			<td><?php if(!empty($value['maleSC'])){ $c_maleSC = $value['maleSC']; echo $c_maleSC; }else{ $c_maleSC = 0; echo '-' ; }?></td>
			<td><?php if(!empty($value['maleST'])){ $c_maleST =$value['maleST'];  echo $value['maleST']; }else{ $c_maleST = 0;  echo '-' ; } ?></td>
			<td><?php if(!empty($value['maleOBC'])){ $c_maleOBC = $value['maleOBC'];  echo $value['maleOBC']; }else{ $c_maleOBC = 0; echo '-' ; } ?></td>
			<td><?php if(!empty($value['maleGEN'])){ $c_maleGEN = $value['maleGEN']; echo $value['maleGEN']; }else{ $c_maleGEN = 0; echo '-' ; } ?></td>
			<td>
			<?php if(!empty($value['maleSC']) || !empty($value['maleST']) || !empty($value['maleOBC']) || !empty($value['maleGEN'])){
			  
			 
			  if(empty($value['maleSC'])) { $maleSC = 0 ; }else{ $maleSC = $value['maleSC']; }
			  if(empty($value['maleST'])){ $maleST = 0 ; }else{ $maleST = $value['maleST']; }
			  if(empty($value['maleOBC'])){ $maleOBC = 0 ; }else{ $maleOBC = $value['maleOBC']; }
			  if(empty($value['maleGEN'])){ $maleGEN = 0 ; }else{ $maleGEN = $value['maleGEN']; }
		
				$male_total =  $maleSC + $maleST + $maleOBC + $maleGEN ;
				if($male_total !== 0 ){ echo $male_total; } else { echo '-'; }
			}else{ $male_total = 0 ; 
				echo  $male_total ; 
			  }?>
			
			
			
			</td>

			<td><?php if(!empty($value['femaleSC'])){ $c_femaleSC = $value['femaleSC']; echo $c_femaleSC; }else{ $c_femaleSC = 0; echo '-' ; }?></td>
			<td><?php if(!empty($value['femaleST'])){ $c_femaleST =$value['femaleST'];  echo $value['femaleST']; }else{ $c_femaleST = 0;  echo '-' ; } ?></td>
			<td><?php if(!empty($value['femaleOBC'])){ $c_femaleOBC = $value['femaleOBC'];  echo $value['femaleOBC']; }else{ $c_femaleOBC = 0; echo '-' ; } ?></td>
			<td><?php if(!empty($value['femaleGEN'])){ $c_femaleGEN = $value['femaleGEN']; echo $value['femaleGEN']; }else{ $c_femaleGEN = 0; echo '-' ; } ?></td>
			<td>
			<?php if(!empty($value['femaleSC']) || !empty($value['femaleST']) || !empty($value['femaleOBC']) || !empty($value['femaleGEN'])){
			  
			 
			  if(empty($value['femaleSC'])) { $femaleSC = 0 ; }else{ $femaleSC = $value['femaleSC']; }
			  if(empty($value['femaleST'])){ $femaleST = 0 ; }else{ $femaleST = $value['femaleST']; }
			  if(empty($value['femaleOBC'])){ $femaleOBC = 0 ; }else{ $femaleOBC = $value['femaleOBC']; }
			  if(empty($value['femaleGEN'])){ $femaleGEN = 0 ; }else{ $femaleGEN = $value['femaleGEN']; }
		
				$female_total =  $femaleSC + $femaleST + $femaleOBC + $femaleGEN ;
				if(!empty($female_total)){ echo $female_total; } else { echo '-'; }
				//echo $female_total;
			  }else{ 
				  $female_total = 0 ;
				  echo $female_total ; 
			  } ?>  </td>

			<td><?php echo $c_maleSC + $c_femaleSC; ?></td>
			<td><?php echo $c_maleST + $c_femaleST; ?></td>
			<td><?php echo $c_maleOBC + $c_femaleOBC ;?></td>
			<td><?php echo $c_maleGEN + $c_femaleGEN; ?></td>
			<td>
			<?php
			echo $male_total + $female_total;
			?>  </td>

			
			</tr>
			<?php  }  } ?>
			
			

			
		</tbody>
	</table>
	</div>
</div>
	
</body>
</html>
<button id="print" onclick="window.print()">Print this page</button>