<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Winners</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 60px 20px;
    }

    h2 {
      margin-bottom: 30px;
      color: #333;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 100%;
      max-width: 400px;
    }

    .button-container a button {
      padding: 12px 20px;
      font-size: 16px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.2s ease;
      width: 100%;
    }

    .button-container a button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <h2>Which Winners List do you want to edit?</h2>

  <div class="button-container">
    <a href="manage_winners_2023.php"><button>Design Championship 2023</button></a>
    <a href="manage_winners_2022.php"><button>Design Championship 2022</button></a>
    <a href="manage_winners_2021.php"><button>Design Championship 2021</button></a>
  </div>

</body>
</html>
