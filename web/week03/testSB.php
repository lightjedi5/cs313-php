
    <?php
        try
        {
          $dbUrl = exec("heroku config:get DATABASE_URL -a lit-mesa-27727");
        
          if (empty($dbUrl)) {
            // example localhost configuration URL with postgres username and a database called cs313db
            $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
           }
           
          $dbOpts = parse_url($dbUrl);
        
          $dbHost = $dbOpts["host"];
          $dbPort = $dbOpts["port"];
          $dbUser = $dbOpts["user"];
          $dbPassword = $dbOpts["pass"];
          $dbName = ltrim($dbOpts["path"],'/');
        
          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
        try{
          $statement = $db->query('SELECT username, password FROM note_user');
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
            echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
          }
      }
      catch(PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
      }
    ?>
