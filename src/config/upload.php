<?php
//UPLOAD IMAGE FUNCTION CAN COPY PASTE 
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
        header("Location:  ../views/student/reportStudent.php?error=$em");
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
                if ($filetype == "Complaint"){
                    $img_upload_path = '../../public/assets/images/complains/' . $new_img_name;
                } else if ($filetype == "Violation"){
                    $img_upload_path = '../../public/assets/images/violations/' . $new_img_name;
                } else {
                    echo "
                    <script>
                    alert('Report type not set');
                    window.location.href = '../views/student/reportStudent.php?report type not set';
                    </script>
                    ";
                }
                move_uploaded_file($tmp_name, $img_upload_path);
                $stmt->bind_param("iss", $report_id ,$new_img_name, $filetype);
                if ($stmt->execute()) {
                    $_SESSION['image_upload_modal'] = true;
                    header("Location: ../views/student/reportStudent.php?success=Image updated successfully");
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
    $em = "Unknown error occurred!";
    header("Location: ../views/student/reportStudent.php?error=$em");
}
?>