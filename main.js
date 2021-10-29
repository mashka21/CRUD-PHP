
// to read all info we must declare it at first
loadData();


//To know that it's update or new student inserted
let btnAction = "Insert";

$("#addnew").click(function() {

    $("#newStudent").modal("show");

})


$("#studentForm").submit(function(event) {

    event.preventDefault();

    // get the form data
    let form_data = new FormData($("#studentForm")[0]);

    if(btnAction == "Insert") {
         // add the data to the action 
        form_data.append("action", "register");
    }
    else{
        form_data.append("action", "updateStudent");
    }
   

    $.ajax( {

        method : "POST",
        dataType : "JSON",
        url : "API.php",
        data :  form_data,
        processData : false,
        contentType : false,
        success : function(data) {

            let status = data.status;
            let responseData = data.data;

            $("#studentForm")[0].reset();

            alert(responseData);
            btnAction = "Insert";
            $("#newStudent").modal("hide");
            loadData();

        },
        error : function(data){
            console.log(data)
        }

    }) 

     

})


function loadData() {
    
    $("#studentTable tbody").html("");
    let sendingData = {
        "action" : "readAll"
    }

    $.ajax({
        method : "POST",
        dataType : "JSON",
        url : "API.php",
        data : sendingData,
        success : function(data) {

            let status = data.status;
            let responseData = data.data;

            let html = '';
            let tr = '';

            if(status) {

                responseData.forEach( item => {

                    tr += "<tr>";

                    for(let i in item) {
                        
                        // console.log("this is : ",i);
                        // console.log("this is item",item);
                        tr += `<td>${item[i]}</td>`;
                        
                    }
                    tr += `<td> <a class="btn btn-info update_info" update_id=${item['ID']}> <i class="fas fa-edit"></i> </a>  <a class="btn btn-danger delete_info" delete_id=${item['ID']}><i class="fas fa-trash-alt"></i></a>  </td>`;

                    tr += "</tr>";
                    
                })

                $("#studentTable tbody").append(tr);

            }
            
            
        },
        error : function(data) {
            console.log(data);
        }
    })

}

function fetchInfo(id) {
    
    let sendingData = {
        "action" : "readStudentInfo",
        "ID" : id
    }

    $.ajax({
        method : "POST",
        dataType : "JSON",
        url : "API.php",
        data : sendingData,
        success : function(data) {

            let status = data.status;
            let responseData = data.data;

            let html = '';
            let tr = '';

            if(status) {

                //console.log(data);
                $("#stID").val(responseData[0].ID);
                $("#stName").val(responseData[0].Name);
                $("#stClass").val(responseData[0].Class);
                $("#newStudent").modal("show");
                // change the modal btnAction name  to 'update'
                btnAction = "Update";

            }
            
            
        },
        error : function(data) {
            console.log(data);
        }
    })

}

$("#studentTable").on("click","a.update_info" ,function() {
    //console.log("table clicked");

    let id = $(this).attr("update_id");
    
    fetchInfo(id);

})

// deleting info

$("#studentTable").on("click","a.delete_info" ,function() {
    //console.log("table clicked");

    let id = $(this).attr("delete_id");
    
    fetchInfo(id);

})









