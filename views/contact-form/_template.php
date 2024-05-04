<?php
$template = <<<MAIL
<html>
    <body style="margin:0; font-family:sans-serif;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td height="60" bgcolor="#e6e6e6"></td>
                </tr>
                <tr>
                    <td bgcolor="#e6e6e6">
                        <center>
                            <table bgcolor="#FFF" width="600" style="padding:20px 30px; border-bottom:2px solid #CCC; border-top:6px solid #ef2b63;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style="width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:50%;">
                                                            <img style="height:60px; width:auto;" src="http://www.tchoukball.it/wp-content/themes/tbi-theme/assets/img/tbi-logo.png" />
                                                        </td>
                                                        <td style="width:50%;">
                                                            <h4 style="margin:0; text-align:right; color:#313131; font-size:18px; font-weight:400;">$topic</h4>
                                                            <p style="margin:0; text-align:right; color:#88A; font-size:12px; font-weight:700;">$date</h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table bgcolor="#FFF" width="600" style="padding:30px;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p style="font-size: 16px; color:#313131; line-height:28px; margin:0;"><strong>$firstname $lastname</strong> ci ha inviato una richiesta di informazioni tramite il form contatti del nostro sito:</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="font-size:14px; color:#668; line-height:24px;">$message</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <table cellpadding="0" cellspacing="0">
                                                    <tbody width="120" bgcolor="#242f7c">
                                                        <tr>
                                                            <td colspan="3" height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30"></td>
                                                            <td>
                                                                <a style="width:100%; text-align:center; font-weight:700; font-size:16px; color:#FFF; text-decoration:none; text-transform:uppercase;" href="mailto:$from?subject=Re%3A$topic">Rispondi</a>
                                                            </td>
                                                            <td width="30"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" height="10"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="border-top:6px solid #ef2b63; padding-top:30px;" width="600">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p style="margin:0; color:#88a; text-align:center; font-size:10px;">© 2019 TBI - Tchoukball Italia</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td height="60" bgcolor="#e6e6e6"></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
MAIL;
