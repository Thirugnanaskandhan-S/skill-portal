<?php
include '../db/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (
  isset($_POST['id']) && isset($_POST['f_email']) &&
  isset($_POST['f_name']) 
) {

  extract($_POST);  
  $stmt = $db->prepare("SELECT * FROM skill inner join skill_cat c on c.id = skill.skill_cat WHERE sk_id = $id ");
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  // echo json_encode($id);

  $name = $_POST['f_name'];
  $email = htmlentities($_POST['f_email']);
  $subject = "Skill Allotment";
  $message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
    <head>
    <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <meta name='x-apple-disable-message-reformatting'>
      <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
      <title></title>
      
        <style type='text/css'>
          @media only screen and (min-width: 620px) {
      .u-row {
        width: 600px !important;
      }
      .u-row .u-col {
        vertical-align: top;
      }
    
      .u-row .u-col-100 {
        width: 600px !important;
      }
    
    }
    
    @media (max-width: 620px) {
      .u-row-container {
        max-width: 100% !important;
        padding-left: 0px !important;
        padding-right: 0px !important;
      }
      .u-row .u-col {
        min-width: 320px !important;
        max-width: 100% !important;
        display: block !important;
      }
      .u-row {
        width: 100% !important;
      }
      .u-col {
        width: 100% !important;
      }
      .u-col > div {
        margin: 0 auto;
      }
    }
    body {
      margin: 0;
      padding: 0;
    }
    
    table,
    tr,
    td {
      vertical-align: top;
      border-collapse: collapse;
    }
    
    p {
      margin: 0;
    }
    
    .ie-container table,
    .mso-container table {
      table-layout: fixed;
    }
    
    * {
      line-height: inherit;
    }
    
    a[x-apple-data-detectors='true'] {
      color: inherit !important;
      text-decoration: none !important;
    }
    
    table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_text_1 .v-container-padding-padding { padding: 30px 10px 10px !important; } #u_content_button_1 .v-size-width { width: 65% !important; } #u_content_button_1 .v-text-align { text-align: left !important; } #u_content_button_1 .v-border-radius { border-radius: 25px !important;-webkit-border-radius: 25px !important; -moz-border-radius: 25px !important; } #u_content_text_2 .v-container-padding-padding { padding: 10px 10px 30px !important; } }
        </style>
      
      
    
    <!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' rel='stylesheet' type='text/css'><!--<![endif]-->
    
    </head>
    
    <body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000'>
      <!--[if IE]><div class='ie-container'><![endif]-->
      <!--[if mso]><div class='mso-container'><![endif]-->
      <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%' cellpadding='0' cellspacing='0'>
      <tbody>
      <tr style='vertical-align: top'>
        <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #ffffff;'><![endif]-->
        
    
    <div class='u-row-container' style='padding: 0px;background-color: transparent'>
      <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
        <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
          
    <!--[if (mso)|(IE)]><td align='center' width='598' style='background-color: #ffffff;width: 598px;padding: 0px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 2px solid #000000;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
    <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
      <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
      <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 2px solid #000000;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
      
    <table style='font-family:Open Sans,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
      <tbody>
        <tr>
          <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:25px;font-family:Open Sans,sans-serif;' align='left'>
            
    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
      <tr>
        <td class='v-text-align' style='padding-right: 0px;padding-left: 0px;' align='center'>
          
          <img align='center' border='0' src='https://www.pngitem.com/pimgs/m/42-423552_bannari-amman-college-logo-hd-png-download.png' alt='' title='' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 550px;' width='550'/>
          
        </td>
      </tr>
    </table>
    
          </td>
        </tr>
      </tbody>
    </table>
    
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    
    
    
    <div class='u-row-container' style='padding: 0px;background-color: transparent'>
      <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
        <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
          
    <!--[if (mso)|(IE)]><td align='center' width='598' style='background-color: #f8f7f7;width: 598px;padding: 0px;border-top: 0px solid transparent;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
    <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
      <div style='background-color: #f8f7f7;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
      <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
      
    <table id='u_content_text_1' style='font-family:Open Sans,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
      <tbody>
        <tr>
          <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:40px 50px 30px;font-family:Open Sans,sans-serif;' align='left'>
            
      <div class='v-text-align' style='line-height: 160%; text-align: justify; word-wrap: break-word;'>
        <p style='line-height: 160%; font-size: 14px;'><span style='font-family: Open Sans, sans-serif; font-size: 16px; line-height: 25.6px;'><strong>Hi " . $name . "!</strong></span></p>
    <p style='line-height: 160%; font-size: 14px;'> </p>
    <p style='line-height: 160%; font-size: 14px;'><span style='color: #2dc26b; font-size: 16px; line-height: 25.6px; font-family: Open Sans, sans-serif;'><strong><span style='line-height: 25.6px; font-size: 16px;'>We Wish you a Happy Day! </span></strong></span></p>
    <p style='line-height: 160%; font-size: 14px;'> </p>
    <p style='line-height: 160%;'>You have been allotted as the Skill Incharge faculty for " . $row['skill_name'] . " for " . $row['skill_year'] . " Year " . $row['skill_dept'] . " Department. Check below for more details.</p>
    <p style='line-height: 160%;'> </p>
    <p style='line-height: 160%;'><strong>Skill Name </strong>: " . $row['skill_name'] . "</p>
    <p style='line-height: 160%;'><strong>Skill Code</strong> : " . $row['cat_name'] . "</p>
    <p style='line-height: 160%;'><strong>Skill Year</strong> : " . $row['skill_year'] . " Year</p>
    <p style='line-height: 160%;'><strong>Department</strong> : " . $row['skill_dept'] . "</p>
    <p style='line-height: 160%;'><strong>Dates</strong> : " . $row['starting_date'] . " To " . $row['ending_date'] . "</p>
    <p style='line-height: 160%;'><strong>Timings</strong> : " . $row['starting_time'] . " To " . $row['ending_time'] . "</p>
    <p style='line-height: 160%;'><strong>Venue</strong> :  Will be intimate later</p>
      </div>
    
          </td>
        </tr>
      </tbody>
    </table>
    
    <table id='u_content_button_1' style='font-family:Open Sans,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
      <tbody>
        <tr>
          <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Open Sans,sans-serif;' align='left'>
            
      <!--[if mso]><style>.v-button {background: transparent !important;}</style><![endif]-->
    <div class='v-text-align' align='center'>
      <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='localhost/' style='height:34px; v-text-anchor:middle; width:168px;' arcsize='73.5%'  stroke='f' fillcolor='#005790'><w:anchorlock/><center style='color:#FFFFFF;font-family:'Open Sans',sans-serif;'><![endif]-->  
        <a href='localhost/' target='_blank' class='v-button v-size-width v-border-radius' style='box-sizing: border-box;display: inline-block;font-family:Open Sans,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #005790; border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px; width:29%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;'>
          <span style='display:block;padding:10px;line-height:100%;'><strong><span style='line-height: 14px;'>Open Dashboard</span></strong></span>
        </a>
      <!--[if mso]></center></v:roundrect><![endif]-->
    </div>
    
          </td>
        </tr>
      </tbody>
    </table>
    
    <table id='u_content_text_2' style='font-family:Open Sans,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
      <tbody>
        <tr>
          <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:30px 10px 40px 50px;font-family:Open Sans,sans-serif;' align='left'>
            
      <div class='v-text-align' style='line-height: 140%; text-align: left; word-wrap: break-word;'>
        <p style='line-height: 140%;'>Regards,</p>
    <p style='line-height: 140%;'><strong>Skill Team</strong></p>
      </div>
    
          </td>
        </tr>
      </tbody>
    </table>
    
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    
    
    
    <div class='u-row-container' style='padding: 0px;background-color: transparent'>
      <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
        <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
          
    <!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
    <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
      <div style='height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
      <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
      
    <table style='font-family:Open Sans,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
      <tbody>
        <tr>
          <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Open Sans,sans-serif;' align='left'>
            
      <div class='v-text-align' style='font-size: 12px; line-height: 140%; text-align: center; word-wrap: break-word;'>
        <p style='line-height: 140%;'>Reach Us by skills@bitsathy.ac.in</p>
      </div>
    
          </td>
        </tr>
      </tbody>
    </table>
    
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    
    
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
      </tr>
      </tbody>
      </table>
      <!--[if mso]></div><![endif]-->
      <!--[if IE]></div><![endif]-->
    </body>
    
    </html>
    ";

  try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "projects.rish@gmail.com";
    $mail->Password = "lmcbbvvgnqtocjzs";
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, "SKILLS");
    $mail->addAddress($email);
    $mail->Subject = ($subject);
    $mail->Body = $message;
    $mail->send();

    $res['success'] = true;
    $res['message'] = "mail sent";
  } catch (Exception $e) {
    $res['success'] = false;
    $res['message'] = "backend error";

  }
} else {
  $res['success'] = false;
  $res['message'] = "missing parameters";
}

echo json_encode($res);
?>