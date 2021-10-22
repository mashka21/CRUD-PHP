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

