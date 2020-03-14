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
                <td class='ct'>編號</td>
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
            foreach ($row as $k => $r) {
            ?>
                <tr class='pp'>
                    <td class='ct'><?= ($k + 1); ?>.</td>
                    <td class='ct'><?= $r['acc']; ?></td>
                    <td class='ct'><?= $r['name']; ?></td>
                    <td class='ct'><?= ($r['gender'] == 1) ? "男" : "女"; ?></td>
                    <td class='ct'><?= date("Y年m月d日", strtotime($r['birthday'])); ?></td>
                    <td class='ct'><?= $r['email']; ?></td>
                    <td class='ct'><?= $r['text']; ?></td>
                    <td class='ct'>
                        <input type="button" value="編輯" class="editBtn" data-edit="<?=$r['id'];?>">
                        <input type="button" value="刪除" onclick="del('account',<?= $r['id']; ?>)">
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
                    <td>
                        <select name="year" id="year">
                            <option value="1950">1950</option>
                            <option value="1951">1951</option>
                            <option value="1952">1952</option>
                            <option value="1953">1953</option>
                            <option value="1954">1954</option>
                            <option value="1955">1955</option>
                            <option value="1956">1956</option>
                            <option value="1957">1957</option>
                            <option value="1958">1958</option>
                            <option value="1959">1959</option>
                            <option value="1960">1960</option>
                            <option value="1961">1961</option>
                            <option value="1962">1962</option>
                            <option value="1963">1963</option>
                            <option value="1964">1964</option>
                            <option value="1965">1965</option>
                            <option value="1966">1966</option>
                            <option value="1967">1967</option>
                            <option value="1968">1968</option>
                            <option value="1969">1969</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                        </select>年

                        <select name="month" id="month">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>月

                        <select name="day" id="day">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </td>
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
        $(".editBtn").on("click", function() {

            $(".modal").show()
            $("#add").hide()
            $("#cancel").show()
            $("#edit").show()

            let edit_id = $(this).data("edit")

            $("#edit").on("click", function() {
                let acc = $("#acc").val()
                let name = $("#name").val()
                let gender = $("#gender").val()
                let year = $("#year").val()
                let month = $("#month").val()
                let day = $("#day").val()
                let email = $("#email").val()
                let text = $("#text").val()

                $.post("./api/edit.php", {
                    edit_id,
                    acc,
                    name,
                    gender,
                    year,
                    month,
                    day,
                    email,
                    text
                }, function() {
                    location.reload()
                })

            })
        })

        $("#cancel").on("click", function() {
            $(".modal").hide()
        })

        function del(table, id) {
            let msg = "是否確認刪除?"
            if (confirm(msg) == true) {
                $.post("./api/del.php", {
                    table,
                    id
                }, function() {
                    location.reload()
                })
            }
        }

        $(".addData").on("click", function() {
            $(".modal").show()
            $("#add").show()
            $("#cancel").show()
            $("#edit").hide()

            $("#add").on("click", function() {
                let acc = $("#acc").val()
                let name = $("#name").val()
                let gender = $("#gender").val()
                let year = $("#year").val()
                let month = $("#month").val()
                let day = $("#day").val()
                let email = $("#email").val()
                let text = $("#text").val()

                if (acc == "" || name == "" || gender == "" || email == "") {
                    alert("不可空白")
                } else {
                    let regp = /^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/;
                    if (!regp.test(acc)) {
                        alert("帳號必須為英文+數字的組合")
                        $("#acc").val("")
                    } else {
                        $.post("./api/add.php", {
                            acc,
                            name,
                            gender,
                            year,
                            month,
                            day,
                            email,
                            text
                        }, function() {
                            location.reload()
                        })
                    }
                }
            })
        })
    </script>
</body>

</html>