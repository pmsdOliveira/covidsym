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
        <title>COVIDSYM - New User</title>

        <link rel="icon" href="../img/icon.ico" type="image/icon type" />

        <link rel="stylesheet" href="../css/adminNewUser.css" />

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
            <?php include "../commons/sidebar.php";?>

            <div class="content-wrapper">
                <div class="modal">
                    <div class="modal-header">
                        <h1>New User Profile</h1>
                    </div>
                    <form
                        method="POST"
                        action="checkNewUser.php"
                        onsubmit="return validateAdminUserSingup()"
                    >
                        <table class="form">
                            <tr>
                                <td><label>Username</label></td>
                                <td>
                                    <input
                                        id="profile-username"
                                        name="username"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td>
                                    <input
                                        id="profile-password"
                                        name="password"
                                        type="password"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Name</label></td>
                                <td>
                                    <input
                                        id="profile-name"
                                        name="name"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td>
                                    <input
                                        id="profile-email"
                                        name="email"
                                        type="email"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Phone Number</label></td>
                                <td>
                                    <input
                                        id="profile-phone"
                                        name="phone"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Address</label></td>
                                <td>
                                    <input
                                        id="profile-address"
                                        name="address"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Local</label></td>
                                <td>
                                    <input
                                        id="profile-local"
                                        name="local"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>District</label></td>
                                <td>
                                    <input
                                        id="profile-district"
                                        name="district"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Birthdate</label></td>
                                <td>
                                    <input
                                        id="profile-birthdate"
                                        name="birthdate"
                                        type="date"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td><label>Gender</label></td>
                                <td>
                                    <div class="gender">
                                        <label
                                            >Male
                                            <input
                                                name="gender"
                                                type="radio"
                                                value="M"
                                                required
                                            />
                                        </label>
                                        <label
                                            >Female
                                            <input
                                                name="gender"
                                                type="radio"
                                                value="F"
                                                required
                                            />
                                        </label>
                                        <label
                                            >Other
                                            <input
                                                name="gender"
                                                type="radio"
                                                value="O"
                                                required
                                            />
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Fiscal Number</label>
                                </td>
                                <td>
                                    <input
                                        id="profile-fiscal"
                                        name="fiscal"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Healthcare Number</label>
                                </td>
                                <td>
                                    <input
                                        id="profile-healthcare"
                                        name="healthcare"
                                        type="text"
                                        required
                                    />
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Create Profile" />
                    </form>
                </div>
            </div>
        </div>

        <?php include('../commons/footer.php'); ?>

        <script src="../js/adminUserSignup.js"></script>
    </body>
</html>
