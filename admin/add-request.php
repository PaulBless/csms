<?php 
session_start();
require_once('includes/conn.php');

// get user session id
$userid = "";
if(isset($_SESSION['user']))
    $userid = $_SESSION['user'];

if(isset($_POST['add']))
{
    // clean inputs from form
    $clean_fname = trim(htmlspecialchars($_POST['firstname']));
    $clean_lname = trim(htmlspecialchars($_POST['lastname']));
    $clean_mobileno = trim(htmlspecialchars($_POST['mobileno']));
    $clean_details = trim(htmlspecialchars($_POST['enq_reason']));
    $get_location = trim(htmlspecialchars($_POST['location_id']));
    $get_department = trim(htmlspecialchars($_POST['department_id']));
    $get_servicetype = trim(htmlspecialchars($_POST['enquirytype_id']));
    $get_subunit = trim(htmlspecialchars($_POST['subcategory_id']));

    // variable for form inputs
    $client_fname = ucwords($clean_fname);
    $client_lname = ucwords($clean_lname);
    $client_mobile = $clean_mobileno;
    $client_location = $get_location;
    $enquiry_type = $get_servicetype;
    $enquiry_detail = ucfirst($clean_details);
    $dept_id = $get_department;
    $sub_dept = $get_subunit;

    // first save client details
    $add_client = "INSERT INTO `clients` (`firstname`, `lastname`, `mobileno`, `location_id`, `created_on`) VALUES('$client_fname', '$client_lname', '$client_mobile', '$client_location', CURRENT_TIMESTAMP)";
    if($conn->query($add_client) == TRUE)
    {
        //get inserted record id
        $client_id = $conn->insert_id;
        // now save enquiry details
        $sql = "INSERT INTO `enquiries` (`et_id`, `dept_id`, `client_id`, `user_id`, `reason`, `created_on`) VALUES ('$enquiry_type', '$dept_id', '$client_id', '$userid', '$enquiry_detail', CURRENT_TIMESTAMP)";
        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        // if($conn->query($sql)){
        // $_SESSION['success'] = 'Client service request added successfully';
        // }
        // else{
        // $_SESSION['error'] = $conn->error;
        // }
        // show success message
        $_SESSION['success'] = 'Service request added successfully';

    }else{
        $_SESSION['error'] = $conn->error;
    }

header('location: enquiries.php');
}
?>