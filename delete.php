    <?php 
        require_once 'db/conn.php';
        if (!$_GET['id']) {
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        } else {
            $id = $_GET['id']; // Get ID values


            // Call Delete function
            $result = $crud->deleteAttendee($id);
            // Redirect to list
            if ($result) {
                header("Location: viewrecords.php");
            }
            else {
                include 'includes/errormessage.php';
            }

            // Redirect to list
        }
?>