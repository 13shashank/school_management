<script>
	var dataTable =	$('#landlord-datatable').DataTable( {
			ajax: {
				url:SiteUrl+'/landlord/list',
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
					
                        return '<img style="max-height:50px;" src="'+BaseUrl+'uploads/landlord/'+data.image+'" >';
                    },"orderable": false
				},
		
				
				{
					"data" : function(data){
						return data.first_name +' ' +data.last_name
					}
				},
				  
              
				{ "data": "email" },  
				{ "data":"phone"},
                { "data":"address"},
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'landlord/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:void(0)"  onclick=deleteRecord('+"'landlord/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>