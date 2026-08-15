<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tools Survey</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      background-color: #f7f3f8;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .page-wrap {
      flex: 1;
      max-width: 900px;
      margin: auto;
      padding: 40px 20px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    h1, h2 {
      color: #4a235a;
    }

    .tool-row {
      margin-bottom: 25px;
    }

    .radio-group label {
      display: inline-block;
      margin-right: 15px;
    }

    footer {
      background-color: #4a235a;
      color: white;
      text-align: center;
      padding: 12px 0;
      margin-top: auto;
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
          <a class="dropdown-item active" href="tools-survey.php">Tools Survey</a>
          <a class="dropdown-item" href="results.php">Survey Results</a>
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

<main class="page-wrap">
  <?php if(isset($_GET['success'])): ?>
  <div class="alert alert-success text-center">
    ✅ Your responses were submitted successfully!
  </div>
<?php elseif(isset($_GET['error'])): ?>
  <div class="alert alert-danger text-center">
    ❌ Submission failed. Please try again.
  </div>
<?php endif; ?>

  <h1 class="mb-4">Technology Tools Usability Survey</h1>
  <p class="mb-4">
    Please rate the following technologies based on how easy they are to use.
    <strong>1 = Easy, 5 = Difficult</strong>
  </p>

  <form action="submit.php" method="POST">

    <?php
    $tools = [
      "HTML" => "Markup language used to structure web pages.",
      "CSS" => "Stylesheet language to design web pages.",
      "JavaScript" => "Programming language to make web pages interactive.",
      "XML" => "Markup language to store and transport data.",
      "Python" => "High-level programming language used for various applications.",
      "MySQL" => "Database system.",
      "PHP" => "Server-side scripting language.",
      "Bootstrap" => "CSS framework for responsive design.",
      "APIs" => "Application programming interfaces.",
      "VS Code" => "Source-code editor."
    ];

    foreach($tools as $tool => $desc){
        $name = $tool === "VS Code" ? "vsCode" : strtolower(str_replace(' ', '', $tool));
        echo "<div class='tool-row'>";
        echo "<strong>$tool:</strong> $desc<br>";
        echo "<div class='radio-group'>";
        for($i=1; $i<=5; $i++){
            echo "<label><input type='radio' name='$name' value='$i' required> $i</label>";
        }
        echo "</div></div>";
    }
    ?>

    <button type="submit" class="btn btn-primary btn-lg mt-3">Submit Survey</button>
    <button type="reset" class="btn btn-secondary btn-lg mt-3 ml-2">Reset</button>

  </form>

</main>

<footer>Created for InfoTech Classes</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>