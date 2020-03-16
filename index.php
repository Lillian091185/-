<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>上機測驗 | PHP</title>
    <meta name="title" content="上機測驗 | PHP">
    <meta name="description" content="上機測驗PHP">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="上機測驗 | PHP">
    <meta property="og:description" content="上機測驗PHP">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="上機測驗 | PHP">
    <meta property="twitter:description" content="上機測驗PHP">
    <meta property="twitter:image" content="">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php include_once "base.php"; ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/coffee-beans.png" width="30" heigh="30" class="d-inline-block">
                客戶資料
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home"></i>首頁
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="content">
        <div class="row">
            <div class="col-12 my-3">
                <h1 class="text-center text-primary">客戶清單</h1>
                <button class="addData">新增資料</button>
                <hr class="bg-dark">
            </div>
            <div class="text-dark col-12 my-3">
                <form action="./api/qdel.php" method="post">
                    <table class="table table-hover table-success" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="ct">帳號</th>
                                <th class="ct">姓名</th>
                                <th class="ct">性別</th>
                                <th class="ct">生日</th>
                                <th class="ct">信箱</th>
                                <th class="ct">備註</th>
                                <th class="ct">操作</th>
                                <th class="ct">批次刪除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = all("account_info");
                            foreach ($row as $r) {
                            ?>
                                <tr>
                                    <td class='ct'><?= $r['acc']; ?></td>
                                    <td class='ct'><?= $r['name']; ?></td>
                                    <td class='ct'><?= ($r['gender'] == 1) ? "男" : "女"; ?></td>
                                    <td class='ct'><?= $r['birthday']; ?></td>
                                    <td class='ct'><?= $r['email']; ?></td>
                                    <td class='ct'><?= $r['text']; ?></td>
                                    <td class='ct'>
                                        <input type="button" value="編輯" class="editBtn" data-edit="<?= $r['id']; ?>">
                                        <input type="button" value="刪除" onclick="del('account_info',<?= $r['id']; ?>)">
                                    </td>
                                    <td class='ct'>
                                        <input type="hidden" name="id[]" value="<?= $r['id']; ?>">
                                        <input type="checkbox" name="del[]" value="<?= $r['id']; ?>">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <div class="ct">
                        <input type="submit" value="確認刪除">
                    </div>
                </form>
            </div>
        </div>
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
                        <input type="date" name="birthday" id="birthday">
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

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#table").DataTable({
            language: {
                url: './datatables-chinese.json'
            },
            columnDefs: [{
                targets: 3,
                orderable: false,
                searchable: false
            }]
        })

        //註冊編輯按鈕事件
        $(".editBtn").on("click", function() {

            $(".modal").show()
            $("#add").hide()
            $("#cancel").show()
            $("#edit").show()

            let edit_id = $(this).data("edit")

            //使用JSON方式獲取此筆id的資料
            $.get("./api/get_info.php", {
                edit_id
            }, function(info) {
                console.log(info)
                //將獲取的字串轉換成物件
                let edit_data = JSON.parse(info)
                console.log(edit_data)

                $("#acc").val(edit_data.acc)
                $("#name").val(edit_data.name)
                $("#gender").val(edit_data.gender)
                $("#birthday").val(edit_data.birthday)
                $("#email").val(edit_data.email)
                $("#text").val(edit_data.text)
            })

            $("#edit").on("click", function() {
                let acc = $("#acc").val()
                let name = $("#name").val()
                let gender = $("#gender").val()
                let birthday = $("#birthday").val()
                let email = $("#email").val()
                let text = $("#text").val()

                if (acc == "" || name == "" || email == "") {
                    alert("不可空白")
                } else {
                    let regp = /^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/;
                    if (!regp.test(acc)) {
                        alert("帳號必須為英文+數字的組合")
                        $("#acc").val("")
                    } else {
                        let id = edit_id
                        $.post("./api/edit.php", {
                            id,
                            acc,
                            name,
                            gender,
                            birthday,
                            email,
                            text
                        }, function() {
                            location.reload()
                        })
                    }
                }
            })

        })

        //註冊彈窗中取消按鈕事件
        $("#cancel").on("click", function() {
            $(".modal").hide()
        })

        //註冊刪除按鈕函式
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

        //註冊新增資料按鈕事件
        $(".addData").on("click", function() {
            $(".modal").show()
            $("#add").show()
            $("#cancel").show()
            $("#edit").hide()

            $("#acc").val("")
            $("#name").val("")
            $("#gender").val("")
            $("#email").val("")
            $("#birthday").val("")
            $("#text").val("")

            //註冊新增的彈窗中的新增按鈕事件
            $("#add").on("click", function() {
                let acc = $("#acc").val()
                let name = $("#name").val()
                let gender = $("#gender").val()
                let birthday = $("#birthday").val()
                let email = $("#email").val()
                let text = $("#text").val()

                //驗證除了備註以外欄位皆為必填
                if (acc == "" || name == "" || gender == "" || birthday == "" || email == "") {
                    alert("不可空白")
                } else {
                    //驗證帳號格式：英文及數字的組合
                    let regp = /^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/;
                    if (!regp.test(acc)) {
                        alert("帳號必須為英文+數字的組合")
                        $("#acc").val("")
                    } else {
                        //完成新增
                        $.post("./api/add.php", {
                            acc,
                            name,
                            gender,
                            birthday,
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