<p><font size=18>VERIFICATION AND VALIDATION RESULTS</font></p>

+ **Project Name: Lending Library IM**
+ **Version: 2.0**
+ **Team Members: Alexander Martin, Pierce Beckett, Timothy Robinson**
+ **Date: 04/15/2021**

# 1. Introduction
The introduction section includes the following information: the purpose of this doctument, project scope, definitions, acronyms, and abbreviations, references, and an overview of the doctument.

## 1.1 Purpose of this Document
This document is the Verification and Validation results document for the Lending-Library IM system. The purpose of this document is to carry out the Verifcation and Validation plans previously discusses in the VVP document. This document in the following sections will discuss and describe the summary of the results that were achieved when the plan waas carried out. 

## 1.2 Project Scope
The Lending Library Inventory Management System aims to provide an efficient inventory management system for a library

## 1.3 Definitions, Acronyms, and Abbreviations
+ LL - Lending Library
+ IMS - Inventory Management System
## 1.4 References

## 1.5 Overview of Document
This document addresses the following section for the LL IMS: summary of the results from the validation process, results from code reviews and inspections, results from testing in two parts - summary of component test and summary of integration test / system test, evaluations of the process including evaluation of test cases, results from defect tracker, and lessons learned. It also includes outcome of acceptance test and delivery, summary of open issues, and also any additional information containing any extra results or summaries that need to be included. The conclusion is the change log for any future changes made to this VVR document.
# 2. Summary of Results
Database tables for inventory and customers are populated with random entries and able to be queried.

User interface is arranged correctly and buttons function as expected.

PHP that handles queries is working as expected when searching for and adding inventory. The customers table can be searched correctly, but there are still bugs when inserting a new user to the customer table. The customer information page, when viewed by the customer, shows their information. 


# 3. Results from Code Reviews and Inspections
Database- file works as expected and inserts the csv file data into the database as expected for testing data. Also queries from the application itself are able to be used.

HTML- code lays out the user interface correctly, except for some minor positioning issues like buttons being off-centered. Buttons and links work as expected.

PHP- able to query the database and generate a results page after searching. Inserting user provided information into the database tables functions correctly.


# 4. Results from Testing
This section contains information about testing results including a summary of component tests and a summary of integration/system tests.

## 4.1 Summary of Component Test
So far 3 of 3 components are working with minor bugs.
The component that is not working correctly(the PHP for the customer updating their own information) is being worked on and a resolution is expected soon.


## 4.2 Summary of Integration Test / System Test
All of the integration tests that have been conducted have passed. The PHP coded buttons are able to allow the HTML webpage to complete SQL functions for the database.

# 5. Evaluation of the Process
This section contains information about the testing process including: an evaluation of the test cases, results from the defect tracker, and lessons learned. 

## 5.1 Evaluation of Test Cases
Testing was done by attempting to use the application as it would be used normally. 

The database was tested by querying it from the database application, connecting to it using the PHP code, and querying it with PHP code. The database has not shown any defects at this time. 

The PHP code was tested by ensuring that the HTML is linked to the PHP code, connecting to the database, querying the database by using pre- written statments in the PHP code, querying the database by combining user input with keywords to generate a query, and a visual inspection of the generated results page.

The HTML was tested by visual inspection of the layout, clicking buttons to observe their effects, and ensuring that the page is able to link to other pages correctly. The HTML has passed all tests at this time except for minor position issues such as buttons being off centered slightly. 


## 5.2 Results from Defect Tracker
The defect tracker is still the same as the VVP. The results are also the same as VVR v1. We are still finding new defects when testing code and the different links on the website. As things stand now there are only a couple defects that need to be fixed and are being worked on currently.

## 5.3 Lessons Learned
It would have helped to have a more automated and thorough testing methodology. Unit testing for the functions and methods and automated scripts for the database queries could help ensure that everything is working as intended in all possible cases without the need for trial and error. In addition, some sort of error logging or defect tracking could help to discover and pinpoint errors more easily.

# 6. Outcome of Acceptance Test and Delivery
The website is working as intended unless specified in section 7 (Summary of Open Issues).

# 7. Summary of Open Issues

# 8. Additional Information
No other additional information is required than what already addressed in this document.

# Change Log

| Version | Date | Description |
|---------|------|-------------|
| 1.0 | 3/26/2021 | First version of the Verification and Validation results document, any changes can be made in the future |
| 2.0 | 4/15/2021 | Second Version of the VVR document |
