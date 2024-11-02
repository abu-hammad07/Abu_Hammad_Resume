<?php
$emailContent = '

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <!-- Add the preheader text here -->
    <meta name="og:title" content="Your Custom Preheader Text">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Source Sans Pro";
                font-style: normal;
                font-weight: 400;
                src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
            }

            @font-face {
                font-family: "Source Sans Pro";
                font-style: normal;
                font-weight: 700;
                src: local("Source Sans Pro Bold"), local("SourceSansPro-Bold"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
            }
        }

        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
        }

        table,
        td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        table {
            border-collapse: collapse !important;
        }

        a {
            color: #1a82e2;
        }

        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }

        .logo {
            display: inline-block;
            text-decoration: none;
        }

        .logo h1 {
            color: rgb(130, 106, 251);

        }
    </style>

</head>

<body style="background-color: #e9ecef;">

    <!-- start body -->
    <table cellpadding="0" cellspacing="0" width="100%" style="border: 0;">

        <tr>
            <td align="center" style="background-color: #e9ecef;">
                <table cellpadding="0" cellspacing="0" width="100%"
                    style="max-width: 600px; border:0; border-radius: 10px; background-color: #ffffff;">
                    <tr>
                        <td align="center" valign="top" style="padding: 30px 24px;">
                            <a href="javascript:void(0)" class="logo" style="display: inline-block;" target="_blank">
                                <h1>Customer Voucher</h1>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- end logo -->

        <!-- start hero -->
        <tr>
            <td align="center" style="background-color: #e9ecef;">
                <table cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; border:0;">
                    <tr>
                        <td
                            style="text-align:left; background:#ffffff; padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                            <h2 class="email_heading"
                                style="margin: 0; text-align: center;  font-weight: 700; letter-spacing: -1px; line-height: 48px; color: rgb(130, 106, 251)">
                                Dear: 
                                ' . $customerName . '
                            </h2>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- end hero -->

        <!-- start copy block -->
        <tr>
            <td align="center" style="background-color: #e9ecef;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                    <!-- start copy -->
                    <tr>
                        <td
                            style="background-color:#ffffff; text-align:left; padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">
                                Congratulations on <strong>wining 20% off</strong> on your next purchase at nishat! 
                                Please click the link below to reveal your Voucher:
                            </p>
                        </td>
                    </tr>
                    <!-- end copy -->

                    <!-- start copy -->
                    <tr>
                        <td
                            style="background-color:#ffffff; text-align:left; padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">
                            <strong>OTP Code</strong><br> 
                                ' . $otpCode . '
                            </p>
                        </td>
                    </tr>
                    <!-- end copy -->

                    <!-- start button -->
                    <tr>
                        <td align="left" style="background-color:#ffffff;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="border: 0;">
                                <tr>
                                    <td align="center" style="padding: 12px; background-color:#ffffff;">
                                        <table cellpadding="0" cellspacing="0" style="border: 0;">
                                            <tr>
                                                <td
                                                    style="text-align:center; background-color:rgb(88, 56, 250); border-radius: 6px;">
                                                    <a href="http://localhost/qrtexting/pincode.php?voucher=' . $voucher . '&customerNumber=' . $customerNumber . '"
                                                        target="_blank"
                                                        style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">
                                                        Reveal Your Voucher</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- end button -->

                    <!-- start copy -->
                    <tr>
                        <td
                            style="background-color:#ffffff; text-align:left; padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">
                                This voucher is valid unit <strong>' . date('d/F/Y') . '</strong>. Make sure to use the 
                                contact number and email ID provided during the form submissioin.
                            </p>
                        </td>
                    </tr>
                    <!-- end copy -->

                    <!-- start copy -->
                    <tr>
                        <td
                            style="text-align:left; background-color:#ffffff; padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                            <p style="margin: 0;">Thanks and Regards,<br>Nishat</p>
                        </td>
                    </tr>
                    <!-- end copy -->

                </table>
            </td>
        </tr>
        <!-- end copy block -->

    </table>
    <!-- end body -->

</body>

</html>
';