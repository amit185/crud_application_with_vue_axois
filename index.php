<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Vue Crud</title>
  </head>
  <body>
      <div id="app">
          <div class="bg-dark text-light text-center py-2">
            <h3>CRUD APPLICATION FOR THE PHP, VUE & MYSQL</h3>
          </div>
          <div class="container">
              <!-- Button trigger modal -->
              <div class="d-flex my-1 justify-content-between">
                  <h3 class="text-primary">Registred Students</h3>
                  <button type="button" class="btn btn-primary  ml-auto" data-bs-toggle="modal" data-bs-target="#add">
                 Add New
                </button>
              </div>
              
              <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="successMsg">
                <strong>Conguratulation !</strong> {{successMsg}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="errorMsg">
                <strong>Sorry !</strong> {{errorMsg}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <hr class="bg-info"></hr>
              <table class="table">
                <thead>
                  <tr class="bg-info">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr v-for = "std in students">
                    <th scope="row">{{std.id}}</th>
                    <td>{{std.username}}</td>
                    <td>{{std.email}}</td>
                    <td>{{std.mobile}}</td>
                    <td>
                      
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square text-primary" data-bs-toggle="modal" data-bs-target="#edit" viewBox="0 0 16 16"  @click="selectdata(std)">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                     
                       || 
                  
                    <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#delete" width="24" height="24" fill="currentColor" class="bi bi-trash-fill text-danger" viewBox="0 0 16 16" @click="selectdata(std)">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                  
                </td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
          

          <!-- Modal -->
          <div   class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addkdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addkdropLabel">Add New Student</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add">
                  <div class="modal-body">
                    <input class="form-control form-control-sm" type="text" placeholder="Name" aria-label="Name" v-model="newStudent.name"  name="name">
                    <input class="form-control form-control-sm my-2" type="text" placeholder="E-Mail" aria-label="Email" v-model="newStudent.email" name="email">
                    <input class="form-control form-control-sm" type="text" placeholder="Phone" aria-label="Mobile No." v-model="newStudent.mobile" name="mobile"> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="addStudent()">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div  class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editdropLabel">Edit Student</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                      <div class="modal-body">
                        <input class="form-control form-control-sm" type="text" placeholder="Name" aria-label="Name"  v-model="currentStudent.username"  name="name">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="E-Mail" aria-label="Email" v-model="currentStudent.email" name="email">
                        <input class="form-control form-control-sm" type="text" placeholder="Phone" aria-label="Mobile No." v-model="currentStudent.mobile" name="mobile"> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="editStudent()" data-bs-dismiss="modal" >Update</button>
                      </div>
                    </form>
                </div> 
              </div>
            </div>
          </div>
          <div  class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletedropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deletedropLabel">Delete Record !</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h5>Are Yur sure Want to Delete this Student?</h5>
                  
                  <h6>You are Deleting '{{currentStudent.username}}'</h6>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" @click="delete_record()">Yes</button>
                </div>
              </div>
            </div>
          </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js"></script>
  <script type="text/javascript">
    var app = new Vue({
      el : '#app',
      data :{
        successMsg :false,
        errorMsg : false,
        students :[],
        newStudent :{name:"",email:"",mobile:""},
        currentStudent:{},
      },
      mounted:function(){
        this.getallStudents();
      },
      methods:{
        getallStudents(){
          axios.get("http://localhost/Crud-Application/Crud_with_vue_axois/action.php?action=get").then(function(response){
         
            if(response.data.error){
              
              	app.errorMsg = response.data.message;

            }else{
              
              app.students = response.data.users;

            }
          })
        },
        
        addStudent(){
          var formData = app.toFormData(app.newStudent);
          // console.log(app.newStudent);
          // console.log(formData);
          axios.post("http://localhost/Crud-Application/Crud_with_vue_axois/action.php?action=add",formData).then(function(response){
            app.newStudent = {name:"",email:"",mobile:""};
            if(response.data.error){
              app.errorMsg = response.data.message;

            }else{
              
              app.successMsg = response.data.message;
              app.getallStudents();

            }
          })
        },
        editStudent(){
          var formData = app.toFormData(app.currentStudent);
          axios.post("http://localhost/Crud-Application/Crud_with_vue_axois/action.php?action=update",formData).then(function(response){
               app.currentStudent = {};
            if(response.data.error){

              app.errorMsg = response.data.message;

            }else{
              
              app.successMsg = response.data.message;
              app.getallStudents();

            }
          })
        },
        toFormData(obj){
          var fd = new FormData();
          for(var i in obj){
              fd.append(i,obj[i]);
          }
          return fd;
        },
        selectdata(student){
        	app.currentStudent = student
        },
        delete_record(){
           var formData = app.toFormData(app.currentStudent);
          axios.post("http://localhost/Crud-Application/Crud_with_vue_axois/action.php?action=delete",formData).then(function(response){
               app.currentStudent = {};
            if(response.data.error){
              app.errorMsg = response.data.message;

            }else{
              
              app.successMsg = response.data.message;
              app.getallStudents();

            }
          })
        }
      }
    });
  </script>
  </body>
</html>