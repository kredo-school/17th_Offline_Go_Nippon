<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Go Nippon! - User List</title>
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


    /* === アイコン部分 === */
    .icons {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .icons i {
      font-size: 22px;
      cursor: pointer;
    }

    .username {
      font-size: 14px;
      text-align: center;
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

    /* === 検索バー === */
    .search-bar {
      padding: 40px 80px 10px 80px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-bar input[type="text"] {
      flex: 1;
      max-width: 400px; 
      padding: 10px 15px;
      border: 1.5px solid #9F6B46;
      border-radius: 8px;
      font-family: inherit;
      color: #9F6B46;
      background-color: #ffffff;
    }

    .search-bar input[type="text"]:focus {
      outline: none;
      border-color: #9f6b46;
      box-shadow: 0 0 5px #9F6B46;
    }

    .search-bar button {
      background-color: #9F6B46;
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 8px;
      font-family: inherit;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .search-bar button:hover {
      background-color: #9F6B46;
    }

    /* === テーブル部分 === */
    table {
      width: 85%;
      margin: 0 auto;
      border-collapse: collapse;
      text-align: left;
      margin-top: 20px;
    }

    th, td {
      border-bottom: 1px solid #9F6B46;
      padding: 12px 10px;
    }

    th {
      font-weight: 600;
      color: #9F6B46;
    }

    td {
      font-size: 14px;
    }

    /* === 名前リンク部分 === */
    table a {
    text-decoration: none;
    color: #9F6B46;
    font-weight: 400;
    transition: color 0.2s ease;
    }

    table a:hover {
    color: #9f6b4670;
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

    /* === プロフィール画像アイコン === */
    .profile-icon {
      width: 35px;
      height: 35px;
      background-color: #ffffffd3;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffffc0;
      font-size: 20px;
    }

    /* === ステータス === */
    .status-active {
      color: green;
      font-weight: bold;
    }

    .status-inactive {
      color: red;
      font-weight: bold;
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

  </style>
</head>
<body>

  <!-- === ヘッダー === -->
  <header>
    
  </header>

  <!-- === ナビゲーション === -->
  <nav>
    <a href="#" class="active">User</a>
    <a href="#">Post</a>
    <a href="#">Category</a>
  </nav>

  <!-- === 検索バー === -->
  <div class="search-bar">
    <input type="text" placeholder="Search by Name...">
    <button>Search</button>
  </div>

  <!-- === ユーザー一覧テーブル === -->
    <table>
    <thead>
        <tr>
        <th>#</th>
        <th>Profile</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>Status</th>
        <th>Last Login</th>
        <th></th> <!-- ← ドロップダウン用 -->
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>1</td>
        <td><div class="profile-icon">👤</div></td>
        <td>Mark</td>
        <td><a href="#">Otto</a></td>
        <td>@mdo</td>
        <td>Philippines</td>
        <td><span class="status-active">● </span>Active</td>
        <td>2025-10-06 13:25</td>
        <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item text-success"><i class="fa-solid fa-user-check me-2"></i>Activate</button></li>
                <li><button class="dropdown-item text-danger"><i class="fa-solid fa-user-slash me-2"></i>Deactivate</button></li>
            </ul>
            </div>
        </td>
        </tr>
        <tr>
        <td>2</td>
        <td><div class="profile-icon">👤</div></td>
        <td>Jacob</td>
        <td><a href="#">Thornton</a></td>
        <td>@mdo</td>
        <td>USA</td>
        <td><span class="status-active">● </span>Active</td>
        <td>2025-10-06 13:25</td>
        <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item text-success"><i class="fa-solid fa-user-check me-2"></i>Activate</button></li>
                <li><button class="dropdown-item text-danger"><i class="fa-solid fa-user-slash me-2"></i>Deactivate</button></li>
            </ul>
            </div>
        </td>
        </tr>
        <tr>
        <td>3</td>
        <td><div class="profile-icon">👤</div></td>
        <td>Larry</td>
        <td><a href="#">the Bird</a></td>
        <td>@mdo</td>
        <td>Australia</td>
        <td><span class="status-inactive">● </span>Inactive</td>
        <td>2025-10-06 13:25</td>
        <td class="text-end">
            <div class="dropdown">
            <button class="btn-dropdown" type="button">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item text-success"><i class="fa-solid fa-user-check me-2"></i>Activate</button></li>
                <li><button class="dropdown-item text-danger"><i class="fa-solid fa-user-slash me-2"></i>Deactivate</button></li>
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

</body>
</html>