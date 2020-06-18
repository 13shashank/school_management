


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
<h4 class="text-center col"  style="text-decoration: underline;" ><?php echo $session ;?> Age wise Caste Discription<h4>
<div class="row">

	<table class="table table-bordered mt-5" >
		<thead>
			<tr>
                 <td class="col" >Age</td>
				<td class="col" >Class</td>
				<td class="col" colspan="5" >Male</td>
                <td class="col" colspan="5"  >Female</td>
                <td class="col" colspan="5"  >Total</td>
			</tr>
            <tr>
                <td class="col" ></td>
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
             foreach($row as $key=>$data) {
              //  echo "<pre>"; print_r($key);
             //   print_r($data); 
?>
        <tr>
       
			<?php	 foreach($data as $key=>$value){   ?>
                <td><?php echo $value['age'];  ?></td> 
                <td><?php echo $value['class'];  ?></td> 

<td><?php if(!empty($value['maleSC'])) { $maleSC = $value['maleSC']; echo $maleSC;}else{ $maleSC = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['maleST'])) { $maleST = $value['maleST']; echo $maleST;}else{ $maleST = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['maleOBC'])) { $maleOBC = $value['maleOBC']; echo $maleOBC;}else{ $maleOBC = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['maleGEN'])) { $maleGEN = $value['maleGEN']; echo $maleGEN;}else{ $maleGEN = 0; echo '-'; }  ?></td> 
<td><?php $male_total =  $maleSC + $maleST + $maleOBC + $maleGEN;  
if($male_total !=0 ){echo $male_total;}else{ echo 0; }
?></td>	

<td><?php if(!empty($value['femaleSC'])) { $femaleSC = $value['femaleSC']; echo $femaleSC;}else{ $femaleSC = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['femaleST'])) { $femaleST = $value['femaleST']; echo $femaleST;}else{ $femaleST = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['femaleOBC'])) { $femaleOBC = $value['femaleOBC']; echo $femaleOBC;}else{ $femaleOBC = 0; echo '-'; }  ?></td> 
<td><?php if(!empty($value['femaleGEN'])) { $femaleGEN = $value['femaleGEN']; echo $femaleGEN;}else{ $femaleGEN = 0; echo '-'; }  ?></td> 
<td><?php $female_total =  $femaleSC + $femaleST + $femaleOBC + $femaleGEN;  
if($female_total !=0 ){echo $female_total;}else{ echo 0; }
?></td>
        <td><?php echo $maleSC + $femaleSC; ?></td> 
        <td><?php echo $maleST + $femaleST; ?></td>
        <td><?php echo $maleOBC + $femaleOBC; ?></td>
        <td><?php echo $maleGEN + $femaleGEN; ?></td>
        <td><?php echo $male_total + $female_total; ?></td>   
            
            
            
            </tr>
			<?php  }  } ?>
			
			

			
		</tbody>
	</table>
	</div>
</div>
	
</body>
</html>
<button id="print" onclick="window.print()">Print this page</button>