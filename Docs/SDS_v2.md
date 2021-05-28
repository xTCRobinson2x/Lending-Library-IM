<p><font size=18>SOFTWARE DESIGN SPECIFICATION</font></p>

+ **Project Name: Lending-Library IM**
+ **Version: 2.0**
+ **Team Members: Alexander Martin, Pierce Beckett, Timothy Robinson**
+ **Date: 03/12/2021**

# 1. Introduction
The introduction section includes the following information: the purpose of this document, project scope, definitions, acronyms, and abbreviations, references, and an overview of the document.

## 1.1 Purpose of this Document
This document is the Software Design Specification document for the Lending Library Inventory Management Systen. The purpose of the application is descriped in the Project Plan and the Problem Description.

## 1.2 Project Scope

## 1.3 Definitions, Acronyms, and Abbreviations
LL - Lending Library
IMS - Inventory Management System

## 1.4 References

## 1.5 Overview of Document
This document addresess the following sections for the LL IMS that allows a user to search and manage the database. The following section includes the System Architecture, overview of modules/components, structure and relationships, and user interface. The next section will be a detailed description of components which will include the login portal, the MySQL instance, the database structure, and the hosting server. The next section will be code reuse and its relationship to other products. The next section are the design decisions and tradeoffs. The final sections are the psuedocode for components which includes the home screen, search through the book inventory and customer information, viewing of transaction analytics, including the appendices which has a change log.

# 2. System Architecture
This section contains information about the modules and components, the structure and relationships, and the user interface.

## 2.1 Overview of Modules / Components
This project contains three main components, the database component that will hold the book and customer information, the Webpage that the user will interact with, and the php code that will query the database and generate a results page.

## 2.2 Structure and Relationships
This project uses a typical client server relationship. The database portion is the server while the webpage is the client. The html provides the initial user interface while the PHP will communicate with the database and provide a results page for the user.

## 2.3 User Interface
The user interface will be a web based GUI. The admin user will have the ability to view inventory, customer, and analytic data. The customer user will have the ability to view inventory and analytic data

# 3. Detailed Description of Components
This section contains more detailed information about the database, webpage, and PHP portions of the project.

## 3.1 Database (MySQL) 
The database used for this project is MySQL. The database is being used to store both book and inventory information, as well as the customer information. We wrote a python program to generate data found on the web into csv files which can be imported into the database.

## 3.2 Webpage (HTML/CSS)
The HTML portion of this project will be the user facing side of the application. The HTML will provide a web page which can be used by a user to view inventory, customer, or analytic data as needed. The basic HTML will be styled and formatted using CSS.

## 3.3 PHP (Backend)
The PHP portion of the project will be used to link the webpage and database together. The PHP code will link to the database containing all of the inventory and customer information and display it on the screen. It is also being used to edit existing database entries or insert new data. PHP is the intermediary anytime the user is interacting with the database.

# 4. Reuse and Relationships to Other Products
There hasn’t really been any reuse throughout the software design process. If there has been any it has been reusing code that has already been created for the process of creating the html and php. There hasn’t been any need for reuse yet as the software is still in the “early” stages of development. Reuse hasn’t been important to the project thus far.

# 5. Design Decisions and Tradeoffs
This section covers the current dsegin decisions along with any tradeoffs that have been made throughout development.

## 5.1 Design Decisions 
We have decided to create a web based application. This allows a simple and intuitive user experience and a streamlined developmental process. It also allows the application to be used from any device or location as long as there is an internet connection. The inventory is still using a remote database that the team setup. The database is being linked to the web pages and will still show customer information and the inventory.

## 5.2 Tradeoffs
As per the first version here currently aren’t any tradeoffs. In the future the one or two tradeoffs that may occur will be with the analytics page. This trade off may occur due to the time constraint or because some unexpected issues come up during the development process. Another tradeoff that could possibly occur later on would be aesthetically related when it comes to the web pages.

# 6. Pseudocode for Components
This sections covers the pseudocode and nothing has changed since version 1.

## 6.1 home.html
+ If user presses "Login with Google"
  + Open redirect.php

## 6.2 Redirect.php
+ Initialize configuration
+ Create Google client request
+ If access code is set
  + get access code
  + set access token
  + start new google oauth session
  + get user info
+ else
  + create new authentication url
+ redirect to verify.php upon completion

## 6.3 Verify.php
+ Start connection to MySQL database
+ If login is in database
  + check type (user/admin)
  + connect as type
+ Else
  + Create new user
+ Redirect to dashboard.html

## 6.4 dashboard.html
+ If user presses "Inventory Management"
  + Redirect to inventory_management.html
+ Else if user presses "Customer Info"
  + Redirect to customer_info.html
+ Else if user presses "Analytics"
  + Redirect to analytics.html

## 6.5 customer_info.html
+ If user enters customer information into form
    + If user presses "Search"
      + Post user query
      + Redirect to search_customer.php
    + Else If admin presses "Insert"
      + Post user input
      + Redirect to insert_customer.php

## 6.6 search_customer.php
+ get posted data
+ connect to database
+ search database based on user query
+ return table of search results
+ if error
  + display error message

## 6.7 insert_customer.php
+ insert posted customer info into database
+ if successful
  + display success
  + dipslay form again
+ if user enters data into form
    + if user presses insert
    + redirect to be inserted into database
+ else if user presses return
  + redirect to dashboard.html

## 6.8 inventory_mangagement.html
+ if user enters book info
  + if user presses search
    + post query
    + redirect to search_inventory.php
  + if admin presses insert
    + post query
    + redirect to insert_inventory.php
+ if user presses return to dashboard
  + redirect to dashboard.html

## 6.9 search_inventory.php
+ get posted data
+ connect to database
+ search database based on user query
+ return table of search results
+ if error
  + display error message

## 6.10 insert_inventory.php
+ insert posted book info into database
+ if successful
  + display success
  + dipslay form again
+ if user enters data into form
    + if user presses insert
    + redirect to be inserted into database
+ else if user presses return
  + redirect to dashboard.html

## 6.11 Analytics.html
+ Connect to databse
+ Get data to be analyzed
+ Display formatted information to page
+ If user presses return
  + redirect user to dashboard.html

# 7. Appendices

# Change Log

| Version | Date | Description |
|---------|------|-------------|
| 2.0 | 03/12/21 | The second iteration of the SDS document, contains all design specifications up to this point in development. |
