# PHP CodeIgniter MVC Blogs

<br>

**Description**

This blog is a simple practice blog that utilizes CodeIgniter framework to Create, Read, Update and Delete posts.

It is PHP, HTML, and Bootstrap CSS driven website.

**Installation**

Requirements:
1. Apache Server: - download the apache server based on your OS (Windows, Linux, MacOS - x86 or X64bit)
2. PHP 7.1 or later
3. MySQL: for the database and to aid in manupilating the database.
4. phpMyadmin / MySQL Workbench :- to access the database and manipulate it directly.
  - For Systems running on Windows OS download WAMP server from the the following
   [Link](http://www.wampserver.com/en/) and follow throught the installation. You can also get the installation instruction from the same [Link](http://www.wampserver.com/en/) .

  - For Linux based Systems single installations of tht LAMP server is best. Use the  following commands in your terminal:
    > sudo apt-get app update

    > sudo apt-get apache2

    > sudo apt-get mysql-server mysql-client

    > sudo apt-get install php7.1

    > sudo apt-get phpmyadmin



On Successful installation, Open your Browser (*preferably Google Chrome*) then and use your http://localhost/phpmyadmin or MySql Workbench to get access to your server then import the databases in the `blogs/db` folder(*remember to zip the `.sql` files before importing*)

  Incase you are using an online server change localhost to your ip address e.g http://192.168.0.20/phpMyadmin to access your databases.

Also make change to your `application/config/config.php` folder to have base_url reading your respective address and `application/config/database.php` to read your database password.

Finally go to your Browser (*preferably Google Chrome*) and run the web application using your base_url e.g
  http://localhost/blogs or
  http://192.168.0.20/blogs





**Licensing**

The following Licenses apply:

1. [Apache License Version 2.0, January 2004](http://www.apache.org/licenses/)
- Font Awesome Licenses:

  *All brand icons are trademarks of their respective owners.*

  - Font

    Applies to all desktop and webfont files in the following directory: font-awesome/fonts/.
    License: SIL OFL 1.1
    URL: http://scripts.sil.org/OFL

  - Code

    Applies to all CSS and LESS files in the following directories: font-awesome/css/, font-awesome/less/, and font-awesome/scss/.
    License: MIT License
    URL: http://opensource.org/licenses/mit-license.html
