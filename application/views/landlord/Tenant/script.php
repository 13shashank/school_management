<script>
	var dataTable =	$('#tenant-datatable').DataTable( {
			ajax: {
				url:SiteUrl+'/tenant/list',
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
				{ "data": function(data){
					
                        return '<img style="max-height:50px;" src="'+BaseUrl+'uploads/tenant/'+data.t_image+'" >';
                    },"orderable": false
				},
		
				
				{
					"data" : function(data){
						return data.t_first_name +' ' +data.t_last_name
					}
				},
				  
              
				{ "data": "t_email" },  
				{ "data":"t_phone"},
                { "data":"t_address"},
				{ "data":"t_start_date"},
				
				{ "data": function(data){
					
					return '<span>&#8377; </span>'+data.t_rent+'';
				},"orderable": false
			},




				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'tenant/edit/'+data.t_id+'"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:void(0)"  onclick=deleteRecord('+"'landlord/delete'"+','+data.t_id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>