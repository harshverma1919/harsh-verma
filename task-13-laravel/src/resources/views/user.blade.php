<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <%- include('../partials/head'); %> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/9fad20195a.js" crossorigin="anonymous"></script>
</head>
<body class="container">

<header>
  <!-- <%- include('../partials/header'); %> -->
  <style>
    .projectDetailBtn {
    margin: auto;
    border: 2px solid;
    width: 33px;
}
    .projectDetailBtn a{
      text-decoration: none;
      border: 2px solid #0000;
      font-weight: 600;
      
    }
    button{
      background-color: blue;
    }
  </style>
</header>

<main>
  <div class="jumbotron">
    <h1>Users</h1>
    <div class=" mt-3" style="padding-bottom: 50px;">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="handleClickModalAdd()">
        Add
        <i class="fa-solid fa-plus"></i>
      </button>
    </div>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr class="text-center">
        
        <th scope="col">User name</th>
        <th scope="col">Edit</th>
        <th scope="col">Projects</th>      
        <!-- <th scope="col">Add</th> -->
      </tr>
    </thead>
    <tbody id="table_body">
      
    </tbody>
  </table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit and Add</h1>
          <br>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-data">
            
        </div>
        <div class="modal-body" id="modal-data">
          <div>
            <p><strong>User Name: </strong> <span id="project"></span></p>
            <input type="text" class="form-control" id="editProjectInput" placeholder="Enter User" style="margin-bottom: 30px;">
           <!-- <div id="test1"> <input type="text" class="form-control" id="editProjectInput1" placeholder="Enter ProjectId" disabled> </div>
          </div> -->
          
        </div>
        
        
        <div class="modal-footer">
          <div class="" id="modal-data-edit-btn"></div>
          <!-- <button type="button" class="btn btn-secondary"  onClick="handleClickPut(values.id)">Close</button> -->

          
        </div>
        <div class="" id="modal-data-add-btn"></div>
          <!-- <button type="button" class="btn btn-secondary"  onClick="handleClickPut(values.id)">Close</button> -->

          
        </div>
        
        
      </div>
    </div>
  </div>
</main>
<script>
  function fetchData() {
fetch("http://127.0.0.1:8000/api/new_users")
  .then((response) => response.json())
  .then((response) => {
    
    const data = response.data;
   
    if (Array.isArray(data)) {
      // your code for handling the array goes here
      if (Array.isArray(data)) {
        let tableData = "";
        AllData = data;
        data.map((values) => {
            
          tableData += `<tr class="text-center">
            <td class="text-center">${values.name}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="handleClickModal(${values.id})">
              <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </td>
            <td class="text-center"><button type="button" class="btn btn-primary"  onClick="handleClick(${values.id})"><i class="fa-solid fa-forward"></i></button></td>
          </tr>`;
        });
        document.getElementById("table_body").innerHTML = tableData;
        
      }
    } else {
      console.error("Data is not an array:", data);
    }
  })
  .catch((error) => {
    console.error("Error fetching data:", error);
  });
  handleClickModal=(ValueId)=>{
let showData = `<div>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="handleClickModalEdited(${ValueId})">Update</button>
            </div>`

            console.log(showData);
    document.getElementById("modal-data-edit-btn").innerHTML=showData;
    
} 

handleClickModalEdited=(recordId)=>{
  fetch(`http://127.0.0.1:8000/api/new_users/${recordId}`, {
      method: 'Put',
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
       "name": document.getElementById("editProjectInput").value,
    }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('data-------'+JSON.stringify(data));
        alert("Updated Successfully");
        window.location.reload();
      })
      .catch((error) => {
        console.log(error);
      });
}
handleClickModalAdd=(ValueIds)=>{
  document.getElementById('modal-data-edit-btn').style.display = 'none';
let showData = `<div>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="handleClickModalAdded(${ValueIds})">Create</button>
            </div>`

            console.log(showData);
            document.getElementById('modal-data-add-btn').style.display = 'block';
    document.getElementById("modal-data-add-btn").innerHTML=showData;
} 

handleClickModalAdded=(recordIds)=>{
  fetch(`http://127.0.0.1:8000/api/new_users/`, {
      method: 'Post',
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
       "name": document.getElementById("editProjectInput").value,
    }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('data-------'+JSON.stringify(data));
        alert("Added Successfully");
        window.location.reload();
        
      })
      .catch((error) => {
        console.log(error);
      });
}
handleClick=(recordId)=>{
    localStorage.setItem("recordId",recordId);
    window.location.pathname="host/user/:userId/projects";
    console.log("chlra ");
    

}
  }
  window.addEventListener('load', () => {
            fetchData();
        });
</script>
</main>

<footer>
  <!-- <a href="http://localhost:3000/host/user/:userId/projects" target="_blank">Next Page</a> -->
  <!-- <%- include('../partials/footer'); %> -->
</footer>

</body>
</html>