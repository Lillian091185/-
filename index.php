<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>清單頁面</title>
    <link href="css.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.4.1.min.js"></script>
</head>

<body>
    <?php include_once "base.php"; ?>

    <div class="main" style="margin:auto;">
        <h1 class="ct">
            既有名單
        </h1>
        <table class='all' width="70%">
            <tr class='tt'>
                <td class='ct'>帳號</td>
                <td class='ct'>姓名</td>
                <td class='ct'>性別</td>
                <td class='ct'>生日</td>
                <td class='ct'>信箱</td>
                <td class='ct'>備註</td>
            </tr>
            <?php
            $row = all("account");
            foreach ($row as $r) {
            ?>
                <tr class='pp'>
                    <td class='ct'><?= $r['acc']; ?></td>
                    <td class='ct'><?= $r['name']; ?></td>
                    <td class='ct'><?= ($r['gender'] == 1) ? "男" : "女"; ?></td>
                    <td class='ct'><?= $r['birthday']; ?></td>
                    <td class='ct'><?= $r['email']; ?></td>
                    <td class='ct'><?= $r['text']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="ct">
        <button onclick="javascript:location.href='edit.php'">編輯資料</button>
    </div>
</body>

</html>