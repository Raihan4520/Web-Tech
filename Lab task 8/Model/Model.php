<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addCustomer($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into customer_info (C_Name, C_Email, C_PhoneNumber, C_Password, C_Gender, C_DOB, C_ProfilePicture) VALUES (:name, :email, :phoneNo, :password, :gender, :dateOfBirth, :profilePic)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name'             =>      test_input($data['name']),
            ':email'            =>      test_input($data['email']),
            ':phoneNo'          =>      test_input($data['phoneNo']),
            ':password'         =>      test_input($data['password']),
            ':gender'           =>      test_input($data['gender']),
            ':dateOfBirth'      =>      test_input($data['dateOfBirth']),
            ':profilePic'       =>      'Dummy.png'
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Registered successfully</span>';
}

function updateProfileInfo($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE customer_info set C_Name = ?, C_PhoneNumber = ?, C_Gender = ?, C_DOB = ? where C_Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['name']), test_input($data['phoneNo']), test_input($data['gender']), test_input($data['dateOfBirth']), $_SESSION['email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Updated successfully</span>';
}

function updateProfilePic($pic)
{
    $conn = db_conn();
    $selectQuery = "UPDATE customer_info set C_ProfilePicture = ? where C_Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $pic, $_SESSION['email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Uploaded successfully</span>';;
}

function updatePassword($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE customer_info set C_Password = ? where C_Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['newPassword']), $_SESSION['email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return "Password successfully changed";
}

function bookBusTicket($data)
{
    $current_data = file_get_contents("Bus_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['B_ID']             =   $current_data[$key]['B_ID'];
            $current_data[$key]['B_Name']           =   $current_data[$key]['B_Name'];
            $current_data[$key]['B_Location']       =   $current_data[$key]['B_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   test_input($data["email"]);

            $updated_data = json_encode($current_data);

            if (file_put_contents('Bus_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
            } else {
                return '<span class="red">Ticket booking failed</span>';
            }
        }
    }
}

function bookTrainTicket($data)
{
    $current_data = file_get_contents("Train_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['T_ID']             =   $current_data[$key]['T_ID'];
            $current_data[$key]['T_Name']           =   $current_data[$key]['T_Name'];
            $current_data[$key]['T_Location']       =   $current_data[$key]['T_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   test_input($data["email"]);

            $updated_data = json_encode($current_data);

            if (file_put_contents('Train_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
            } else {
                return '<span class="red">Ticket booking failed</span>';
            }
        }
    }
}

function bookPlaneTicket($data)
{
    $current_data = file_get_contents("Plane_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['P_ID']             =   $current_data[$key]['P_ID'];
            $current_data[$key]['P_Name']           =   $current_data[$key]['P_Name'];
            $current_data[$key]['P_Location']       =   $current_data[$key]['P_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   test_input($data["email"]);

            $updated_data = json_encode($current_data);

            if (file_put_contents('Plane_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
            } else {
                return '<span class="red">Ticket booking failed</span>';
            }
        }
    }
}

function cancelBookedTickets($data)
{
    $current_data = file_get_contents("Bus_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['B_ID']             =   $current_data[$key]['B_ID'];
            $current_data[$key]['B_Name']           =   $current_data[$key]['B_Name'];
            $current_data[$key]['B_Location']       =   $current_data[$key]['B_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   "";

            $updated_data = json_encode($current_data);

            if (file_put_contents('Bus_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket cancelled successfully</span>';
            } else {
                return '<span class="red">Ticket cancelling failed</span>';
            }
        }
    }

    $current_data = file_get_contents("Train_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['T_ID']             =   $current_data[$key]['T_ID'];
            $current_data[$key]['T_Name']           =   $current_data[$key]['T_Name'];
            $current_data[$key]['T_Location']       =   $current_data[$key]['T_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   "";

            $updated_data = json_encode($current_data);

            if (file_put_contents('Train_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket cancelled successfully</span>';
            } else {
                return '<span class="red">Ticket cancelling failed</span>';
            }
        }
    }

    $current_data = file_get_contents("Plane_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['P_ID']             =   $current_data[$key]['P_ID'];
            $current_data[$key]['P_Name']           =   $current_data[$key]['P_Name'];
            $current_data[$key]['P_Location']       =   $current_data[$key]['P_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   "";

            $updated_data = json_encode($current_data);

            if (file_put_contents('Plane_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket cancelled successfully</span>';
            } else {
                return '<span class="red">Ticket cancelling failed</span>';
            }
        }
    }
}
