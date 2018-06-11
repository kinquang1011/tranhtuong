<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trang quản lý bài viết</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url()?>/css/admin/template_style.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url()?>/css/admin/editor.css" type="text/css" rel="stylesheet"/>
    <script src="<?php echo base_url()?>/js/admin/editor.js"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://giayphepthucpham.vn/public/js/editor.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <link href="http://giayphepthucpham.vn/public/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
    <script src="http://giayphepthucpham.vn/public/js/bootstrap-dialog.js"></script>
</head>
<body>
<div id="mybody">
    <!-- Ajax to load SubCatalogy  -->
<script>
$(document).ready(
		function() {
    $('#optCatalogy').change(function(){
        var menu_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url()?>/index.php/admin/getDataDropdown2/'+menu_id,
                type: "POST",
                dataType: "json",
                success:function(data) {
                    $('select#optCodeSubCatalogy').empty();
                    $.each(data, function(arr) {
                        $('select#optCodeSubCatalogy').append('<option value="'+ data[arr]['sub_id'] +'">'+ data[arr]['sub_name'] +'</option>');
                    });
                }
            });
    });
})
;

</script>
<script>
$(window).on('load', function() {
	
        var menu_id = 'vetranhtuong';
            $.ajax({
                url: '<?php echo base_url()?>/index.php/admin/getDataDropdown2/'+menu_id,
                type: "POST",
                dataType: "json",
                success:function(data) {
                    $('select#optCodeSubCatalogy').empty();
                    $.each(data, function(arr) {
                        $('select#optCodeSubCatalogy').append('<option value="'+ data[arr]['sub_id'] +'">'+ data[arr]['sub_name'] +'</option>');
                    });
                }
            });
            $.ajax({
                url: '<?php echo base_url()?>/index.php/admin/getDataTable/phongcanh',
                type: "POST",
                dataType: "json",
                success:function(data) {
                	drawDatatable(data);
                }
            });
});
</script>
<script type="text/javascript">
	function drawDatatable(data){
    var table = $('#example').DataTable();
	table.clear();
		var i=1;
	$.each(data, function(arr) {
		
		var fullPathImg= '<?php echo base_url()?>data/'+data[arr]['url_img'];
		var img = "<img class=\"img-rounded\" width=\"320\" height=\"160\"  src="+fullPathImg+">";
		var imgId = data[arr]['catalogy_id'];
		var deleteIcon = '<a onclick=\'callDialogDelete('+imgId+')\'><img src=\'http://giayphepthucpham.vn/public/images/green-cross-icon.png\' alt=\'image\'/></a>';
		var place = data[arr]['place'];
		var trDOM = table.row.add( [
	                                    i,
	                                    img,
	                                    place,
	                                    deleteIcon
	                                ] ).draw().node();
		i++;
        
	});
    


	}
</script>
   


    <!-- 3@ Start of MYCONTAINER-->
    <div class="container">
        <!-- Start of Content-->
        <div class="row">
            <div class="col-lg-16 nopadding">
                <div id="mycenter_admin">
                    <h2>Admin Page</h2>
                    <div class="bs-example">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="<?php base_url()?>/index.php/admin">Admin</a></li>
                            <li><a href="<?php echo base_url()?>index.php/admin/AddImage">Add Image</a></li>
                        </ul>
                        <div id="mypost_info_admin">
                            <div class="row">
                                <form class="form-inline" role="form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="usr">Sản Phẩm Chính: </label>
                                                <select id="optCatalogy" name="fieldName" class="optional overall classes" >
													<?php for ($i = 0; $i < count($mainItem); $i++) { ?>
														<option value="<?php echo $mainItem[$i]['link'];?>"><?php echo $mainItem[$i]['name'];?></option>
													<?php }?>
													
													
												</select>
                                                                                    </div>
                                    </div>
                                </form>
                                <form class="form-inline" role="form">
                                    <div class="col-md-12" id="level2">
                                        <div class="form-group">
                                            <label for="pwd">Sub Catalogy: </label>
                                               <select id="optCodeSubCatalogy" name="fieldName" class="optional overall classes" onchange="loadDatatable(this.value)">
                                                                                                  </select>
                                                                                    </div>
                                    </div>
                                </form>
                            </div>
                            <table id="example" class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%">
							    <thead>
							        <tr class="success"  >
                                    <th width="60px">ID</th>
                                    <th width="353px">Image</th>
                                    <th width="390">Place</th>
                                    <th width="390px">Delete</th>
                                    
                                </tr>
							    </thead>
							    <tfoot>
							        <tr class="success" >
                                    <th width="60px">ID</th>
                                    <th width="353px">Image</th>
                                    <th width="390">Place</th>
                                    <th width="390px">Delete</th>
                                     
                                    
                                </tr>
							    </tfoot>
							
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content-->
    </div>
    <!-- 3@ End of MYCONTAINER-->

</div>


<!-- Get value from select option Catalogy and SubCatalogy. Then push data into tag input of Form action -->
<script type="text/javascript">
    function submitButton(){

        $('.codeCatalogy').val($( "#optCatalogy option:selected" ).val());
        $( "#optCodeSubCatalogy option:selected" ).val();
    }
</script>
<script type="text/javascript">
    function callDialogDelete(id){
        var sub = $( "#optCodeSubCatalogy option:selected" ).val();
        var url = '<?php echo base_url()?>/index.php/admin/reload/'+id+'/'+sub;
        BootstrapDialog.confirm('Are you sure delete?', function(result){
            if(result) {
            	$.ajax({
                    url: url,
                    type: "POST",
                    dataType: "json",
                    success:function(data) {
                    	drawDatatable(data);
                    }
                });
            }else {

            }
        });
    }
</script>
</body>
</html>