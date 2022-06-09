


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <form  enctype="multipart/form-data" action="./insert.php" method = "POST">
        <div class="file-up">
            <!-- <fieldset>" method "POST"> -->
                <label>名前：<input type="text" name="name"></label><br>
                <label>アドレス：<input type="text" name="address"></label><br>
                <label>色：<input type="text" name="color"></label><br>
                <!-- <div class = "file-up">
                   <input type="hidden" name = "MAX_FILE_SIZE" value = "1048567" /> -->
                <label>画像：<input type="file" name="image" /></label><br>
                <label><textArea name="content"  rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
