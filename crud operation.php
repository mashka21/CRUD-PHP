<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">

                <h1 class="fs-2 text-center">User info</h1>
                <button class="btn btn-success m-1" id="addnew">Add New student</button>
                <table class="table" id="studentTable">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    </tbody>

                    
                </table>
            </div>

        </div>
    </div>


    <div class="modal" tabindex="-1" id="newStudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="model-title">New Student Registeration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="studentForm">
                        <div class="form-group m-2">
                            <input type="text" name="stID" id="stID" class="form-control" placeholder="Enter student ID">
                        </div>

                        <div class="formgroup m-2">
                            <input type="text" name="stName" class="form-control" id="stName" placeholder="Enter Student Name"></input>
                        </div>
                        <div class="formgroup m-2">
                            <input type="text" name="stClass" class="form-control" id="stClasse" placeholder="Enter Student Class"></input>
                        </div>



                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    </div>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>


    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- main.js connect -->
<script src="main.js"></script>
</body>
</html>