$(() => {
    showdata();
    $("#btnSave").click(btnSave_Click);
    $("#btnSearch").click(btnSearch_click);
    $("#btnSave_edit").click(btnSave_edit_click);
    $("#btnSearch_edit").click(btnSearch_edit_click);
    $("#btnSearch_del").click(btnSearch_del_click);
    $("#btnDelete").click(btnDelete_click);
});
// Home
function showdata() {
    console.log("1");
    var urlAPI = "http://localhost/restaurant_std/v3/index.php/showdata";
    console.log("2"); 
    $.getJSON(urlAPI).done(function (data) {
        

        console.log("3");
        console.log(JSON.stringify(data));
        var line = "";
        $.each(data, function (k, item) {
            console.log("4");
            console.log(item);
            line += "<tr>";
            line += "<td >" + item.menu_id + "</td>";
            line += "<td >" + item.menu_name + "</td>";
            line += "<td >" + item.menu_type + "</td>";
            line += "<td >" + item.menu_price + "</td>";
            line += "</tr>";
        });
        $(document).ready(function () {
            $("#showdata").DataTable({
                aaSorting: [[0, "ASC"]],
            });
        });
        $("#display").append(line);
    });
}
// save
function btnSave_Click(){
    var data = new Object();
     data.menu_id = $("#menu_id").val(); 
     data.menu_name = $("#menu_name").val();
     data.menu_type = $("#menu_type").val();
     data.menu_price = $("#menu_price").val();
     console.log(data);
     var url = "http://localhost/restaurant_std/v3/index.php/savedata";
     console.log(1);
     $.ajax(
         {
                url: url,
                type: 'post', 
                dataType: 'json',
                success: function(feedback){
                    alert(JSON.stringify(feedback['message']));
                    console.log(JSON.stringify(feedback));
                    // alert(feedback.status);
                    // if(feedback.result == "OK")
                    //     window.location = '/';
                },
                data: data
        });

}
// search
function btnSearch_click(){
    var url = "http://localhost/restaurant_std/v3/index.php/searchdata";
    var data = new Object();
     data.keyword = $("#keyword").val().trim();          
     $("#keyword").val("");
     $.ajax(
         {
                url: url, 
                type: 'post', 
                dataType: 'json',
                success: function(feedback){
                    var line = "";
                    $.each(feedback, function(k,item){
                        console.log(item);
                        line += "<tr><td>"+ item.menu_id+"</td>";
                        line += "<td>"+item.menu_name+"</td>";
                        line += "<td>";
                        
                        switch(item['menu_type']){
                                case "1":
                                    line +="อาหารคาว";break;
                                case "2":
                                    line +="อาหารหวาน";break;
                                case "3":
                                    line +="อาหารว่าง";break;    
                            }
                        line +="</td>";
                        line += "<td>"+item.menu_price+"</td>";
                        line += "</tr>";
                    });

                    $("#tblData").empty();
                    $("#tblData").append(line);
                },
                data: data
        });
}
// edit
function btnSearch_edit_click(){
    var url = "http://localhost/restaurant_std/v3/index.php/searchdata";
    var data = new Object();
        data.keyword = $("#keyword").val().trim();          
        $("#keyword").val("");
        $.ajax(
            {
                url: url, 
                type: 'post', 
                dataType: 'json',
                success: function(data){
                        console.log(1);
                        console.log(data);
                        $("#menu_id").text(data["0"]["menu_id"]);
                        $("#menu_name").val(data["0"]["menu_name"]);
                        $("#menu_type option[value='"+ data["0"]["menu_type"]+"']").prop('selected', true);
                        $("#menu_price").val(data["0"]["menu_price"]);
                },
                data: data
        });

}
function btnSave_edit_click(){
    var data = new Object();
         data.menu_id = $("#menu_id").text(); 
         data.menu_name = $("#menu_name").val();
         data.menu_type = $("#menu_type").val();
         data.menu_price = $("#menu_price").val();
         console.log(data);
        
         var url = "http://localhost/restaurant_std/v3/index.php/savedata_edit";
         $.ajax(
             {  url: url,
                type: 'post', 
                dataType: 'json',
                success: function(feedback){
                    alert(JSON.stringify(feedback['message']));
                    console.log(JSON.stringify(feedback));
                    // alert(feedback.status);
                    // if(feedback.result == "OK")
                    //     window.location = '/';
                },
                data: data
            });
}
// del
function btnSearch_del_click(){
    var url = "http://localhost/restaurant_std/v3/index.php/searchdata";
    var data = new Object();
        data.keyword = $("#keyword").val().trim();          
        $("#keyword").val("");
        $.ajax(
            {
                url: url, 
                type: 'post', 
                dataType: 'json',
                success: function(data){
                        console.log(1);
                        console.log(data);
                        $("#menu_id").text(data["0"]["menu_id"]);
                        $("#menu_name").text(data["0"]["menu_name"]);
                        switch(data["0"]["menu_type"]){
                            case "1":
                                data["0"]["menu_type"] ="อาหารคาว";break;
                            case "2":
                                data["0"]["menu_type"] ="อาหารหวาน";break;
                            case "3":
                                data["0"]["menu_type"] ="อาหารว่าง";break;    
                        };
                        $("#menu_type").text(data["0"]["menu_type"]);
                        $("#menu_price").text(data["0"]["menu_price"]);
                },
                data: data
        });

}
function btnDelete_click(){
    var data = new Object();
         data.menu_id = $("#menu_id").text(); 
         console.log(data);
         var url = "http://localhost/restaurant_std/v3/index.php/deldata";
         $.ajax(
            {
                url: url,
                type: 'post', 
                dataType: 'json',
                success: function(feedback){
                    alert(JSON.stringify(feedback['message']));
                    console.log(JSON.stringify(feedback));
                    // alert(feedback.status);
                    // if(feedback.result == "OK")
                    //     window.location = '/';
                },
                data: data
        });
}

