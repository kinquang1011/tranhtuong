<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trang quản lý bài viết</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url()?>/css/admin/template_style.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url()?>/css/admin/editor.css" type="text/css" rel="stylesheet"/>
    <script src="<?php echo base_url()?>/js/admin/editor.js"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://giayphepthucpham.vn/public/js/editor.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
    <link href="http://giayphepthucpham.vn/public/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
    <script src="http://giayphepthucpham.vn/public/js/bootstrap-dialog.js"></script>
</head>
<body>
<div id="mybody">
    <!-- Ajax to load SubCatalogy for insert data to db -->
    <script language="javascript">
            function createObject() {
                var request_type;
                var browser = navigator.appName;
                if(browser == "Microsoft Internet Explorer"){
                    request_type = new ActiveXObject("Microsoft.XMLHTTP");
                }else{
                    request_type = new XMLHttpRequest();
                }
                return request_type;
            }
        var http = createObject();
        function level2(id)
        {
            http.open('get',"http://giayphepthucpham.vn/index.php/admin/thu-muc-con/"+id);
            http.onreadystatechange= process;
            http.send(null);
        }

        function process()
        {
            if(http.readyState == 4 && http.status == 200)
            {
                result= http.responseText;
                document.getElementById('level2').innerHTML= result;
            }
        }
    </script>
<script>
$(document).ready(function() {
    $('#optCatalogy').on('change', function() {
        var menu_id = $(this).val();
        if(menu_id) {
            $.ajax({
                url: '<?php base_url();?>/index.php/admin/getDataDropdown2/'+menu_id,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        }else{
            $('select[name="city"]').empty();
        }
    });
});
    $(function(){
        $( "#optCatalogy" ).change(function(event)
        {
            var menu_id= $(this).val();
            if(menu_id) {
            $.ajax(
                {
                    url: '<?php echo base_url(); ?>index.php/admin/getDataDropdown2/'+$menu_id,
                	type: "GET",
                	dataType: "json",
                    data:{ email:email},
                    success:function(data) {
                        $('#optCodeSubCatalogy').empty();
                        $.each(data, function(key, value) {
                            $('#optCodeSubCatalogy').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }});
            }else{
                $('#optCodeSubCatalogy').empty();
            }
                }
            }
            );
        });
    });
</script>
    <script language="javascript">
    
        function createObject() {
            var request_type;
            var browser = navigator.appName;
            if(browser == "Microsoft Internet Explorer"){
                request_type = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
                request_type = new XMLHttpRequest();
            }
            return request_type;
        }
        var http = createObject();
        function loadDatatable(id)
        {
            http.open('get',"http://giayphepthucpham.vn/index.php/admin/loadDataTableBaiViet/"+id);
            http.onreadystatechange= process2;
            http.send(null);
        }

        function process2()
        {
            if(http.readyState == 4 && http.status == 200)
            {
                result= http.responseText;
                document.getElementById('loadBaiViet').innerHTML= result;
            }
        }
    </script>
    <!-- Script Delete -->
    <script language="javascript">
            function createObject() {
                var request_type;
                var browser = navigator.appName;
                if(browser == "Microsoft Internet Explorer"){
                    request_type = new ActiveXObject("Microsoft.XMLHTTP");
                }else{
                    request_type = new XMLHttpRequest();
                }
                return request_type;
            }
        var http = createObject();
        function deleteBaiViet(id,codeSubCatalogy)
        {
            http.open('get',"http://giayphepthucpham.vn/index.php/admin/deleteBaiViet/"+id+"/"+codeSubCatalogy);
            http.onreadystatechange= process3;
            http.send(null);
        }

        function process3()
        {
            if(http.readyState == 4 && http.status == 200)
            {
                result= http.responseText;
                document.getElementById('loadBaiViet').innerHTML= result;
            }
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
                            <li class="active"><a href="http://giayphepthucpham.vn/index.php/admin">Admin</a></li>
                            <li><a href="http://giayphepthucpham.vn/index.php/admin/AddArticle">Add new Article</a></li>
                        </ul>
                        <div id="mypost_info_admin">
                            <div class="row">
                                <form class="form-inline" role="form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="usr">Sản Phẩm Chính: </label>
                                                <select id="optCatalogy" name="fieldName" class="optional overall classes" onchange="">
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
                            <table id="example" class="table table-bordered table-condensed table-hover">
                                <thead>
                                <tr class="success" >
                                    <th width="60px">ID</th>
                                    <th width="153px">Date Time</th>
                                    <th width="390">Title</th>
                                    <th width="390px">Content</th>
                                    <th width="65px">Priority</th>
                                    <th width="115px">Feature</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr class="success" >
                                    <th width="60px">ID</th>
                                    <th width="153px">Date Time</th>
                                    <th width="390px">Title</th>
                                    <th width="390px">Content</th>
                                    <th width="65px">Priority</th>
                                    <th width="115px">Feature</th>
                                </tr>
                                </tfoot>


                                <tbody id="loadBaiViet">
                                                                    <tr height="20px">
                                        <td>1</td>
                                        <td>2018-03-08 04:16:00</td>
                                        <td>Dịch vụ xin giấy phép lao động (Work Permit)</td>
                                        <td>Giấy phép lao động (Work Permit) cho người nước ngoài.Giấy phép lao động&nbsp;theo quy định là loại giấy tờ pháp lý căn
cứ theo Bộ luật lao&#8230; </td>
                                        <td>
                                            <div class="radio">
                                                <label><input name="radio" type='radio'></label>
                                            </div>
                                        </td>
                                        <td >
                                            <form action ="http://giayphepthucpham.vn/index.php/admin/EditArticle/245" method="post">
                                                <input type="hidden" class="codeCatalogy" name="codeCatalogy">
                                                <input type="hidden" class="codeSubCatalogy" name="codeSubCatalogy">
                                                <button class="btn btn-link" type="submit" onclick="submitButton()">
                                                    <img src='http://giayphepthucpham.vn/public/images/pencil-icon.png' alt='image'/>
                                                </button>
                                                <a onclick="callDialogDelete(245,'CSC18')"><img src='http://giayphepthucpham.vn/public/images/green-cross-icon.png' alt='image'/></a>
                                            </form>
                                        </td>
                                    </tr>
                                                                    </tbody>

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
        $('.codeSubCatalogy').val($( "#optCodeSubCatalogy option:selected" ).val());
    }
</script>
<script type="text/javascript">
    function callDialogDelete(ID,codeSubC){
        BootstrapDialog.confirm('Are you sure delete?', function(result){
            if(result) {
                deleteBaiViet(ID,codeSubC)
            }else {

            }
        });
    }
</script>
</body>
</html>