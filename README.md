**Robot Demo Project**

The Robot Demo Project connects a small autonomous robot to an existing database and ordering system. When an order is placed, the robot will detect this change in the database and move to fulfill the request. The robot also features manual controls and a camera feed to a webpage for first-person control.

**Project Setup:**
1. Download and setup xampp.

2. Clone github repo into xampp/htdocs directory.

3. Create a db_config.py file in the web_src directory with a variable called 'mydb' containing database credentials.

4. Create a db_config.php file in the data_src/includes directory containing database credentials.

5. After turning on Apache in xampp, go to the following link:
    http://localhost/Robot-Demo-Team/web_src/index.php

6. Log in using a working username and password.

7. Run robot_main.py found in web_src.

8. Place an order with the product wanted, quantity, and delivery location.

9. Shortly after placing the order, a camera application will open to scan QR codes.

10. Scan the corresponding QR code ID that matches with the selected product ID (ex. Peaches = 1).

11. Scan the home QR code to finalize delivery and close camera.

**Controls:**
Controls for manual and autonomous driving will go here.

**To-Do List:**

1. Connect robot to database
    1a. Detect changes in database
    1b. Disbatch robot to complete order

2. Movement control
    2a. Manual control portal
    2b. Autonomous pathing to object

3. Camera Functions
    3a. Object detection
    3b. Object tracking & location
    3c. Live feed to control portal

4. ERD Model

5. Database Work
    5a. Connect robot to database
    5b. Interface with web page
    5c. Interface with our code