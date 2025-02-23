
Needed software: 
1) install php server
    -  https://www.php.net/downloads.php
2) install mySQL 
    - https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/
3) PDO 




Two popular option to connect PHP to mySQL: 
1) mySQLi - 
2) PDO 

After some research, I like PDO more than mySQLi because it offers better abstraction from SQL statements and is consistent among multiple database 
    - Guide to install;
        - https://www.php.net/manual/en/pdo.installation.php


PDO how to enable: 
    - Ensure you enable the PDO_MySQL Driver to use PDO. 

    LINUX: 
        - sudo apt-get install php-pdo php-mysql

    WINDOWS: 
    - First, find the php.ini ( should be inside the php directory when you install php ) - On linux, you can use the php --ini to find where that file is store 
    - Use a editor to edit the file and find the a line or something similar
        - ;extension=pdo_mysql.dll
    and uncomment it by removing the ; . After that, PDO driver is enabled 

    After that, for both windows and linux do: 
    uncomment this line inside the php.ini file: 
        - extension=pdo_mysql

PDO Documentation: https://www.php.net/manual/en/book.pdo.php



How to run:

1) Using a PHP server (Recommended): 
    - Download the PHP Server extension from VS code and right click on 'index.php' to Serve the project 

2) Manually install php server and use the command line. Run 'php <path_to_filename>' to run a small php code for testing purpose