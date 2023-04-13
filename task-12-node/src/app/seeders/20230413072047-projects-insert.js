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
    return queryInterface.bulkInsert('projects',[
      {
        Projects:"API",
        ProjectId:"1",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Testing",
        ProjectId:"1",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Front-end",
        ProjectId:"2",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Support",
        ProjectId:"3",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Testing",
        ProjectId:"3",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Testing",
        ProjectId:"4",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"API",
        ProjectId:"5",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Back-end",
        ProjectId:"6",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Website",
        ProjectId:"6",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        Projects:"Web App",
        ProjectId:"6",
        createdAt: new Date(),
        updatedAt: new Date()
      },
      { 
        Projects:"Front-end",
      ProjectId:"7",
      createdAt: new Date(),
      updatedAt: new Date()

      },
      {
        
        Projects:"API",
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
    return queryInterface.bulkDelete('projects',{},null);
  }
};
