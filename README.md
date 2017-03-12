# Art Gallery inventory gestion

![alt text](https://github.com/jozephhh/Art-Gallery-Inventory/raw/master/src/img/screenshot.png "Screenshot of the project")
## Install the project
+ Create your own database and import tables and its contents from `database.sql`
+  Define your database in config.php at root project
+  Define your local address and port in config.php at root project
+ Go to your local address and port, normally you arrive on the login page and enter this logins :

| Email | Password |
| --- | --- |
| joseph.q@me.com | iloveart |
You will be able to create your account after, in `/users` panel

## Edit the project
The project is build with Gulp. You will need to install globally nodejs, npm and gulp-cli.

Once it's done, with your terminal, go to the cloned github directory :
````
cd Art-Gallery-Inventory/builder
````
 and run the command line `npm install` in the directory. This will install all the development dependencies.

## Features
+   Secure login to access to the inventory, can't access if not logged
+   Add products
+   Edit products
+   Delete products
+   Add users, able to add/edit/delete products
+   Users contributions (number of actions executed by each)
+   Actions logs
+   Export products / logs / users to .xls spreadsheet file


### Roadmap

+   Detailed Logs
+   Add users permissions
