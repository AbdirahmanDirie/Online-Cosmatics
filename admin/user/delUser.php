<?php
        if (isset($_GET['id'])) {

            $user_id = $_GET['id'];
        
            $sql = "DELETE FROM `users` where id = '{$_GET['id']}'";
        
             $result = $conn->query($sql);
        
             if ($result == TRUE) {
        
                echo "User deleted successfully.";
        
            }else{
        
                echo "Error:" . $sql . "<br>" . $conn->error;
        
            }

        }
?>