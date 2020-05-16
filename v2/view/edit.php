<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>
<body>
<h2> <a href="/v2/">หน้าหลัก</a> <a href="/v2/view/add.php">เพิ่มข้อมูล</a> <a href="/v2/view/search.php">ค้นหาข้อมูล</a>    <a href="/v2/view/edit.php">แก้ไขข้อมูล</a>    <a href="/v2/view/del.php">ลบข้อมูล</a></h2>
    <h1>Edit Page</h1>

         <table>
            <tr>
                <th>รหัสเมนู</th>
                <td><input type="text" id="keyword"></td>
                <td><input type="button" id="btnSearch" value="สืบค้น"></td>
            </tr>
        </table>
  
         <table>
            <tr>
                <th>รหัสเมนู</th>
                <td><span id="menu_id"></span></td>
            </tr>
            <tr>
                <th>ชื่อเมนู</th>
                <td><input type="text" id="menu_name" required  maxlength="50"  /></td>
            </tr>
            <tr>
                <th>ประเภทอาหาร</th>
                <td>
                <select required  id="menu_type">
                    <option value=1>อาหารคาว</option>
                    <option value="2">อาหารหวาน</option>
                    <option value="3">อาหารว่าง</option>
                </select>
                </td>
            </tr>
            <tr>
                <th>ราคา</th>
                <td><input type="number" id="menu_price" maxlength="4" min=0 max=9999  ></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="button" value="บันทึกข้อมูล" id='btnSave'></td>  
            </tr>
        
        </table> 
</body>
<script>
function btnSave_click(){
    var data = new Object();
         data.menu_id = $("#menu_id").text(); 
         data.menu_name = $("#menu_name").val();
         data.menu_type = $("#menu_type").val();
         data.menu_price = $("#menu_price").val();
         console.log(data);
        
         var url = "http://127.0.0.1:1234/v2/api/update.php";
         $.ajax(
             {
                    url: url, 
                    type: 'post', 
                    dataType: 'json',
                    success: function(feedback){
                        alert(feedback.status);
                        if(feedback.result == "OK")
                            window.location = '/';
                    },
                    data: data
            });
}

function btnSearch_click(){
    var url = "http://127.0.0.1:1234/api/getmenu.php";
    var data = new Object();
        data.keyword = $("#keyword").val().trim();          
        $("#keyword").val("");
        $.ajax(
            {
                url: url, 
                type: 'post', 
                dataType: 'json',
                success: function(feedback){
                    if(feedback.nrow > 0){
                        var data = (feedback.data)[0];
                            $("#menu_id").text(data.menu_id);
                            $("#menu_name").val(data.menu_name);
                            $("#menu_type option[value='"+ data.menu_type+"']").prop('selected', true);
                            $("#menu_price").val(data.menu_price);
                    }else{
                        alert("Not found");
                    }                            
                    },
                data: data
        });

}


$(function(){
    $("#btnSave").click(btnSave_click);
    $("#btnSearch").click(btnSearch_click);
});
</script>
</html>