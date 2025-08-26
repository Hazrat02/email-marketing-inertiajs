<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Payment Receipt</title>
</head>

<body style="margin:0; padding:0; background:#f7f9fc; font-family:Arial, sans-serif; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f7f9fc; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="650" cellpadding="0" cellspacing="0" style="background:#f7f9fc; margin:0 auto;">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding:20px 0;">
                            <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="PayPal"
                                width="40" style="display:block;">
                        </td>
                    </tr>

                    <!-- Title -->
                    <tr>
                        <td align="center" style="font-size:18px; font-weight:normal; color:#000; padding:10px 20px;">
                            You paid $ 899.92 USD to <br><strong>Apple</strong>
                        </td>
                    </tr>

                    <!-- Button -->
                    <tr>
                        <td align="center" style="padding:15px;">
                            <a href="tel:+8801783195999"
                                style="background:#000; color:#fff; text-decoration:none; padding:10px 20px; border-radius:6px; font-weight:600; display:inline-block;">
                                View or Manage Payment
                            </a>
                        </td>
                    </tr>

                    <!-- Transaction Info -->
                    <tr>
                        <td style="background:#fff; border-radius:6px; padding:20px; font-size:14px; color:#333;">
                            <table width="100%">
                                <tr>
                                    <td valign="top" style="width:50%; font-size:14px; line-height:20px;">
                                        <p style="margin:0; font-weight:bold;">Transaction ID</p>
                                        @php
                                            $trx_id = strtoupper(Str::random(17));
                                          
                                        @endphp
                                        <a href="#"
                                            style="color:#0070ba;  ">{{ $trx_id }}</a>
                                        <p style="margin:10px 0 0; font-weight:bold;">Seller</p>
                                        <p style="margin:0;">Apple<br>
                                            <a href="mailto:billing@cloudflare.com"
                                                style="color:#0070ba;  ">billing@cloudflare.com</a>
                                        </p>
                                    </td>
                                    <td valign="top" align="right"
                                        style="width:50%; font-size:14px; line-height:20px;">
                                        <p style="margin:0;"><strong>Transaction date</strong><br>26 AUG 2025</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Amount Info -->
                    <tr align="end">
                        <td style="padding:20px; font-size:14px; color:#333;">
                            <p style="margin:6px 0 0;"><strong>Subtotal:</strong> $ 899.92 USD</p>
                            <p style="margin:6px 0 0;"><strong>Total:</strong> $ 899.92 USD</p>
                            <p style="margin:6px 0 0;"><strong>Payment:</strong> $ 899.92 USD</p>
                            <p style="margin:10px 0 0; font-size:12px; color:#777;">Charge will appear on your credit
                                card statement as “PAYPAL * Apple”.</p>
                            <p style="margin:0; font-size:12px; color:#777;">Payment sent to <a href="#"
                                    style="color:#0070ba;  ">billing@cloudflare.com</a></p>
                            <hr style="border:none; border-top:1px solid #ddd; margin:20px 0;">

                        </td>
                    </tr>

                    <!-- Button Again -->
                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="tel:+8801783195999"
                                style="background:#000; color:#fff; text-decoration:none;  padding:10px 20px; border-radius:6px; font-weight:600; display:inline-block;">View
                                or Manage Payment</a>
                        </td>
                    </tr>

                    <!-- Dispute Info -->
                    <tr>
                        <td style="padding:10px 20px; font-size:12px; color:#555;">
                            <p style="margin:0; font-weight:bold; color:#000;">Issues with this transaction?</p>
                            <p style="margin:5px 0 20px;">You have 180 days from the date of the transaction to open a
                                dispute in the Resolution Centre.</p>
                        </td>
                    </tr>

                    <!-- Footer Logo -->
                    <tr>
                        <td align="center" style="padding:10px;">
                            <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="PayPal"
                                width="40">

                            <hr style="border:none; border-top:1px solid #ddd; margin:20px 0;">
                        </td>
                    </tr>





                    <!-- Footer Links -->
                    <tr>
                        <td align="center" style="padding:10px;">
                            <a href="https://www.paypal.com/us/cshelp/personal"
                                style="color:#0070ba; text-decoration:none;  margin:0 8px;">Help</a> |
                            <a href="https://www.paypal.com/us/security"
                                style="color:#0070ba; text-decoration:none;  margin:0 8px;">Security</a> |
                            <a href="https://www.paypal.com/us/cshelp/contact-us"
                                style="color:#0070ba;  text-decoration:none; margin:0 8px;">Contact</a>
                        </td>
                    </tr>

                    <!-- Social Icons -->
                    <tr>
                        <td align="center" style="padding:10px;">
                            <a href="https://x.com/PayPal"><img
                                    src="https://cdn-icons-png.flaticon.com/512/1384/1384017.png" width="22"
                                    style="margin:0 5px;"></a>
                            <a href="https://www.instagram.com/paypal/"><img
                                    src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" width="22"
                                    style="margin:0 5px;"></a>
                            <a href="https://facebook.com/PayPal/"><img
                                    src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="22"
                                    style="margin:0 5px;"></a>
                            <a href="https://www.linkedin.com/company/paypal"><img
                                    src="https://cdn-icons-png.flaticon.com/512/3536/3536505.png" width="22"
                                    style="margin:0 5px;"></a>
                        </td>
                    </tr>

                    <!-- Legal Text -->
                    <tr>
                        <td style="font-size:11px; color:#555; line-height:1.6; text-align:left; padding:20px;">
                            <p style="margin:0;">PayPal is committed to preventing fraudulent emails. Emails from PayPal
                                will always contain your full name. <a
                                    href="https://www.paypal.com/us/privacy-center/home" style="color:#0070ba;  ">Learn
                                    to identify phishing</a></p>
                            <p style="margin:10px 0 0;">Please do not reply to this email. To get in touch, go to the
                                PayPal website and click <a href="https://www.paypal.com/us/cshelp/contact-us"
                                    style="color:#0070ba;  ">Help & Contact</a>.</p>
                            <p style="margin:10px 0 0;">Not sure why you received this email? <a
                                    href="https://www.paypal.com/us/legalhub/paypal/useragreement-full"
                                    style="color:#0070ba;  ">Learn more</a></p>
                            <p style="margin:10px 0 0;">PayPal Services in India are provided by PayPal Payments Private
                                Limited (CIN U74990MH2009PTC194653). Users are advised to read the <a
                                    href="https://www.paypal.com/us/legalhub/paypal/upcoming-policies-full"
                                    style="color:#0070ba;  ">terms and conditions</a> carefully.</p>
                            <p style="margin:10px 0 0;">PayPal RT001736:en_GB(en-IN):1.7.0:6487baba2e774</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
