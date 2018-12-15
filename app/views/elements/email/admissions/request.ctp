<html>
    <head></head>
    <body>
        <style type="text/css">
            .element{
                text-shadow:#000000;
                font-size:16px;
                color: #000000;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                padding: 0px 5px;
            }
            .title{
                font-family: Verdana, Arial, Helvetica, sans-serif;
                text-shadow:#000000;
                font-size:16px;
                color:#FFFFFF;
            }
        </style>
        <table style="direction: ltr;" class="maintable" width='100%' cellspacing='0' cellpadding='2' bgcolor="#ffffff">
            <tr bgcolor='#0d9f49 '>
                <td height='30' colspan='2'>
                    <font class="title">
                    <strong>{{mailsubject}}</strong>
                    </font>
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center' height="30"></td>
            </tr>
<!--            <tr>
                <td align='left' style='color:#FFFF00'>
                    <font class="element">Name:</font>
                </td>
                <td>
                    <font class="element">{{name}}</font>
                </td>
            </tr>-->
            <tr>
                <td align='center'  colspan='2'>
                    <font class="element">{{message}}</font>
                </td>
            </tr>
            <tr>
                <td colspan='2' height="30"></td>
            </tr>
            <tr>
                <td height='30' colspan='2' bgcolor='#0d9f49 '></td>
            </tr>
        </table>
    </body>
</html>