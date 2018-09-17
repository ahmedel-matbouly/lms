<?php
include 'connect.php';
 $id = $_GET['id'];
 mysqli_query($con,"UPDATE student_registeration SET status ='yes' where id=$id");

?>
<script type ="text/javascript">
        window.location = "display_student_info.php";
    </script>