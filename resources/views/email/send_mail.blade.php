<!DOCTYPE html>
<html>
<head>
    <title>Send Mail</title>
    <style type="text/css">
        /* reset styles */
        body, #bodyTable, #bodyCell {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }
        table {
            border-collapse: collapse;
        }
        img, a img {
            border: 0;
            outline: none;
            text-decoration: none;
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            padding: 0;
        }
        p {
            margin: 1em 0;
            padding: 0;
        }

        /* email styles */
        #emailContainer {
            background-color: #f7f7f7;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            line-height: 1.4;
            color: #333333;
            width: 100%;
        }
        #emailHeader {
            background-color: #ffffff;
            border-bottom: 1px solid #dddddd;
            padding: 20px;
        }
        #emailHeader h1 {
            color: #333333;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        #emailContent {
            background-color: #ffffff;
            padding: 20px;
        }
        #emailFooter {
            background-color: #f7f7f7;
            border-top: 1px solid #dddddd;
            padding: 20px;
        }
        #emailFooter p {
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
    <table id="bodyTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td id="bodyCell" align="center" valign="top">
                <table id="emailContainer" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td id="emailHeader">
                            <h1>Send Mail</h1>
                        </td>
                    </tr>
                    <tr>
                        <td id="emailContent">
                            <p>Hello {{ $user->email }},</p>
                            <p>Thank you for using our service.</p>
                            <p>Best regards,</p
