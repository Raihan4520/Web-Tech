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
    $selectQuery = "INSERT into customer (c_name, c_email, c_phoneNumber, c_gender, c_dob, c_password, c_profilePicture) VALUES (:name, :email, :phoneNo, :gender, :dateOfBirth, :password, :profilePic)";
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
    $selectQuery = "UPDATE customer set c_name = ?, c_phoneNumber = ?, c_gender = ?, c_dob = ? where c_email = ?";
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
    $selectQuery = "UPDATE customer set c_profilePicture = ? where c_email = ?";
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
    $selectQuery = "UPDATE customer set c_password = ? where c_email = ?";
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

function bookTicket($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set bookedBy = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($_SESSION['id']), $data['ticketId']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
}

function cancelBookedTicket($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set bookedBy = ? where ticket_id = ? and bookedBy = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            '', $data['ticketId'], $_SESSION['id']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Ticket cancelled successfully</span>';
}

function addBusManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into bus_manager (bm_email, bm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Registered successfully</span>';
    }
}

function addBus($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into bus (b_name, b_location) VALUES (:busName, :busLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':busName'              =>         test_input($data['busName']),
            ':busLocation'          =>         test_input($data['busLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Bus added successfully</span>';
    }
}

function updateBus($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE bus set b_name = ?, b_location = ? where b_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['busName']), test_input($data['busLocation']), test_input($data['busId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletebus($busId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `bus` WHERE `b_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$busId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';
}


//Bus Ticket information upadte /delete / insert

function addBusTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets ( location_to,location_from, date, time, price, transportType, bookedBy, b_id) VALUES (:busTo, :busFrom, :date , :time, :price, :tType, :bookedBy, :busId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':busFrom'               =>        test_input($data["busFrom"]),
            ':busTo'                 =>        test_input($data["busTo"]),
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Bus",
            ':bookedBy'              =>        "",
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}

function deletebustickes($ticketId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `tickets` WHERE `ticket_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ticketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted  Ticket successfully</span>';
}

function updateBusTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_to = ?, location_from = ?,  date= ?, time = ?, price = ?, b_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['busFrom']), test_input($data['busTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']), test_input($data['busId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}

function addPlaneManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into plane_manager (pm_email, pm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Registered successfully</span>';
    }
}

function addPlane($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into plane (p_name, p_location) VALUES (:PlaneName, :PlaneLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':PlaneName'              =>         test_input($data['PlaneName']),
            ':PlaneLocation'          =>         test_input($data['PlaneLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Plane added successfully</span>';
    }
}


function updatePlane($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE plane set p_name = ?, p_location = ? where p_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['PlaneName']), test_input($data['PlaneLocation']), test_input($data['PlaneId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletePlane($PlaneId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `plane` WHERE `p_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$PlaneId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';
}


//Plane Ticket information upadte /delete / insert

function addPlaneTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time, price, transportType, bookedBy, p_id) VALUES (:PlaneTo, :PlaneFrom, :date , :time, :price, :pType, :bookedBy, :PlaneId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':PlaneTo'                 =>        test_input($data["PlaneTo"]),
            ':PlaneFrom'               =>        test_input($data["PlaneFrom"]),
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Plane",
            ':bookedBy'              =>        "",
            ':PlaneId'                 =>        test_input($data["PlaneId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deletePlanetickes($ticketId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `tickets` WHERE `ticket_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ticketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted  Ticket successfully</span>';
}
function updatePlaneTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_from = ?, location_to = ?, date= ?, time = ?, price = ?, p_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['PlaneFrom']), test_input($data['PlaneTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']), test_input($data['PlaneId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}


function addTrainManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into train_manager (tm_email, tm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Registered successfully</span>';
    }
}

function addTrain($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into train (t_name, t_location) VALUES (:trainName, :trainLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':trainName'              =>         test_input($data['trainName']),
            ':trainLocation'          =>         test_input($data['trainLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Train added successfully</span>';
    }
}


function updateTrain($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE train set t_name = ?, t_location = ? where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['trainName']), test_input($data['trainLocation']), test_input($data['trainId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletetrain($trainId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `train` WHERE `t_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$trainId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';
}


//Train Ticket information upadte /delete / insert

function addTrainTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time, price, transportType, bookedBy, t_id) VALUES (:trainTo, :trainFrom, :date , :time, :price, :tType, :bookedBy, :trainId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':trainTo'                 =>        test_input($data["trainTo"]),
            ':trainFrom'               =>        test_input($data["trainFrom"]),
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Train",
            ':bookedBy'              =>        "",
            ':trainId'                 =>        test_input($data["trainId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deletetraintickes($ticketId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `tickets` WHERE `ticket_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ticketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted  Ticket successfully</span>';
}
function updateTrainTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_from = ?, location_to = ?, date= ?, time = ?, price = ?, t_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['trainFrom']), test_input($data['trainTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']), test_input($data['trainId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}
