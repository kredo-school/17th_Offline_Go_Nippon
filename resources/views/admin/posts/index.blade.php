<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Go Nippon!</title>
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">
  <!-- script cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* === 全体のスタイル === */
    body {
      font-family: 'Source Serif Pro', serif;
      background-color: #f5f5f5;
      color: #9F6B46;
      margin: 0;
      padding: 0;
    }

    /* === ヘッダー部分 === */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px 50px;
      background-color: #FFFBEB;
    }

    /* === ナビゲーションバー === */
    nav {
      display: flex;
      justify-content: flex-start;
      gap: 40px;
      padding: 20px 80px;
      border-bottom: 2px solid #9F6B46;
    }

    nav a {
      text-decoration: none;
      color: #9F6B46;
      font-weight: 500;
      padding-bottom: 5px;
    }

    nav a.active {
      border-bottom: 3px solid #9F6B46;
    }

    /* ------------------------------
       メインコンテンツ部分
    ------------------------------ */
    main {
      padding: 40px 60px;
    }

    /* フィルター（カテゴリ・都道府県選択） */
    .filters {
      display: flex;
      gap: 60px;
      margin-bottom: 30px;
    }

    .filter-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
    }

    .filter-group select {
      width: 200px;
      padding: 6px;
      border: 1px solid #9F6B46;
      border-radius: 5px;
      color: #9F6B46;
    }

    /* ------------------------------
       テーブル部分
    ------------------------------ */
    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-size: 14px;
    }

    th {
      border-bottom: 2px solid #9F6B46;
;
      padding: 10px;
      color: #9F6B46;
    }

    td {
      color: #9F6B46;
      border-bottom: 1px solid #9F6B46;
      padding: 12px;
      vertical-align: middle;
    }

    /* 投稿画像 */
    .post-img {
      width: 100px;
      height: 100px;
      border-radius: 8px;
      object-fit: cover;
    }

    /* カテゴリーのタグ */
    .tag {
      display: inline-block;
      border: 1px solid #9F6B46;
      border-radius: 5px;
      padding: 3px 10px;
      color: #9F6B46;
      background-color: #ffffff;
    }

    /* ステータス（Visible） */
    .status {
      display: flex;
      align-items: center;
      gap: 5px;
      color: #9F6B46;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      background-color: #3EC70B; /* 緑の点 */
      border-radius: 50%;
    }

    /* === ページネーション === */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px 0;
      gap: 8px;
    }

    .pagination button {
      border: none;
      background-color: transparent;
      color: #9F6B46;
      font-size: 14px;
      cursor: pointer;
    }

    .pagination .active {
      background-color: #9F6B46;
      color: #fff;
      border-radius: 5px;
      padding: 4px 10px;
    }

      /* ・・・ボタン */
  .btn-dropdown {
    background: transparent;
    border: none;
    color: #9F6B46;
    font-size: 16px;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 6px;
  }

  .btn-dropdown:hover {
    background-color: #f1f1f1;
  }

    /* ドロップダウンメニュー */
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    min-width: 150px;
    z-index: 10;
    }

    .dropdown-menu li {
    list-style: none;
    }

    .dropdown-item {
    width: 100%;
    text-align: left;
    border: none;
    background: transparent;
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
    }

    .dropdown-item:hover {
    background-color: #f8f9fa;
    }

    /* text colors */
  .text-success {
    color: #28a745;
  }

  .text-danger {
    color: #dc3545;
  }

  /* 表示制御（クリックで開閉） */
  .dropdown:hover .dropdown-menu {
    display: block;
  }

  </style>
</head>
<body>

  <!-- ヘッダー部分 -->
  <header>
  </header>

  <!-- ナビゲーション部分 -->
  <nav>
    <a href="#">User</a>
    <a href="#" class="active">Post</a>
    <a href="#">Category</a>
  </nav>

  <!-- メインコンテンツ -->
  <main>
    <!-- フィルター部分 -->
    <div class="filters">
      <div class="filter-group">
        <label for="category">Category</label>
        <select id="category">
          <option value="">select</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="prefecture">Prefecture</label>
        <select id="prefecture">
          <option value="">select</option>
        </select>
      </div>
    </div>

    <!-- 投稿一覧テーブル -->
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>POST</th>
          <th>CATEGORY</th>
          <th>PREFECTURE</th>
          <th>OWNER</th>
          <th>STATUS</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img src="https://images.unsplash.com/photo-1554797589-7241bb691973?w=200" class="post-img" alt="Tokyo Tower"></td>
          <td><span class="tag">Tower</span></td>
          <td>Tokyo</td>
          <td>Mark</td>
          <td><div class="status"><div class="status-dot"></div>Visible</div></td>
          <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                  <button class="dropdown-item text-danger" data-bs-toggle="modal" ><i class="fa-solid fa-ban text-danger"></i>Hide</button>
                </li>
            </ul>
            </div>
        </td>
        </tr>
        <tr>
          <td>2</td>
          <td><img src="https://images.unsplash.com/photo-1554797589-7241bb691973?w=200" class="post-img" alt="Kyoto Temple"></td>
          <td><span class="tag">Temple</span></td>
          <td>Kyoto</td>
          <td>Jacob</td>
          <td><div class="status"><div class="status-dot"></div>Visible</div></td>
          <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                  <button class="dropdown-item text-danger" data-bs-toggle="modal" ><i class="fa-solid fa-ban text-danger"></i>Hide</button>
                </li>
            </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td><img src="https://images.unsplash.com/photo-1549692520-acc6669e2f0c?w=200" class="post-img" alt="Mt. Fuji"></td>
          <td><span class="tag">Mountain</span></td>
          <td>Yamanashi</td>
          <td>Larry</td>
          <td><div class="status"><div class="status-dot"></div>Visible</div></td>
          <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                  <button class="dropdown-item text-danger" data-bs-toggle="modal" ><i class="fa-solid fa-ban text-danger"></i>Hide</button>
                </li>
            </ul>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- === ページネーション === -->
    <div class="pagination">
        <button>&lt;</button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>&gt;</button>
    </div>
  </main>

</body>
</html>