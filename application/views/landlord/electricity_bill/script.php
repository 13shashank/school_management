<script>
	var dataTable =	$('#ebill-datatable').DataTable( {
			ajax: {
				url:SiteUrl+'/electricity_bill/list',
				type:'POST',
				datatype:'json',
				
			},
		
			"pageLength":7,
			"pagingType": "full_numbers",
			"searching": true,
			"info": false,
			"lengthChange": false,
			"processing": true,
			"ordering": true,
			"serverSide": true,
            "columns": [ 
			

			
		
				
				{
					"data" : function(data){
						return data.t_first_name +' ' +data.t_last_name
					}
				},
				  
              
				{ "data": "ebill_present_reading" },  
				{ "data":"ebill_last_reading"},
				{ "data":"ebill_final_reading"},
                { "data":"ebill_rate_per_reading"},
				{ "data": function(data){
					
					return '<span>&#8377; </span>'+data.ebill_amount+'';
				},"orderable": false
			},
				{ "data":"ebill_date"},
				

             
			]  
		});

</script>