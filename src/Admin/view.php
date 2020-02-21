<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/view.css">
    <?php
    $database = parse_ini_file("config.ini");
    $host = $database['host'];
    $db = $database['db'];
    $user = $database['user'];
    $pass = $database['pass'];

    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $app = $_GET['id'];
    $table = $_GET['table'];


    $sth = $pdo->prepare(
        "SELECT * FROM Student, " . $table . " a1 WHERE a1.SID = Student.SID AND a1.ApplicationNum =" . $app
    );
    ?>
</head>
<body>
<div class="sidenav">
    <img src="img/ewueagle.png" height=125px; width=185px;>
    <br><br>
    <a href="index.php">Home</a>
    <br>
    <a href="edit.php">Edit</a>
    <br>
    <a href="results.php">Results</a>
    <br>
    <a href="prior.php">Prior Awards</a>
    <br>
    <a href="search.php">Search</a>
    <br>
    <a href="new.php">New</a>
    <br><br><br>
    <a href="../index.php?logout=true">Logout</a>
</div>
<div class="main">
    <div class="w3-container">
        <?php $sth->execute();
        foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row): ?>
            <form>
                <fieldset>
                    <legend><h1><?php echo $row['SName'] ?></h1></legend>
                    <b>Student ID</b><br>
                    <p><?php echo $row['SID'] ?> </p>
                    <b> Student Email</b><br>
                    <p><?php echo $row['SEmail'] ?> </p>
                    <b>Major</b><br>
                    <p><?php echo $row['Major'] ?></p>
                    <b>GPA</b><br>
                    <p><?php echo $row['GPA'] ?> </p>
                    <b>Graduation Date</b><br>
                    <p><?php echo $row['PTitle'] ?></p>
                    <b>Objective</b><br>
                    <p><?php echo $row['Objective'] ?></p>
                    <b>Timeline</b><br>
                    <p><?php echo $row['Timeline'] ?></p>
                    <b>Funding Sources</b><br>
                    <p><?php echo $row['FundingSources'] ?></p>
                    <b>Anticipated Results</b><br>
                    <p><?php echo $row['Anticipatedresults'] ?></p>
                    <b>Justification</b><br>
                    <p><?php echo $row['Justification'] ?></p>
                </fieldset>
                <br>
            </form>
        <?php endforeach; ?>
        <a href="search.php">
            <button>Back</button>
    </div>
</div>
<br><br>
</body>
</html>

