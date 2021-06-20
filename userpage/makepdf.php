<?php

include('../config/constants.php');
// first is import MPDF




$docname = $_GET['docname'];
$apponum = $_GET['apponum'];
$status = $_GET['status'];
$name = $_GET['name'];
$dates = $_GET['dates'];
$today = date("d/m/Y");
$email = 'jesanto28@gmail.com';

$query1 = "SELECT * FROM register WHERE email='$email'";
$res1 = mysqli_query($con,$query1);
while($rows = mysqli_fetch_array($res1))
{
  $dob = $rows['dob'];
  $mobile = $rows['mobile'];
  $gender = $rows['gender'];
  $address = $rows['address'];


}


// book mark of pdf


require_once   '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->Bookmark('Start of the document');
//then let start us html for generate report
// we need to use a variable for store the html
//here is our report
$html  = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Appointment sheet</title>

        <!-- file css for style on report  -->
        <link rel='stylesheet' href='./pdf.css'>
    </head>
    <body>
        <div class='container'>
            <!-- so this row should be our header of report  -->
            <div class='row'>
                <div class='header'>
                    <div class='logo_description_report_header'>
                        <img src='logo.png' alt='Doctor Appointment System'>
                        <div class='brand_company'>
                            Appointment Sheet
                        </div>
                        <div class='description'>
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='body_report'>
                    <div class='name_header'>
                        <p>Name                 : $name</p>
                        <p>Address                  : $address </p>
                        <p>Date of birth        : $dob</p>
                        <p>Gender            : $gender </p>
                        <p>Mobile               : $mobile </p>

                    </div>
                    <div class='Header_title'>
                        <strong>
                            Your Appointments
                        </strong>
                    </div>
                    <div class='container_details'>
                        <!-- it should be table of report  -->
                        <table>
                            <thead>
                                <tr>
                                    <td>
                                        App No:
                                    </td>
                                    <td>
                                        Doctor
                                    </td>
                                    <td>
                                        Date of app
                                    </td>
                                    <td>
                                      Status
                                    </td>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        $apponum
                                    </td>
                                    <td>
                                        $docname
                                    </td>
                                    <td>
                                        $dates
                                    </td>
                                    <td>
                                        $status
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- footer of report  -->
            <div class='row'>
                <div class='address'>
                    This appointment sheet is valid only for the above mentioned person, valid till $dates
                </div>
                <div class='tel'>
                  Contact : 1800 067 876
                </div>
            </div>
        </div>
    </body>
    </html>
";

$mpdf->WriteHTML($html);

$mpdf->Output();
