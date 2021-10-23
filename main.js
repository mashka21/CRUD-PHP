
loadData();

$("#addnew").click(function() {

    $("#newStudent").modal("show");

})


$("#studentForm").submit(function(event) {

    event.preventDefault();

    // get the form data
    let form_data = new FormData($("#studentForm")[0]);

    // add the data to the action 
    form_data.append("action", "register");

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


        },
        error : function(data){
            console.log(data)
        }

    }) 

     

})


function loadData() {
    
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
                        tr += '<td> ${item[i]}</td>';
                        
                    }
                    tr += "</tr>";
                })
                $("#studentTable tbody").append(tr);
            }
            

        },
        error : function() {
            console.log(data)
        }
    })

}









