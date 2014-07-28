roster
======

Contacts and notes managment application. Roster App is a web based contact applications for keeping all contacts in one place online. The site has a simple interface and navigation. The application include three different tables usertbl, contactstbl, notestbl. Application include login, registration, and admin level login.

Programmers
-----------

Roster is contact management application build with PHP script language and MySQL database. To view the all users and all notes must have the admin right to login. To add a new page the language.inc.php file need to be updated and constants for title, meta-tags and meta-description must be defined. To add a new option in menu the adminarea.inc.php or roster.inc.php need to be modified. The navigation and footer menu can be modified from functions.inc.php file.

NOTE: The mysql_connect.php file must be outside htdocs or public_html folder.The 
application contains database tables: userstbl, contactstbl, notestbl.

Designers
---------

Application contain 4 theme colors and 1 main blue color. It's included main.css separate file for all styles.

User features
-------------

New user need to be registered with real email and activate the account thru the email activation link. After successful registration process user can login in login page.

   1. Register with email activation
   2. Login with email and password
   3. View contacts and notes
   4. Create, update and delete contacts
   5. Create, update and delete notes
   6. Logout

Test environment for user:

   - email: speed@mail.com    
   - password: speed

Admin features
-------------

   1. Login with email and password
   2. View all users
   3. View all contacts
   4. View all notes
   6. Logout

Test environment for admin:
   - email: admin2@mail.com
   - password: admin60

Bugs
----

If user will update the contact or note thru updating  page menu and providing incorrect contact email or note name the application will except the submission but not update the data.

Components
--------------------------

Application components which not work as they should:

   1. Activation Script
   2. Pagination for data
   3. Note Redirection page with preview for whole note
