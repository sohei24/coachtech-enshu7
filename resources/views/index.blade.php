<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
<!-- reset.css -->
  <link rel="stylesheet" href="css/reset.css" type="text/css">
<!-- style.css -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <div class="todos__container">
    <div class="todos__sub-container">
<!-- タイトル -->
        <h2 class="todos__title">Todo List</h1>
<!-- 上部追加欄 -->
        <section class="adding-container">
          <form action="/todo/create" method="post">
          @csrf
            <input type="text" name="content" class="adding-box">
            <input type="submit" class="adding-btn btn" value="追加">
          </form>
        </section>
<!-- 下部テーブル -->
      <table class="todos__table">
        <tr class="todos__table--tr">
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
      @foreach ($items as $item)
        <tr class="todos__table--tr">
          <td class="todos__table--created_at_items">
            {{$item->created_at}}
          </td>
          <form action="/todo/update" method="post" name="content">
            @csrf
            <td>
              <input class="todos__table--task_items_id" type="hidden" name="id" value="{{$item->id}}">
              <input class="todos__table--task_items_content" type="text" name="content" value="{{$item->content}}">
            </td>
            <td>
              <input type="submit" value="更新" class="updating-btn btn"></form>
            </td>
          </form>
          <td>
            <form action="/todo/delete" method="post">
            @csrf
              <input type= "hidden" name="id" value="{{$item->id}}" class="deleting__items--id">
              <input type="submit" class="deleting-btn btn" value="削除">
            </form>
          </td>
        </tr>
      @endforeach
      </table>
    </div>
  </div>
</body>

</html>

