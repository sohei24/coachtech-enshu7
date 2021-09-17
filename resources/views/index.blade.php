<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
<!-- 要確認 -->
  <link rel="stylesheet" href="/public/reset.css"/>
  <link rel="stylesheet" href="/public/style.css"/>
<!-- ここまで -->
</head>

<body>
  <div class= "container">
    <div class="sub-container">
      <h1>Todo List</h1>
      <form action="/todo/create" method="post">
      @csrf
        <input type="text" name="content">
        <input type="submit" value="追加">
      </form>
<!-- 以下テーブル -->
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
      @foreach ($items as $item)
        <tr>
          <td>{{$item->created_at}}</td>
          <td><input type="text" name="content" value="{{$item->content}}"></td>
          <td>
            <form action="/todo/update" method="post" name="content">
            @csrf
            <input type="submit" name="" value="更新"></form>
          </td>
          <td>
            <form action="/todo/delete" method="post">
            @csrf
            <input type="submit" name="" value="削除"></form>
          </td>
        </tr>
      @endforeach
      </table>
    </div>
  </div>

<style>
  body {
    background-color: DarkSlateBlue;
  }

  .container {
    width: 80%;
    margin: 0 auto;
    background-color: white;
    border-radius: 10px;
    }

    .sub-container{
      padding: 20px;
    }

  table {
    background-color: pink;
    width: 100%;
    text-align: center;
  }

</style>
</body>

</html>

