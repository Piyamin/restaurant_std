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
    <h1>Delete Page</h1>

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
                <td><span id="menu_name"></span></td>
            </tr>
            <tr>
                <th>ประเภทอาหาร</th>
                <td><span id="menu_type"  ></span></td>
              </tr>
            <tr>
                <th>ราคา</th>
                <td><span id="menu_price"  ></span></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="button" value="ลบข้อมูล" id='btnDelete'></td>  
            </tr>
        
        </table> 
</body>
<script>
function btnDelete_click(){
    var data = new Object();
         data.menu_id = $("#menu_id").text(); 
         
         var url = "http://127.0.0.1:1234/v2/api/delmenu.php";
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
                        console.log(JSON.stringify(data));
                        $("#menu_id").text(data.menu_id);
                        $("#menu_name").text(data.menu_name);
                        var menu_type = "x";
                        switch(data.menu_type){
                            case "1":
                                menu_type ="อาหารคาว";break;
                            case "2":
                                menu_type ="อาหารหวาน";break;
                            case "3":
                                menu_type ="อาหารว่าง";break;    
                        };
                        $("#menu_type").text(menu_type);
                        $("#menu_price").text(data.menu_price);
                    }else{
                        alert("Not found");
                    }

                    },
                data: data
        });

}


$(function(){
    $("#btnDelete").click(btnDelete_click);
    $("#btnSearch").click(btnSearch_click);
});
</script>
</html>