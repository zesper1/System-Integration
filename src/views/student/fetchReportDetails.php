<?php
include "../../connection/db_conn.php";
session_start();

if (isset($_GET['violation_id'])) {
    $violationID = $_GET['violation_id'];

    // Function to fetch report details
    function fetchReportDetails($conn, $violationID) {
        $reportQuery = "SELECT r.reportName, rs.status_DETAILS, rs.status_DATE 
                        FROM violation v 
                        JOIN Report r ON r.report_ID = v.violationDetail_ID 
                        JOIN ReportStatus rs ON r.report_ID = rs.reportID 
                        WHERE v.violation_ID = ?";
        
        $reportStmt = $conn->prepare($reportQuery);
        $reportStmt->bind_param("i", $violationID);
        $reportStmt->execute();
        $reportResult = $reportStmt->get_result();

        if ($reportResult->num_rows > 0) {
            return $reportResult->fetch_assoc();
        } else {
            return null;
        }
    }

    $reportDetails = fetchReportDetails($conn, $violationID);

    if ($reportDetails) {
        echo json_encode([
            'success' => true,
            'reportName' => htmlspecialchars($reportDetails['reportName']),
            'statusDetails' => htmlspecialchars($reportDetails['status_DETAILS']),
            'statusDate' => htmlspecialchars($reportDetails['status_DATE'])
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
