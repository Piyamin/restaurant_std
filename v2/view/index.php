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
<h2> <a href="/v2/">หน้าหลัก</a> <a href="/v2/view/add.php">เพิ่มข้อมูล</a> <a href="/v2/view/search.php">ค้นหาข้อมูล</a>    <a href="/v2/view/edit.php">แก้ไขข้อมูล</a>    <a href="/v2/view/del.php">ลบข้อมูล</a></h2>
    <h1>Main Page</h1>
    
    <table border=1 width="600px">
        <thead>
            <th>รหัสเมนู</th>
            <th>ชื่อเมนูอาหาร</th>
            <th>ประเภทอาหาร</th>
            <th>ราคา</th>            
        </thead>
        <tbody id="tblData">            
        </tbody>
    </table>

</body>
</html>


<script>
    function loadData(){
        var url = "http://127.0.0.1:1234/v2/api/getmenus.php";
        
        $.getJSON(url).done(function( data ) {
            console.log(JSON.stringify(data));

            var line = "";
            $.each(data, function(k,item){
                console.log(item);
                line += "<tr><td align='center'>"+ item.menu_id+"</td>";
                line += "<td>"+item.menu_name+"</td>";
                line += "<td align='center'>";
                
                switch(item['menu_type']){
                        case "1":
                            line +="อาหารคาว";break;
                        case "2":
                            line +="อาหารหวาน";break;
                        case "3":
                            line +="อาหารว่าง";break;    
                    }
                line +="</td>";
                line += "<td align='right'>"+item.menu_price+"</td>";
                line += "</tr>";
            });

            $("#tblData").empty();
            $("#tblData").append(line);
        });
    }

    $(function(){
        loadData();
    });

</script>
</html>