<script>
	var dataTable =	$('#school-datatable').DataTable( {
			ajax: {
				url:SiteUrl+'/school/list',
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
			

			//	{ "data": function(data){
               //         return '<input type="checkbox" onclick=check('+data.id+') name="check_all"  value="'+data.id+'">';
               //     },"orderable": false
			//	},
				
				  
				{ "data": "school_name" }, 
				{ "data": "school_email" },  
				{ "data":"school_phone"},
                { "data":"school_address"},
				{ "data":"school_rc_number"},
				{ "data":"school_dise_code"},
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'school/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:void(0)"  onclick=deleteRecord('+"'school/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>