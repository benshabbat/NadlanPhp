<?php
  /* ----------- File upload ---------- */


  $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

 if(isset($_POST['create'])) {
   // Check if file was uploaded
   if(!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $target_dir = "uploads/${file_name}";
    // Get file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    // echo $file_ext;

    // Validate file type/extension
    if(in_array($file_ext, $allowed_ext)) {
      // Validate file size
      if($file_size <= 1000000) { // 1000000 bytes = 1MB
        // Upload file
        move_uploaded_file($file_tmp, $target_dir);

        // Success message
        echo '<p style="color: green;">File uploaded!</p>';
      } else {
        echo '<p style="color: red;">File too large!</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type!</p>';
    }
   } else {
     $message = '<p style="color: red;">Please choose a file</p>';
   }
 }
?>