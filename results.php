<?php
require_once 'config.php';

// ✅ Fetch sum and average for each tool
$tools = ['html','css','javascript','xml','python','mysql','php','bootstrap','apis','vsCode'];
$summaries = [];

foreach($tools as $tool){
    $result = $conn->query("SELECT SUM($tool) AS sum, AVG($tool) AS avg FROM info_tech_feedback");
    $row = $result->fetch_assoc();
    $summaries[$tool] = [
        'sum' => $row['sum'],
        'avg' => round($row['avg'], 2)
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Survey Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">

  <style>
.navbar-toggler {
  border-color: white;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Active nav fix */
.nav-link.active {
  color: #ffffff !important;
  font-weight: bold;
}
    body {
      background-color: #f8f9fa;
    }
    .results-card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    th {
      background: #343a40;
      color: white;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="home.html">Term Project</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
          aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mainNav">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="home.html">Home</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" data-toggle="dropdown">Info Tech</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="intro.html">Info Tech Intro</a>
          <a class="dropdown-item" href="open-source.html">Open Source</a>
          <a class="dropdown-item" href="survey.html">Open Source Survey</a>
          <a class="dropdown-item" href="tools.html">Tools</a>
          <a class="dropdown-item" href="tools-survey.php">Tools Survey</a>
          <a class="dropdown-item active" href="results.php">Survey Results</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Interests</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="interests.html">Interests Intro</a>
          <a class="dropdown-item" href="movie1.html">Movie 1</a>
          <a class="dropdown-item" href="movie2.html">Movie 2</a>
          <a class="dropdown-item" href="movie3.html">Movie 3</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.html">About</a>
      </li>

    </ul>
  </div>
</nav>

<!-- RESULTS SECTION -->
<div class="container my-5">

  <div class="card results-card">
    <div class="card-body">
      <h2 class="text-center mb-4">Survey Results Summary</h2>

      <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
          <thead>
            <tr>
              <th>Tool</th>
              <th>Total Votes (SUM)</th>
              <th>Average Score</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($summaries as $tool => $data): ?>
              <tr>
                <td class="text-uppercase font-weight-bold"><?php echo htmlspecialchars($tool); ?></td>
                <td><?php echo $data['sum']; ?></td>
                <td><?php echo $data['avg']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="text-center mt-4">
        <a href="tools-survey.php" class="btn btn-primary">Back to Survey</a>
      </div>

    </div>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>