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
    <h1>Projects</h1>
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
        
        <th scope="col">Projects</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>      
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
            <p><strong>Project Name: </strong> <span id="project"></span></p>
            <input type="text" class="form-control" id="editProjectInput" placeholder="Enter Project" style="margin-bottom: 30px;">
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
    let num=0;
fetch(`http://127.0.0.1:8000/api/new_users/${localStorage.getItem("recordId")}`)
  .then((response) => response.json())
  .then((response) => {
    const data = response.data.newproject;
    if (Array.isArray(data)) {
      // your code for handling the array goes here
      if (Array.isArray(data)) {
        let tableData = "";
        AllData = data;
        data.map((values) => {
            num+=1;
          tableData += `<tr class="text-center">
            <td class="text-center">${values.project_name}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="handleClickModal(${values.id})">
              <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </td>
            <td class="text-center"><button type="button" class="btn btn-primary"  onClick="handleClick(${values.id})"><i class="fa-sharp fa-solid fa-trash"></i></button></td>
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
    //document.getElementById("test1").style.display = 'none';
} 

handleClickModalEdited=(recordId)=>{
  fetch(`http://127.0.0.1:8000/api/new_projects/${recordId}`, {
      method: 'Put',
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
       "project_name": document.getElementById("editProjectInput").value,
    }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('data-------'+JSON.stringify(data));
        
        localStorage.setItem("showMessage", "true");
    
    // Reload the page
    window.location.reload();
  })
  .catch(error => console.log(error));
}

// Check if the showMessage flag is set in localStorage
if (localStorage.getItem("showMessage")) {
  // Remove the flag
  localStorage.removeItem("showMessage");
  
  // Display the success message for 3 seconds
  var message = document.createElement("div");
  message.innerHTML = "Edited Successfully!";
  message.style.position = "fixed";
  message.style.top = "14%";
  message.style.left = "20%";
  message.style.width = "20%";
  message.style.background = "#4CAF50";
  message.style.color = "#fff";
  message.style.padding = "10px";
  message.style.textAlign = "center";
  message.style.zIndex = "9999";
  document.body.appendChild(message);

  setTimeout(function() {
    document.body.removeChild(message);
  }, 3000);
}
handleClickModalAdd=(ValueIds)=>{
  document.getElementById('modal-data-edit-btn').style.display = 'none';

  //let ProjectInput = `<input type="text" class="form-control" id="editProjectInput1" placeholder="Enter ProjectId">`
 // document.getElementById("test1").style.display = 'block';
let showData = `<div>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="handleClickModalAdded(${ValueIds})">Create</button>
            </div>`

            console.log(showData);
            document.getElementById('modal-data-add-btn').style.display = 'block';
    document.getElementById("modal-data-add-btn").innerHTML=showData;
} 

handleClickModalAdded=(recordIds)=>{
  fetch(`http://127.0.0.1:8000/api/new_projects/`, {
      method: 'Post',
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
       "project_name": document.getElementById("editProjectInput").value,
       "user_id":localStorage.getItem("recordId"),
    }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('data-------'+JSON.stringify(data));
        localStorage.setItem("addMessage", "true");
    
    // Reload the page
    window.location.reload();
  })
  .catch(error => console.log(error));
}

// Check if the showMessage flag is set in localStorage
if (localStorage.getItem("addMessage")) {
  // Remove the flag
  localStorage.removeItem("addMessage");
  
  // Display the success message for 3 seconds
  var addMessage = document.createElement("div");
  addMessage.innerHTML = "Added Successfully!";
  addMessage.style.position = "fixed"; // Set position to fixed
  addMessage.style.top = "55px"; // Adjust top property as needed
  addMessage.style.left = "20%"; // Adjust left property as needed
  //addMessage.style.transform = "translateX(-50%)"; // Center horizontally
  addMessage.style.width = "200px";
  addMessage.style.background = "#4CAF50";
  addMessage.style.color = "#fff";
  addMessage.style.padding = "10px";
  addMessage.style.textAlign = "center";
  addMessage.style.zIndex = "9999";
  document.body.appendChild(addMessage);

  setTimeout(function() {
    document.body.removeChild(addMessage);
  }, 3000);
}

handleClick=(recordId)=>{
  fetch(`http://127.0.0.1:8000/api/new_projects/${recordId}`, {
      method: 'Delete',
      headers: {
        "Content-Type": "application/json",
      },
      // body: JSON.stringify({ name: updatedName }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('data-------'+JSON.stringify(data));
        localStorage.setItem("addedMessage", "true");
    
    // Reload the page
    window.location.reload();
  })
  .catch(error => console.log(error));
}

// Check if the showMessage flag is set in localStorage
if (localStorage.getItem("addedMessage")) {
  // Remove the flag
  localStorage.removeItem("addedMessage");
  
  // Display the success message for 3 seconds
  var addedMessage = document.createElement("div");
  addedMessage.innerHTML = "Deleted Successfully!";
  addedMessage.style.position = "fixed"; // Set position to fixed
  addedMessage.style.top = "55px"; // Adjust top property as needed
  addedMessage.style.left = "20%"; // Adjust left property as needed
  //addMessage.style.transform = "translateX(-50%)"; // Center horizontally
  addedMessage.style.width = "200px";
  addedMessage.style.background = "#4CAF50";
  addedMessage.style.color = "#fff";
  addedMessage.style.padding = "10px";
  addedMessage.style.textAlign = "center";
  addedMessage.style.zIndex = "9999";
  document.body.appendChild(addedMessage);

  setTimeout(function() {
    document.body.removeChild(addedMessage);
  }, 3000);
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