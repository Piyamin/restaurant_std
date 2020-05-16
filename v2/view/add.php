<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Main Page</h1>
    <h2> <a href="/v2/">หน้าหลัก</a> <a href="/v2/view/add.php">เพิ่มข้อมูล</a> <a href="/v2/view/search.php">ค้นหาข้อมูล</a>    <a href="/v2/view/edit.php">แก้ไขข้อมูล</a>    <a href="/v2/view/del.php">ลบข้อมูล</a></h2>
    
        <table>
            <tr>
                <th>รหัสเมนู</th>
                <td><input type="text" id="menu_id"> </td>
            </tr>
            <tr>
                <th>ชื่อเมนู</th>
                <td><input type="text" id="menu_name"></td>
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
                <td><input type="number" id="menu_price" /></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="button" value="เพิ่มข้อมูล" name='submit' id="btnSave"></td>
            </tr>
        
        </table>


</body>
</html>


<script>
    function btnSave_Click(){

        var data = new Object();
         data.menu_id = $("#menu_id").val(); 
         data.menu_name = $("#menu_name").val();
         data.menu_type = $("#menu_type").val();
         data.menu_price = $("#menu_price").val();
         console.log(data);
        
         var url = "http://127.0.0.1:1234/v2/api/add.php";
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
    $(function(){
        $("#btnSave").click(btnSave_Click);
    });

</script>
</html>