 <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $host = getenv('DB_HOST');
    $db   = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_errno) {
        echo "Error: " . $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT 
            posts.id AS post_id,
            posts.title,
            posts.body,
            posts.created_at,
            authors.id AS author_id,
            authors.first_name,
            authors.last_name,
            authors.email
        FROM posts
        INNER JOIN authors ON posts.author_id = authors.id
        ORDER BY posts.created_at DESC";

    $result = $mysqli->query($sql);

    $posts = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    } else {
        echo "SQL Error: " . $mysqli->error;
    }

    $mysqli->close();
    ?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bootstrap demo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
 </head>

 <body>

     <div class="container">
         <div class="row">

             <?
                foreach ($post as $key => $posts) {
                ?>

                 <div class="card" style="width: 18rem;">
                     <div class="card-body">
                         <h5 class="card-title"><?= $post['title']; ?></h5>
                         <p class="card-text"><?= $post['title']; ?></p>
                     </div>
                 </div>
                 
             <?
                }
                ?>
             </ul>
         </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
 </body>

 </html>