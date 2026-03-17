<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; font-family: Arial, sans-serif;">

    <div style="padding:10px;">

        <div style="background-color:#28a745; color:#ffffff; padding:10px; text-align:center;">
            <h3 style="margin:0;">You have a new enquiry !!</h3>
        </div>

        <table width="100%" cellpadding="0" cellspacing="0"
            style="border-collapse:collapse; margin-top:10px;">

            <tr>
                <th style="border:1px solid #ddd; padding:8px; background-color:#8062c7; color:#fff; text-align:left; width:20%;">
                    Full Name
                </th>
                <td style="border:1px solid #ddd; padding:8px;">
                    {{ $contact['name'] }}
                </td>
            </tr>

            <tr>
                <th style="border:1px solid #ddd; padding:8px; background-color:#8062c7; color:#fff; text-align:left;">
                    Email
                </th>
                <td style="border:1px solid #ddd; padding:8px;">
                    {{ $contact['email'] }}
                </td>
            </tr>

            <tr>
                <th style="border:1px solid #ddd; padding:8px; background-color:#8062c7; color:#fff; text-align:left;">
                    Phone Number
                </th>
                <td style="border:1px solid #ddd; padding:8px;">
                    {{ $contact['phone'] }}
                </td>
            </tr>

            <tr>
                <th style="border:1px solid #ddd; padding:8px; background-color:#8062c7; color:#fff; text-align:left;">
                    Address
                </th>
                <td style="border:1px solid #ddd; padding:8px;">
                    {{ $contact['address'] }}
                </td>
            </tr>

            <tr>
                <th style="border:1px solid #ddd; padding:8px; background-color:#8062c7; color:#fff; text-align:left;">
                    Message
                </th>
                <td style="border:1px solid #ddd; padding:8px;">
                    {{ $contact['message'] }}
                </td>
            </tr>

        </table>

    </div>

</body>
</html>
