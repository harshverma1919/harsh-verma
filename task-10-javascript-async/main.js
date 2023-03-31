let AllData = {}


fetch("https://gorest.co.in/public/v2/users").then((data)=>{
    //console.log(data);
    return data.json(); // Converted to object
}).then((objectData)=>{
 //   console.log(objectData[0]);
    let tableData="";
    AllData = objectData;
    objectData.map((values)=>{
        tableData +=`<tr class="text-center">
           
        <td class="text-center">${values.name}</td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="handleClick(${values.id})">
            <i class="fa-solid fa-eye"></i>
          </button></td>
      </tr>`;
      
    });
    document.getElementById("table_body").innerHTML=tableData;
}).catch((error)=>{
    console.log(error);
});

handleClick=(data)=>{
let showData = "";
     AllData.map((each) => {
        if(each.id == data){
            showData = `<div>
            <p><strong>Name: ${each.name}</strong> <span id="name"></span></p>
                        <p><strong>Email: ${each.email}</strong> <span id="email"></span></p>
                        <p><strong>Gender: ${each.gender}</strong> <span id="gender"></span></p>
                        <p><strong>Status: ${each.status}</strong> <span id="status"></span></p>
            </div>`
            return;
        }
    })
    document.getElementById("modal-data").innerHTML=showData;
}




