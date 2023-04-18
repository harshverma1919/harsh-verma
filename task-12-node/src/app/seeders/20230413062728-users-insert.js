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
        ProjectId:"1",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Arya Stark",
        ProjectId:"2",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Professor",
        ProjectId:"3",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Ragnarson",
        ProjectId:"4",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Wick",
        ProjectId:"5",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Snow",
        ProjectId:"6",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name:"Jhon Cena",
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
