<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 15px;
            font-family: sans-serif;
            color: #333333;
            text-align: left;
        }
    </style>
</head>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">※このメールはシステムからの自動返信です</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">{{ $contact->contact_name }}様</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">お問い合わせありがとうございます。</td>
        </tr>
        <tr>
            <td height="20">以下の内容で受け付けいたしました。</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">お問い合わせ内容</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="1" style="border-top: 1px solid #000000;"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">{{ $contact->contact_detail }}</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="1" style="border-top: 1px solid #000000;"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td height="20">&copy;{{ config('app.name') }}</a></td>
        </tr>
    </table>
</body>

</html>