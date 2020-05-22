<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - SEB - Pangalink-net</title>
    </head>
    <body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEArgvV/mnkBdwuKWMgo5JG6RwjAfdtZQRxmzmlglT8uQrhxLOw
0z1dmbBfLvmyb/OVwIBA6Qm/FoiwyvhCR0BRi4fNWRE17u5B235ao8In2aQKRqDv
IxasBg9yJr8fdbPcqXdcaJWdRpyBJvwvg0opazdldfWa5uMK0d+C7tIDFrT+EDpm
x99xyOFUMk4Dv8ZukvJYuY+l/JReduQgcrIdR3uCQMfgrYQCQSBfL9d6A4qxE7Lu
WKEWJhQsOwq3FoldIc8gwm/Me/WLMMQA7rFtxLGvlgg3cuIai0yVb4RafFo9UJqO
iwRSKqxLdMnjvsGGULIGc1/LV2RgHHRIh2mC/QIDAQABAoIBAQCiDOsmgrmIq0Vf
y6gsJJpZmZUO063LjKOqf7YW78KPGA618wkE5fIskwdM2bjGe+pG3iOR1z1QYd0a
XqR3au+CFuOftmKdIMG4+KC0MKaiAhZ/RIDkDswEqIUEhpdoJBukvjoQNp3FjRrD
jbM/buG5rk6N0ix0JZmBZ7alXmz5yelV3aC7UWxmBLfgX+k53+o88KFtBYwJN5qY
pqJfGjY1SoYNAxUcCT2nz4kHxYdJMbk5DtjMTwKydGOLkkjXKdgpIL6PJXD5gwuV
qCqZ94hmXTAlFtTnDTTIE7b4aK4JqcEd6LVmj3ksWKoyILpFCaINEKyl0EI0hz7x
G0rbCxEBAoGBAOMMbVUv4luZAMiFlqmQKyY7WnmP+H4wQ/svf/x2L9d+SqDSlxEz
yNYJ4p5qJQx+PqRX8r6y+WN4E9m4ISw8gLcxZYWepXGo7x18d9Af18HcI+qc4Kw4
HXrZE1X9O83yyjn2s+6CXuYFZkUE/3Qu69e3c9GCDY8mfr6/ykb0m4FRAoGBAMQ9
P4HBqh7mHka/uvy0x2Iy3RF3U30NfpIqPJuUeofoGWOwgYUe82ZowhIZBcjvKqUH
kZfc7wowPtMXKwnUkY22CwcHHG6Y4KYnZvS0dgOEHEzKzv827tz+QguXZ8CIdLK3
0ZFAoA2zYynq50xQRGjPb3hCVoOo3GtoiTLeC1vtAoGBAK0CpDFcmpz3uvwRp5uv
yuGIKsok5dKqTrMSH/Gt0YjgqFdiAVFPZ4OJ5tCVy4N4k51BkyyzTov4TRADWevO
crqlflnSaPlyJDsQxG+oRA1qBUhaoG07GWOqFCzbGX42uthuX++oEk4u4R5Iz6ul
sXsgRLXp5xEk4UHS/X0SGYjxAoGBAKLvs945/dWf/f2CTnBqba5ESzeoWyLW5IPa
G+6V7tMPTJ1wPWpZk4ExdAnwytPWeRMDYMi2Aaf0/QTqFKsZ2yzNvQQ9zEasGsL6
rkp52A79Tz4Xmp1fcB7/4bicIuJCqpqFc7Tl8r7NdoWkbB35+4MG0SgJ9KlmuHVa
G6inosjVAoGATiscds8cZI1ICocoIdqv/22Hx7AxMXPhQ8uQFtxDdakMJAzFYoBj
Wu/i3bpURHv/V2iWlQaimh6UephL0OZNAgmfQ9DqvLJLA+RcpkuDHK/5bKAcGMfr
/YkPm2GkqICLHF1lxEZa0/ASaSmmrLt1JjkEqbOgpdFxWdJwAJjPH9o=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => "ÕIE MÄGER",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=success",
        "VK_CANCEL"      => "http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=cancel",
        "VK_DATETIME"    => "2020-05-21T13:20:46+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T13:20:46+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=success068http://localhost:8080/project/dBH9bYvr65xg2zJu?payment_action=cancel0242020-05-21T13:20:46+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* X+G0EYphHGM19kl12pB1Pt5UmT4g+H1TPxwex6v0PftmfKeukuv2fE+95z+nTHV8Q/SNocbdOjPjUWbAX4eWWbGA1+F0n9LbG7Bkjmx+aMP5kLWnkyAOgJsH89w/YBmnMEJQWPL+Mh3H35+8s5dlYRkSUMijoxhHLZz/sqmZxENnCTXSUudwM7e0AEd1ufnC+VMd6JYKA0YwoEfrl/m0G5hQ/Poix0E7tBmARhLNgr4jSZNLkf+1ttdV65Gl2oRBEaKX0tEeznUMkWz9UJ6HugyHqTtKi8e2MRJ8vN/35zH0vUOw3btfZ/frY162W+4nn5kWnhEGJG6zIATELKvEcg== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"SEB"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/seb-common">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
<?php foreach($fields as $key => $val):?>
                <tr>
                    <td><strong><code><?php echo $key; ?></code></strong></td>
                    <td><code><?php echo htmlspecialchars($val); ?></code></td>
                </tr>
<?php endforeach; ?>

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
            </table>
        </form>

    </body>
</html>
