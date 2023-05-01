const express = require("express");
// const { User } = require('./app/models');
const cors = require("cors");

const app = express();

var corsOptions = {
  origin: true
};

app.set('view engine', 'ejs');
app.use(cors(corsOptions));

// parse requests of content-type - application/json
app.use(express.json());

// parse requests of content-type - application/x-www-form-urlencoded
app.use(express.urlencoded({ extended: true }));

const db = require("./app/models");
// app.use('/host/users', userRouter);
db.sequelize.sync()
.then(() => {
  console.log("Synced db.");
})
.catch((err) => {
    console.log("Failed to sync db: " + err.message);
  });
  
// // drop the table if it already exists
// db.sequelize.sync({ force: true }).then(() => {
  //   console.log("Drop and re-sync db.");
  // });
  
  // simple route
  app.get("/", (req, res) => {
    res.render('pages/index');
  });

  app.get('/users', (req, res) => {
    res.render('pages/users');
  })
  app.get('/user/projects', (req, res) => {
    res.render('pages/projects');
  })
  
require("./app/routes/tutorial.routes")(app);
require("./app/routes/user.routes")(app);
require("./app/routes/project.routes")(app);
// set port, listen for requests
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}.`);
});
