<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

include('dbcon.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d h:i A');
$exp_date_time = explode(' ', $current_date);
$curr_date = $exp_date_time[0];
$curr_time = $exp_date_time[1] . ' ' . $exp_date_time[2];

$user_id = $_GET['id'];

// Check if the user already checked in for the current date
$q = "SELECT * FROM attendance WHERE user_id = ? AND curr_date = ?";
$stmt = $con->prepare($q);
$stmt->bind_param("ss", $user_id, $curr_date);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    trigger_error('Error: ' . $con->error, E_USER_ERROR);
}

$num_count = mysqli_num_rows($result);

if ($num_count > 0) {
    $_SESSION['error'] = 'Already Checked In';
    header("Location: ../attendance.php");
    exit();
} else {
    // Insert new attendance record
    $sql = "INSERT INTO attendance (user_id, curr_date, curr_time) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $user_id, $curr_date, $curr_time);
    $stmt->execute();

    if ($stmt->errno) {
        trigger_error('Error: ' . $stmt->error, E_USER_ERROR);
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../attendance.php");
        exit();
    }

    // Update attendance_count in members table
    $updateQry = "UPDATE members SET attendance_count = attendance_count + 1 WHERE user_id = ?";
    $stmt = $con->prepare($updateQry);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();

    if ($stmt->errno) {
        trigger_error('Error updating attendance_count: ' . $stmt->error, E_USER_ERROR);
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../attendance.php");
        exit();
    }

    $_SESSION['success'] = 'Record Successfully Added';
    header("Location: ../attendance.php");
    exit();
}
?>
