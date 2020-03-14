<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯頁面</title>
    <link href="css.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.4.1.min.js"></script>
</head>

<body>
    <?php include_once "base.php"; ?>
    <div class="main" style="margin:auto;">
        <h1 class="ct">編輯資料</h1>

        <div class="ct">
            <button class="addData">新增資料</button>
        </div>
        <table class='all'>
            <tr class='tt'>
                <td class='ct'>帳號</td>
                <td class='ct'>姓名</td>
                <td class='ct'>性別</td>
                <td class='ct'>生日</td>
                <td class='ct'>信箱</td>
                <td class='ct'>備註</td>
                <td class='ct'>操作</td>
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
                    <td class='ct'>
                        <input type="button" value="編輯" onclick="edit('account',<?= $r['id']; ?>)">
                        <input type="button" value="刪除" id="del">
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="modal">
            <table class="all">
                <tr>
                    <td>帳號</td>
                    <td><input type="text" name="acc" id="acc"></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td>
                        <select name="gender" id="gender">
                            <option value="1">男</option>
                            <option value="0">女</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>生日</td>
                    <td><input type="text" name="birthday" id="birthday"></td>
                </tr>
                <tr>
                    <td>信箱</td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td>備註</td>
                    <td><input type="text" name="text" id="text"></td>
                </tr>
            </table>
            <div class="ct">
                <button id="add">新增</button>
                <button id="edit">修改</button>
                <button id="cancel">取消</button>
            </div>
        </div>
    </div>
    <script>
        function edit($table, $id) {
            $(".modal").show()
            $("#add").hide()
            $("#cancel").show()
            $("#edit").show()
        }

        $("#cancel").on("click", function() {
            $(".modal").hide()
        })

        $(".addData").on("click", function() {
            $(".modal").show()
            $("#add").show()
            $("#cancel").show()
            $("#edit").hide()

            $("#add").on("click", function() {
                let acc = $("#acc").val()
                let name = $("#name").val()
                let gender = $("#gender").val()
                let birthday = $("#birthday").val()
                let email = $("#email").val()
                let text = $("#text").val()

                if (acc == "" || name == "" || gender == "" || birthday == "" || email == "") {
                    alert("不可空白")
                } else {
                    let regp = /^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/;
                    if (!regp.test(acc)) {
                        alert("帳號必須為英文+數字的組合")
                        $("#acc").val("")
                    }
                }
            })



        })
    </script>
</body>

</html>