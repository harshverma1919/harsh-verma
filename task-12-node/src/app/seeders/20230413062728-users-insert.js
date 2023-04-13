'use strict';

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {
    /**
     * Add seed commands here.
     *
     * Example:
     * await queryInterface.bulkInsert('People', [{
     *   name: 'John Doe',
     *   isBetaMember: false
     * }], {});
    */
    return queryInterface.bulkInsert('users',[
      {
        name:"Rohan",
        email:"hrajput1919@gmail.com",
        ProjectId:"1",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Arya Stark",
        email:"noOne@gmail.com",
        ProjectId:"2",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Professor",
        email:"everyThingIsPlanned@gmail.com",
        ProjectId:"3",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Ragnarson",
        email:"skoll@gmail.com",
        ProjectId:"4",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Wick",
        email:"killyou@gmail.com",
        ProjectId:"5",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Snow",
        email:"winterIsComing@gmail.com",
        ProjectId:"6",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Cena",
        email:"youCantSeeMe@gmail.com",
        ProjectId:"7",
        createdAt: new Date(),
        updatedAt: new Date()
      }
      
    ]);
  },

  async down (queryInterface, Sequelize) {
    /**
     * Add commands to revert seed here.
     *
     * Example:
     * await queryInterface.bulkDelete('People', null, {});
     */
    return queryInterface.bulkDelete('users',{},null);
  
  
  }
};
