# mash

1. Download the source code at (https://github.com/zikurat/mash)

2. Please Visit XAMPP's website at (https://www.apachefriends.org/download.html) 
   and download the correct version with respect to your operating system. 
   IMPORTANT: Get version 5 instead of 7, or there might be compatability issues, since the code is written under XAMPP version 5.

3. Once XAMPP is successfully downloaded, go to the folder that contains it (should be a folder called XAMPP). Inside the XAMPP folder, there is another folder called "hotdoc". Copy the entire folder downloaded from the project gitHub (mash-master) into the "hotdoc" folder.
   
4. Now we need to import the databse file into our database. To do so, fisrt start XAMPP (make sure Apache Web Server, MySQL Database    and ProFTPD are all running). Once the server is running, open your browser and go to the address "localhost/dashboard". A welcome page    of XAMPP should show up, otherwise the server is not correctly running yet. On the welcome page, select "phpMyAdmin" on the right top    corner, which will take you to the database management page. From there, create a new databse by clicking "new" from the side menu on      the left and name this database "Network". A new database with the name "Network" should be shown up on the side menu on the left.        Click on this newly created databse and click "import" from the menu on the top. Select a file called "Network.sql" from the source        code folder you downloaded earlier and add it to the database. When the file is successfully imported, a table called "IP_address"        should show up under the Network database on the left side.

5. Now everything is ready and we can run the code. In your browser, type in the url "localhost/mash-master" and you should be able to see the software page running (Make sure the server is running everytime you try to run the code in your browser). Notice that "mash-master" is the name of the folder you downloaded and saved inside "hotdoc" folder. You can change the name of this "mash-master" folder to anything you want but make sure you also change the url so that you are actually accessing the files inside the right folder.
