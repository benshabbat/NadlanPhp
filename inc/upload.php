<?php
  /* ----------- File upload ---------- */


  $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

 if(isset($_POST['house_add_btn'])) {
   // Check if file was uploaded
   if(!empty($_FILES['upload']['name'])) {
    $total_files = count($_FILES['upload']['name']);
    $files_array = array();
  
    for($i=0;$i<$total_files;$i++) {
      $file_name = $_FILES['upload']['name'][$i];
      $file_size = $_FILES['upload']['size'][$i];
      $file_tmp = $_FILES['upload']['tmp_name'][$i];
      
      // Get file extension
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));
      $new_image_name =uniqid() . '.' . $file_ext;
      $target_dir = "assets/images/houses/" . $new_image_name;
  
      // Validate file type/extension
      if(in_array($file_ext, $allowed_ext)) {
          // Validate file size
        if($file_size <= 1000000) { // 1000000 bytes = 1MB
            // Upload file
            move_uploaded_file($new_image_name, $target_dir);
            $files_array[]=$new_image_name;
            // Success message
            echo '<p style="color: green;">File uploaded!</p>';
        } else {
              echo '<p style="color: red;">File too large!</p>';
            }
      } else {
            $message = '<p style="color: red;">Invalid file type!</p>';
          }
   }

   $files_array = json_encode($files_array);
  
  
  } else {
     $message = '<p style="color: red;">Please choose a file</p>';
   }
 }



?>