<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration in Openadvisors.ru</title>
</head>
<body>
    <table border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:30px 0;" width="100%">
        <tr>
            <td style="padding:10px 0 30px;">
                <h2 style="color:#333;font:bold 24px sans-serif;">Registration in openadvisors.ru</h2>
            </td>
        </tr>
        <tr>
            <td style="color:#333; font:16px Arial, sans-serif; line-height:30px; -webkit-text-size-adjust:none;">
                Your (or somebody) registered in FRV-Prof by your e-mail. If it was not you - just never mind. If it was your - please press this reference to complete registration:
            </td>
        </tr>
        <tr>
            <td style="color:#333; font:16px Arial, sans-serif; line-height:30px; -webkit-text-size-adjust:none;">
                Вы (или кто-то) сделали регистрацию в ФРВ-проф с Вашим е-мейлом. Если это были не Вы - не обращайте внимания. А если это были Вы - то нажмите ссылку, чтобы завершить регистрацию:
            </td>
        </tr>
        <tr>
            <td style="padding:30px 0;">
                <a href="{{ url('user/verify', $user->verifyUser->token) }}" style="font:16px sans-serif; color:green;">Complete registration (Подтвердить Email)</a>
            </td>
        </tr>
        <tr>
            <td style="padding-top:70px;font:14px Arial sans-serif;color:#333;font:14px Arial, sans-serif;color:#333;">
                ООО "Открытые инновации"</br>
            </td>
        </tr>
    </table>
</body>
</html>