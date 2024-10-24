<?php
// Assume $conn is your database connection
$filetype = $_POST['type'];

// Print the uploaded file details for debugging
echo "<pre>";
print_r($_FILES['my_image']);
echo "</pre>";

$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];

if ($error === 0) {
    if ($img_size > 500000) {
        $em = "File too large!";
        header("Location: ../views/student/reportStudent.php?error=$em");
        exit();
    } else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
            // Insert into database
            $sql = "INSERT INTO attachment(reportID, fileName, fileType) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                
                // Ensure that report_id is defined
                if (!isset($report_id)) {
                    $em = "Report ID is not set.";
                    header("Location: ../views/student/reportStudent.php?error=$em");
                    exit();
                }
                $path = "";
                // Determine upload path
                if ($filetype == "Violation") {
                    $path = "Violation";
                    $img_upload_path = '../../public/assets/images/violations/' . $new_img_name;
                } else if ($filetype == "Complaint") {
                    $path = "Complain";
                    $img_upload_path = '../../public/assets/images/complains/' . $new_img_name;
                } else {
                    echo $filetype;
                    // echo "<script>alert('Report type not set'); window.location.href = '../views/student/reportStudent.php?error=Report type not set';</script>";
                    exit();
                }
                echo "Path:" , $path;
                // Move uploaded file
                if (!move_uploaded_file($tmp_name, $img_upload_path)) {
                    $em = "Failed to move uploaded file.";
                    header("Location: ../views/student/reportStudent.php?error=$em");
                    exit();
                }

                $stmt->bind_param("iss", $report_id, $new_img_name, $path);
                
                // Execute statement and check for errors
                if ($stmt->execute()) {
                    // Successful execution; redirect or perform another action
                    header("Location: ../views/student/reportStudent.php?success=Report added successfully");
                } else {
                    $em = "Database update failed: " . htmlspecialchars($stmt->error);
                    header("Location: ../views/student/reportStudent.php?error=$em");
                }

                $stmt->close();
            } else {
                $em = "SQL prepare failed: " . htmlspecialchars($conn->error);
                header("Location: ../views/student/reportStudent.php?error=$em");
            }
        } else {
            $em = "You can't upload files of this type";
            header("Location: ../views/student/reportStudent.php?error=$em");
        }
    }
} else {
    $em = "Image required";
    header("Location: ../views/student/reportStudent.php?error=$em");
}
?>
