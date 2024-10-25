<?php
ob_start(); // Start output buffering
require(__DIR__ . '/../connection/Database.php'); // Ensure this path is correct

class graphModel
{
    private $conn; // Store the PDO connection

    public function __construct($database)
    {
        if ($database instanceof Database) {
            $database->getConnection();
            $this->conn = $database->conn; // Assign the PDO connection
            // Optionally check if the connection is established
            if ($this->conn === null) {
                throw new Exception("Database connection is not established.");
            }
        } else {
            throw new Exception("Invalid Database instance.");
        }
    }

    // Fetch report data grouped by week
    public function getReportsPerWeek()
    {
        $query = "
            SELECT 
                YEARWEEK(status_DATE, 1) AS week, 
                COUNT(*) AS total_reports 
            FROM 
                reportstatus 
            GROUP BY 
                week 
            ORDER BY 
                week;
        ";

        $stmt = $this->conn->prepare($query); // Use $this->conn here
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getViolationsPerWeek(){
        $query = "
            SELECT 
                YEARWEEK(violation_DATE, 1) AS week, 
                COUNT(*) AS total_violations 
            FROM 
                violation 
            GROUP BY 
                week 
            ORDER BY 
                week;
        ";
        $stmt = $this->conn->prepare($query); // Use $this->conn here
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// In the controller or where the chart data is needed
try {
    $database = new Database(); // Create a new Database instance
    $reportModel = new graphModel($database); // Pass the Database instance
    $weeklyReports = $reportModel->getReportsPerWeek();
    $weeklyViolations = $reportModel->getViolationsPerWeek();

    // Format the data for Chart.js
    $weeks = [];
    $totalreport = [];
    $totalviolation =[];

    foreach ($weeklyReports as $report) {
        $year = floor($report['week'] / 100); // Get the year
        $week = $report['week'] % 100; // Get the week number

        // Get the start date of the specified week
        $date = new DateTime();
        $date->setISODate($year, $week);
        $startDate = $date->format('Y-m-d'); // Format as YYYY-MM-DD
        $endDate = $date->modify('+6 days')->format('Y-m-d'); // Get the end date

        $input = "Week $week of $year";
        $weeks[] = $input; // You can further format the week number if necessary
        $totalreport[] = $report['total_reports'];
    }

    foreach ($weeklyViolations as $violation) {
        $totalviolation[] = $violation['total_violations'];
    }

    // Send data to the frontend as JSON
    $reports = [
        'weeks' => $weeks,
        'totalReports' => $totalreport,
        'totalViolations' =>$totalviolation
    ];
    echo json_encode($reports);
} catch (Exception $e) {
    // Handle any exceptions that occur
    echo json_encode("hello");
}