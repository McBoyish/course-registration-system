<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Search Results</title>
    <style type="text/css">
        /* body {
            font-family: arial, sans-serif;
            background-color: #F0E68C
        }

        table {
            background-color: #ADD8E6
        }

        td {
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 4px;
            padding-right: 4px;
            border-width: 1px;
            border-style: inset
        } */
    </style>
</head>

<body>
    <?php
    extract($_POST);

    // check if user exists query
    $role = $_POST["role"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $dateOfBirth = date($_POST["dateOfBirth"]);


    if ($_role = 'administrator') {
        $insertUser = "INSERT INTO person (firstName, lastName, address, email, phoneNumber, dateOfBirth)
			     VALUES ('$firstName', '$lastName','$address','$email', '$phoneNumber', '$dateOfBirth')";
    } else {
        $insertUser = "INSERT INTO person (firstName, lastName, address, email, phoneNumber, dateOfBirth)
				 VALUES ('$firstName', '$lastName','$address','$email', '$phoneNumber', '$dateOfBirth')";
    }


    // Connect to MySQL
    if (!($database = mysqli_connect(
        "localhost",
        "root",
        ""
    )))
        die("Could not connect to database </body></html>");

    // open registration database
    if (!mysqli_select_db($database, "Assignment1"))
        die("Could not open products database </body></html>");

    //insert user to PERSON table
    if (!($insertUserResult = mysqli_query($database, $insertUser))) {
        print("Could not execute query! <br />");
        die(mysqli_error($database) . "</body></html>");
    } // end if
    else {
        //Insertion of user in PERSON WORKED, so now we need to update Admin OR student

        $queryPersonIDString = "SELECT MAX(personID) FROM person";
        
        if (!($queryPersonID = mysqli_query($database, $queryPersonIDString))) {
            print("Could not execute query! <br />");
            die(mysqli_error($database) . "</body></html>");
        } // end if

        print($queryPersonID);
        
        $insertUserInPerson = "INSERT INTO administrator (employmentID)
        VALUES ('$queryPersonID')";

        //calling the query
        if (!($insertUserResult = mysqli_query($database, $insertUserInPerson))) {
            print("Could not execute query! <br />");
            die(mysqli_error($database) . "</body></html>");
        } // end if


        print("You have been registered with ID:");
    }
    mysqli_close($database);

    function userExists($database, $checkUser){
        if($checkUserResult = mysqli_query($database, $checkUser)){
            return true;
        }
        return false;
    }

    ?>
    <!-- end PHP script -->

</body>

</html>