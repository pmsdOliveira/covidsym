<!DOCTYPE html>

<?php
   session_start();

    
    if (!isset($_SESSION["userType"]) || $_SESSION["userType"]!=4) {
        header('Location: ../commons/accessDenied.php');
    }
    include("../commons/config.php");
?>

<html>
    <head>
        <title>COVIDSYM - New Staff Member</title>

        <link rel="icon" href="../img/icon.ico" type="image/icon type" />

        <link rel="stylesheet" href="../css/adminNewStaff.css" />

        <link rel="preconnect" href="https://fonts.gstatic.com/" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        />
    </head>

    <body>
        <?php include "../commons/navbar.php"; ?>

        <div class="wrapper">
            <?php include "../commons/sidebar.php"; ?>

            <div class="content-wrapper">
                <div class="modal">
                    <div class="modal-header">
                        <i class="fas fa-arrow-alt-circle-left goBackBtn">
                            <a href="#"></a>
                        </i>
                        <h1>New Staff Member</h1>
                    </div>

                    <form
                        method="POST"
                        action="checkNewStaff.php"
                        id="new-staff"
                        onsubmit="return validateAdminStaffSiup()"
                    >
                        <table class="form">
                            <tr>
                                <td>
                                    <tr>
                                        <td class="names">
                                            <label>Staff Type</label>
                                        </td>
                                        <td>
                                            <select
                                                name="staff-type"
                                                form="new-staff"
                                            >
                                                <option value="medic">
                                                    Medic
                                                </option>
                                                <option value="investigator">
                                                    Investigator
                                                </option>
                                                <option value="admin">
                                                    Administrator
                                                </option>
                                            </select>
                                        </td>
                                        <td class="buttonSide">
                                            <input
                                                type="submit"
                                                value="Create Staff"
                                            />
                                        </td>
                                    </tr>
                                    <tr></tr>
                                </td>
                            </tr>
                            <tr>
                                <td class="names"><label>Username</label></td>
                                <td colspan="2">
                                    <input
                                        id="signup-username"
                                        name="username"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td class="names"><label>Password</label></td>
                                <td colspan="2">
                                    <input
                                        id="signup-password"
                                        name="password"
                                        type="password"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td class="names"><label>Name</label></td>
                                <td colspan="2">
                                    <input
                                        id="profile-name"
                                        name="name"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td class="names"><label>Email</label></td>
                                <td colspan="2">
                                    <input
                                        id="signup-email"
                                        name="email"
                                        type="email"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td class="names">
                                    <label>Phone Number</label>
                                </td>
                                <td colspan="2">
                                    <input
                                        id="profile-phone"
                                        name="phone"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td class="names"><label>Address</label></td>
                                <td colspan="2">
                                    <input
                                        id="profile-address"
                                        name="address"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <?php include('../commons/footer.php'); ?>

        <script src="../js/adminUserSignup.js"></script>
    </body>
</html>
