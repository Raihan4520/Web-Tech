# Web Technology Course - Lab Tasks & Final Project

This repository contains the lab assignments and final project from my **Web Technology** course, taken during my undergraduate studies at the **American International University - Bangladesh (AIUB)**.

## Overview

The course covered a range of web development technologies, providing both theoretical knowledge and practical experience. The repository is divided into two main sections:

1. **Lab Assignments**: Practical tasks designed to help understand key web technologies and development practices.
2. **Final Project**: A culmination of the skills acquired during the course, involving the development of a fully functional web application.

### Technologies Covered

The following technologies and tools were used throughout the course:
- **HTML5**: For structuring content on the web.
- **CSS3**: For styling and layout design.
- **JavaScript**: For client-side scripting and interactive elements.
- **PHP**: For server-side scripting and dynamic content generation.
- **MySQL**: For database management and interaction.
- **Bootstrap**: For responsive design and rapid UI development.
- **jQuery**: For simplifying JavaScript operations.
- **AJAX**: For asynchronous requests and dynamic updates without page reloads.

## Repository Structure

<details>
  <summary>The repository is organized as follows:</summary>

```bash
.
└── Web-Tech
    ├── Final Project
    │   ├── Add_Bus.php
    │   ├── Add_Bus_Tickets.php
    │   ├── Add_Plane.php
    │   ├── Add_Plane_Tickets.php
    │   ├── Add_Train.php
    │   ├── Add_Train_Tickets.php
    │   ├── Book_Bus_Tickets.php
    │   ├── Book_Plane_Tickets.php
    │   ├── Book_Train_Tickets.php
    │   ├── Bus_Manager_Home.php
    │   ├── CSS
    │   │   └── style.css
    │   ├── Cancel_Booked_Tickets.php
    │   ├── Change_Password.php
    │   ├── Change_Profile_Picture.php
    │   ├── Controller
    │   │   ├── EditProfileController.php
    │   │   ├── addBusManager.php
    │   │   ├── addBusTicketsController.php
    │   │   ├── addCustomerController.php
    │   │   ├── addPlaneController.php
    │   │   ├── addPlaneManager.php
    │   │   ├── addPlaneTicketsController.php
    │   │   ├── addTrainManager.php
    │   │   ├── addTrainTicketsController.php
    │   │   ├── addbusController.php
    │   │   ├── addtrainController.php
    │   │   ├── bookBusTicketController.php
    │   │   ├── bookPlaneTicketController.php
    │   │   ├── bookTrainTicketController.php
    │   │   ├── cancelBookedTicketsController.php
    │   │   ├── changePasswordController.php
    │   │   ├── checkAvailableEmailController.php
    │   │   ├── deleteBusTicketsController.php
    │   │   ├── deleteBuscontroller.php
    │   │   ├── deletePlaneTicketsController.php
    │   │   ├── deletePlanecontroller.php
    │   │   ├── deleteTrainTicketsController.php
    │   │   ├── deleteTraincontroller.php
    │   │   ├── searchBusTicketController.php
    │   │   ├── searchPlaneTicketController.php
    │   │   ├── searchTrainTicketController.php
    │   │   ├── showBookedBusTicketsController.php
    │   │   ├── showBookedPlaneTicketsController.php
    │   │   ├── showBookedTrainTicketsController.php
    │   │   ├── updateBusTicketsController.php
    │   │   ├── updatePlaneController.php
    │   │   ├── updatePlaneTicketsController.php
    │   │   ├── updateTrainTicketsController.php
    │   │   ├── updatebusController.php
    │   │   ├── updatetrainController.php
    │   │   └── uploadPicController.php
    │   ├── Customer_Home.php
    │   ├── Customer_Menu.php
    │   ├── Customer_Top_Menu_Bar.php
    │   ├── Delete_Bus_Tickets.php
    │   ├── Delete_Plane_Tickets.php
    │   ├── Delete_Train_Tickets.php
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── JS
    │   │   └── Form_Validation.js
    │   ├── Login.php
    │   ├── Logout.php
    │   ├── Model
    │   │   ├── Model.php
    │   │   └── db_connect.php
    │   ├── Pictures
    │   │   ├── 1.jpg
    │   │   ├── 2.jpg
    │   │   ├── 3.jpg
    │   │   ├── backgroundImageDesktop.png
    │   │   └── backgroundImagePhone.png
    │   ├── Plane_Manager_Home.php
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Remove_Bus.php
    │   ├── Remove_Plane.php
    │   ├── Remove_Train.php
    │   ├── Train_Manager_Home.php
    │   ├── Update_Bus.php
    │   ├── Update_Bus_Tickets.php
    │   ├── Update_Plane.php
    │   ├── Update_Plane_Tickets.php
    │   ├── Update_Train.php
    │   ├── Update_Train_Tickets.php
    │   ├── Uploads
    │   │   ├── Dummy.png
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   ├── View_Booked_Bus_Tickets.php
    │   ├── View_Booked_Tickets.php
    │   ├── View_Profile.php
    │   ├── managerRegistration.php
    │   └── transportManagement_db.sql
    ├── Lab task 1
    │   ├── 1_ss1.png
    │   ├── 1_ss2.png
    │   ├── 2_ss1.png
    │   ├── 2_ss2.png
    │   ├── 2_ss3.png
    │   ├── 2_ss4.png
    │   ├── Lab_Task_1_1.html
    │   ├── Lab_Task_1_2.html
    │   ├── Lock.png
    │   ├── Passport size photo.jpg
    │   └── Scanned Signature.jpg
    ├── Lab task 2
    │   ├── Lab2Task.php
    │   ├── ss1.png
    │   └── ss2.png
    ├── Lab task 3
    │   ├── Change_Password.php
    │   ├── Data.json
    │   ├── Login.php
    │   ├── Profile.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── Change_Password_ss1.png
    │   │   ├── Change_Password_ss2.png
    │   │   ├── Login_ss1.png
    │   │   ├── Login_ss2.png
    │   │   ├── Profile_Picture_ss.png
    │   │   └── Registration_ss.png
    │   ├── Upload.php
    │   ├── Uploads
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   └── dummy.png
    ├── Lab task 4
    │   ├── Account.php
    │   ├── Change_Password.php
    │   ├── Data.json
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── Logged_In_Dashboard.php
    │   ├── Login.php
    │   ├── Logout.php
    │   ├── Profile_Picture.php
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── A.png
    │   │   ├── B.png
    │   │   ├── C.png
    │   │   ├── D.png
    │   │   ├── E.png
    │   │   ├── F1.png
    │   │   ├── F2.png
    │   │   ├── G.png
    │   │   └── H.png
    │   ├── Upload.php
    │   ├── Uploads
    │   │   ├── Pic_1.jpg
    │   │   ├── Pic_2.JPEG
    │   │   └── dummy.png
    │   ├── View_Profile.php
    │   └── xcompany.png
    ├── Lab task 5
    │   ├── Screenshots
    │   │   ├── A.png
    │   │   ├── B.png
    │   │   ├── C.png
    │   │   ├── D.png
    │   │   ├── E1.png
    │   │   └── E2.png
    │   ├── addProduct.php
    │   ├── controller
    │   │   ├── createProductController.php
    │   │   ├── deleteProductController.php
    │   │   ├── productInfoController.php
    │   │   └── updateProductController.php
    │   ├── deleteProduct.php
    │   ├── displayProduct.php
    │   ├── editProduct.php
    │   ├── menu.php
    │   ├── model
    │   │   ├── db_connect.php
    │   │   └── model.php
    │   ├── product_db.sql
    │   └── searchProduct.php
    ├── Lab task 6
    │   ├── Book_Bus_Tickets.php
    │   ├── Book_Plane_Tickets.php
    │   ├── Book_Train_Tickets.php
    │   ├── Bus_Tickets_Data.json
    │   ├── Cancel_Booked_Tickets.php
    │   ├── Change_Password.php
    │   ├── Change_Profile_Picture.php
    │   ├── Controller
    │   │   ├── EditProfileController.php
    │   │   ├── addCustomerController.php
    │   │   ├── bookBusTicketController.php
    │   │   ├── bookPlaneTicketController.php
    │   │   ├── bookTrainTicketController.php
    │   │   ├── cancelBookedTicketsController.php
    │   │   ├── changePasswordController.php
    │   │   └── uploadPicController.php
    │   ├── Customer_Data.json
    │   ├── Customer_Home.php
    │   ├── Customer_Menu.php
    │   ├── Customer_Top_Menu_Bar.php
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── Login.php
    │   ├── Logos
    │   │   └── Public_Home_Logo.jpg
    │   ├── Logout.php
    │   ├── Model
    │   │   ├── Model.php
    │   │   └── db_connect.php
    │   ├── Plane_Tickets_Data.json
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── A.png
    │   │   ├── B.png
    │   │   ├── C.png
    │   │   ├── D.png
    │   │   ├── E.png
    │   │   ├── F.png
    │   │   └── G.png
    │   ├── Train_Tickets_Data.json
    │   ├── Uploads
    │   │   ├── Dummy.png
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   ├── View_Booked_Tickets.php
    │   ├── View_Profile.php
    │   └── customer_db.sql
    ├── Lab task 7
    │   ├── Book_Bus_Tickets.php
    │   ├── Book_Plane_Tickets.php
    │   ├── Book_Train_Tickets.php
    │   ├── Bus_Tickets_Data.json
    │   ├── CSS
    │   │   └── style.css
    │   ├── Cancel_Booked_Tickets.php
    │   ├── Change_Password.php
    │   ├── Change_Profile_Picture.php
    │   ├── Controller
    │   │   ├── EditProfileController.php
    │   │   ├── addCustomerController.php
    │   │   ├── bookBusTicketController.php
    │   │   ├── bookPlaneTicketController.php
    │   │   ├── bookTrainTicketController.php
    │   │   ├── cancelBookedTicketsController.php
    │   │   ├── changePasswordController.php
    │   │   └── uploadPicController.php
    │   ├── Customer_Data.json
    │   ├── Customer_Home.php
    │   ├── Customer_Menu.php
    │   ├── Customer_Top_Menu_Bar.php
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── Login.php
    │   ├── Logout.php
    │   ├── Model
    │   │   ├── Model.php
    │   │   └── db_connect.php
    │   ├── Pictures
    │   │   ├── 1.jpg
    │   │   ├── 2.jpg
    │   │   ├── 3.jpg
    │   │   ├── backgroundImageDesktop.jpg
    │   │   └── backgroundImagePhone.jpg
    │   ├── Plane_Tickets_Data.json
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── Customer_Home (Desktop view).png
    │   │   ├── Customer_Home (Phone view).png
    │   │   ├── Login (Desktop view).png
    │   │   ├── Login (Phone view).png
    │   │   ├── Registration (Desktop view).png
    │   │   └── Registration (Phone view).png
    │   ├── Train_Tickets_Data.json
    │   ├── Uploads
    │   │   ├── Dummy.png
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   ├── View_Booked_Tickets.php
    │   ├── View_Profile.php
    │   └── customer_db.sql
    ├── Lab task 8
    │   ├── Book_Bus_Tickets.php
    │   ├── Book_Plane_Tickets.php
    │   ├── Book_Train_Tickets.php
    │   ├── Bus_Tickets_Data.json
    │   ├── CSS
    │   │   └── style.css
    │   ├── Cancel_Booked_Tickets.php
    │   ├── Change_Password.php
    │   ├── Change_Profile_Picture.php
    │   ├── Controller
    │   │   ├── EditProfileController.php
    │   │   ├── addCustomerController.php
    │   │   ├── bookBusTicketController.php
    │   │   ├── bookPlaneTicketController.php
    │   │   ├── bookTrainTicketController.php
    │   │   ├── cancelBookedTicketsController.php
    │   │   ├── changePasswordController.php
    │   │   └── uploadPicController.php
    │   ├── Customer_Data.json
    │   ├── Customer_Home.php
    │   ├── Customer_Menu.php
    │   ├── Customer_Top_Menu_Bar.php
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── JS
    │   │   └── Form_Validation.js
    │   ├── Login.php
    │   ├── Logout.php
    │   ├── Model
    │   │   ├── Model.php
    │   │   └── db_connect.php
    │   ├── Pictures
    │   │   ├── 1.jpg
    │   │   ├── 2.jpg
    │   │   ├── 3.jpg
    │   │   ├── backgroundImageDesktop.png
    │   │   └── backgroundImagePhone.png
    │   ├── Plane_Tickets_Data.json
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── Book Bus Tickets.png
    │   │   ├── Change Password.png
    │   │   ├── Edit Profile.png
    │   │   ├── Login.png
    │   │   └── Registration.png
    │   ├── Train_Tickets_Data.json
    │   ├── Uploads
    │   │   ├── Dummy.png
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   ├── View_Booked_Tickets.php
    │   ├── View_Profile.php
    │   └── customer_db.sql
    ├── Lab task 9
    │   ├── Book_Bus_Tickets.php
    │   ├── Book_Plane_Tickets.php
    │   ├── Book_Train_Tickets.php
    │   ├── CSS
    │   │   └── style.css
    │   ├── Cancel_Booked_Tickets.php
    │   ├── Change_Password.php
    │   ├── Change_Profile_Picture.php
    │   ├── Controller
    │   │   ├── EditProfileController.php
    │   │   ├── addCustomerController.php
    │   │   ├── bookBusTicketController.php
    │   │   ├── bookPlaneTicketController.php
    │   │   ├── bookTrainTicketController.php
    │   │   ├── cancelBookedTicketsController.php
    │   │   ├── changePasswordController.php
    │   │   ├── checkAvailableEmailController.php
    │   │   ├── searchBusTicketController.php
    │   │   ├── searchPlaneTicketController.php
    │   │   ├── searchTrainTicketController.php
    │   │   ├── showBookedBusTicketsController.php
    │   │   ├── showBookedPlaneTicketsController.php
    │   │   ├── showBookedTrainTicketsController.php
    │   │   └── uploadPicController.php
    │   ├── Customer_Home.php
    │   ├── Customer_Menu.php
    │   ├── Customer_Top_Menu_Bar.php
    │   ├── Edit_Profile.php
    │   ├── Footer.php
    │   ├── Forget_Password.php
    │   ├── Header.php
    │   ├── JS
    │   │   └── Form_Validation.js
    │   ├── Login.php
    │   ├── Logout.php
    │   ├── Model
    │   │   ├── Model.php
    │   │   └── db_connect.php
    │   ├── Pictures
    │   │   ├── 1.jpg
    │   │   ├── 2.jpg
    │   │   ├── 3.jpg
    │   │   ├── backgroundImageDesktop.png
    │   │   └── backgroundImagePhone.png
    │   ├── Public_Home.php
    │   ├── Registration.php
    │   ├── Screenshots
    │   │   ├── 1.png
    │   │   ├── 2.png
    │   │   └── 3.png
    │   ├── Uploads
    │   │   ├── Dummy.png
    │   │   ├── Pic_1.jpg
    │   │   └── Pic_2.JPEG
    │   ├── View_Booked_Tickets.php
    │   ├── View_Profile.php
    │   └── transportManagement_db.sql
    ├── README.md
    └── Repository Structure of Final Project.png

50 directories, 362 files
```
</details>

### Labs

Each lab task folder contains the code and files associated with that particular lab assignment. Labs range from basic HTML structuring to complex server-side interactions using PHP and MySQL.

### Final Project

The final project folder includes the source code for a web application developed as the course's capstone project. It demonstrates the integration of front-end, back-end, and database management skills learned throughout the course.

#### Repository Structure of Final Project
![Repository Structure of Final Project](./Repository%20Structure%20of%20Final%20Project.png)

## How to Run

1. Clone the repository:
   ```bash
   git clone https://github.com/Raihan4520/Web-Tech.git
2. Open the lab files or final project in a browser for client-side code (HTML, CSS, JS).
3. For PHP-based labs or the final project, ensure you have a local server environment such as XAMPP or WAMP. Place the files in the `htdocs` directory and run the server.
4. For database interactions, import the `.sql` files into your MySQL server.

## Contact

If you have any questions or suggestions, feel free to reach out through the repository's issues or contact me directly.
