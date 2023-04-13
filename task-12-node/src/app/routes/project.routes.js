module.exports = app => {
    const projects = require("../controllers/project.controller.js");

    var router = require("express").Router();
    // Create a new User
    // router.delete("/users1", users.projects);

    router.post("/", projects.create);

    router.get('/', projects.findAll);
    router.get('/:id', projects.findOne);
   
   //router.delete("/", projects.deleteAll);
    // Retrieve all Users
    // router.get("/", users.findAll);
  
    // // Retrieve a single User with id
    // router.get("/:id", users.findOne);
  
    // // Update a User with id
     router.put("/:id", projects.update);
  
    // // Delete a User with id
     router.delete("/:id", projects.delete);
  
    // // Delete all Users
    // router.delete("/", users.deleteAll);

    router.post("/:id",projects.create);
    app.use('/api/projects', router);
  };