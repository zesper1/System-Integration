<?php
include "../../connection/db_conn.php";
session_start();

if (isset($_POST['violationID'])) {
    $selectedViolationID = $_POST['violationID'];

    $reportQuery = "SELECT r.reportName, rs.status_DETAILS, rs.status_DATE 
                    FROM violation v 
                    JOIN Report r ON r.report_ID = v.violationDetail_ID 
                    JOIN ReportStatus rs ON r.report_ID = rs.reportID
                    WHERE v.violation_ID = ?";
    
    $reportStmt = $conn->prepare($reportQuery);
    $reportStmt->bind_param("i", $selectedViolationID);
    
    $reportDetails = null;
    if ($reportStmt->execute()) {
        $reportResult = $reportStmt->get_result();
        if ($reportResult->num_rows > 0) {
            $reportDetails = $reportResult->fetch_assoc();
        }
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($reportDetails);
}
?>
