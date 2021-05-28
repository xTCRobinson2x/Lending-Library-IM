<p><font size=18>VERIFICATION AND VALIDATION PLAN</font></p>

+ **Project Name: Lending-Library IM**
+ **Team Members: Alexander Martin, Pierce Beckett, Timothy Robinson**
+ **Date: 03/17/2021**

# 1. Introduction
The introduction section includes the following information: the purpose of this doctument, project scope, definitions, acronyms, and abbreviations, references, and an overview of the doctument.

## 1.1 Purpose of this Document
This document is the Verification and Validation Plan document for the Lending-Library IM system. The purpose of the application is described in the Project Plan and the Problem Description.

## 1.2 Project Scope
The Lending Library Inventory Management System aims to provide an efficient inventory management system for a library

## 1.3 Definitions, Acronyms, and Abbreviations
+ LL - Lending-Library
+ IMS - Inventory Management System
+ Admin - Authorized user with access to manage the supposed inventory system.

## 1.4 References

## 1.5 Overview of Document
This document addresses the software verification and validation that the project is fulfilling its requirements as given by the projec topic document. The following section includes the Code Reviews and Inspections which is how the team reviews the code. The next section is the Component Test Plans and Prodecures which includes an overview of the component test strategy. The next section is the System Test Plans and Procedures which includes an overview of the system test strategy, and plans and procedures. The next section is the Defect Tracking Plans which is how the team keeps track of bugs in the project. The next section is the Tracability from SRS to SDS which is how the team implemented the software requirements into the software design. The final few sections is the Acceptance Test and Preparation for Delivery which includes the acceptance test procedure, specific acceptance criteria, and product delivery. The final section is dedicated to any additional information and the change log.

# 2. Code Reviews and Inspections
Code is reviewed by each team member once a portion is complete. Any errors or other bugs will be fixed by the team member who was originally responsible for that section of code with help from other team members as needed. 

# 3. Component Test Plans and Procedures
This section is dedicated to testing components of the project and the procedures executed in order to accomplish the testing strategy. It includes an overview of the component test strategy and lists each component and how it is tested individually.

## 3.1 Overview of Component Test Strategy
The requirements for this project are straightforward and this will allow for a simple testing procedure. We will check that the GUI is set up correctly through visual inpsection. We will check that the database is connected and able to be queried. We will check that the PHP code is querying correctly and generating the correct user experience for the different types of users. We will ensure all buttons and links function as expected by clicking them to verify.


## 3.2 Component: Database
The database will be tested to ensure that a connection can be established and successfully queried. To do this we will attempt to connect and query the database.

## 3.3 Component: GUI
The GUI will undergo a visual inspection to ensure that all buttons and are present on all pages within the application. Each button and link will be clicked and the effects will be verified to ensure correct functionality.

## 3.4 Component: PHP
The PHP code will be tested by checking returned query results with queries done within the database. The inventory page and information page will also be checked visually and through button testing since these pages are generated from the PHP code. The functionality of the application differs by user type so user type will always be verified during testing.



# 4. System Test Plans and Procedures
This section is dedicated to testing the system as a whole and how that is done, what plans are used and how they proceed. It includes an overview of the system test strategy and the plans and procedures for that strategy.

## 4.1 Overview of System Test Strategy
The system testing strategy has been fairly simple. Testing has been conducted as the code has been created or adjusted to meet the software needs. Testing was chosen to be done this way in order to maintain the code and ensure there were minimal to no errors in the beginning of development. In the next section the Testing plans and procedures will be discussed. 
## 4.2 Plans and Procedures
In terms of plans and procedures, it stayed pretty general for testing. Code was/is tested as it is created. Most testing was done throught the MySQL workbench to verify the insertions for that the admin creates for books and customers. The same was done for when searches are made from the web page, we veriified through testing that this process is taking place inside of the MySQL workbench database. 

# 5. Defect Tracking Plans
The defect tracking plan was also simple to ensure that we could track and fix any defects that occurred in the development process. All the defects that were found were logged on a seperate document by the tester. Once the testing was done then the coder could go back and fix the defects as they happened. This simple defect tracking plan has allowed the team to counter defects and fix them without it impacting the development process and taking important time away from other testing and development that needed to be finished. 

# 6. Traceability from SRS to SDS
The traceability from the SRS to the SDS document can be linked through the functional requirements that were outlined in the SRS, and architecutre diagrams found within the SDS. Furthermore, the functional requirements related to the GUI found within the SRS can be traced to the beta user interface samples found within the SDS.

# 7. Acceptance Test and Preparation for Delivery
This section is dedicating to making sure that the user will accept the project based on how the project meets the user's requirements and how the project will be prepared for delivery. It includes the acceptance test procedure, specific acceptance criteria, and product delivery.

## 7.1 Acceptance Test Procedure
In order to ensure that the application is able to complete all of the requirements outlined in the project description, several tests will be conducted and documented according to the following parameters:

+ Correct creation of a new user
+ Successful ability to login by authorized user and denial of an unauthorized/nonexistant account
+ The ability for a user account to recover their password if forgotten
+ Showing the correct pages based on the account type, either user or admin
+ Ability for a user or admin to search through the inventory
+ Ability for an admin to insert a new inventory item
+ Ability for an admin to view or insert a new customer
+ Ability for a user or admin to view analytics
+ Successful, correct, and fluid linking of web pages together

## 7.2 Product Delivery
The product will be delivered once the customer has agreed that it meets their requirments. The product source code and database setup will be delivered to the customer over the internet or in person.

# 8. Additional Information

# Change Log

| Version | Date | Description |
|---------|------|-------------|
| 1.0 | 03/19/2021 | Created by Lending Library IM Team |
