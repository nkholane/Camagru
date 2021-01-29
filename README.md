Camagru

Camagru is a Instagram-like website. This website is used to upload,share and comment on pictures with people using the website.

Requirements to create website are:

    HTML
    CSS
    PHP
    JavaScript
    LAMP/MAMP/WAMP (I used Linux)
    MySQL

Application setup steps:

1.Install the Bitnami MAMP/LAMP/WAMP stack.

2.Empty the htdocs folder in the LAMP stack.

3.Clone your repository in htdocs folder.

4.Configure your MySQL database to use the following credentials initially
User:root Password:123456789
Remember to change these credentials to make the database more secure

5.To create your database and table on myphpadmin, run http://localhost/Camagru/config/setup.php in your browsers search engine.

6.Run http://localhost/Camagru in your browsers search engine to start using the website.

7.Register a new user and verify that you registered via email.

8.Once verified, you can now login the website for usage.

##Architecture:

1.background, contains the background image.

2.config, contains all the setup files to start using the website and also the database info.

3.functions, contains all the different functions that are used right through the website.

4.images, contains all the stickers that can be added to a picture.

5.includes, contains the javascript that makes it possible for the user to take a picture with a webcam and also to add stickers to that picture. It also contains a connection file that is used to connect to the database.

6.users, contains all the functions that has something to do with the user.

##Testing:

These are the test that I executed with their expected outcomes:
1. Start the web server

2.Create database on myphpadmin 

3.Create an account

4.Log in

5.Capture a picture with your webcam

6.Upload a picture

7.View the gallery

##Expected Outcomes:

1. Can launch the webserver 
2. Can create the database and tables
3. Can register a new user
4. Can login with the created user
5. Can capture an image with webcam
6. Can upload an image to gallery
7. Can access the gallery with uploaded and captured images
