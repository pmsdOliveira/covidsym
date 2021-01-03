<html>

    <head>
        <title>COVIDSYM - Staff List</title>

        <link rel="icon" href="../img/icon.ico" type="image/icon type">

        <link rel="stylesheet" href="../css/staffList.css">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

    <body>
        <?php include "../commons/navbar.php"; ?>

        <div class="wrapper">
            <?php include "../commons/sidebar.php"?>

            <div class="content-wrapper">
                <div class="modal">
                    <div class="modal-header">
                        <i class="fas fa-arrow-alt-circle-left goBackBtn">
                            <a href="#"></a>
                        </i>
                        <h1>Staff</h1>
                    </div>
                    <div class=" staff-list">
                        <table>
                            <tr>
                                <td>
                                    <p class="p">Select a Staff Member to see his profile:</p>
                                </td>
                                <td>
                                   
                                        <select name="staff" id="staff">
                                            <option value="Medic">Medic</option>
                                            <option value="Investigator">Investigator</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    
                                </td>
                            </tr>
                        </table>
                        
                        <?php
                            for ($i = 0; $i < 5; $i++) {
                                echo '<div class=" staff">
                                        <i class="fas fa-user-circle"></i>
                                        <p>Dr. Albertino da Conceição</p>
                                        
                                        <button>Select</button>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div class="pages">
                        <a class="currentPage">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">></a>
                    </div>
                    <div class="buttonSide">
                        <button>Create new Staff Member</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../commons/footer.php'); ?>
    </body>

</html>