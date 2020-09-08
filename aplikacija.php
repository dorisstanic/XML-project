<?php
    date_default_timezone_set('Europe/Zagreb');

    if (isset($_POST['book_name'])) {
        $bookName = $_POST['book_name'];
        $bookDescription = $_POST['book_description'];
        $rating = $_POST['rating'];
        $author = $_POST['author'];
        $recommended = $_POST['recommended']; // 'yes' or 'no'

        $result = '';

        $result .= "<Book>\n";

        // book name
        $result .= '<BookName>' . $bookName . "</BookName>\n";

        // book description
        $result .= '<BookDescription>' . $bookDescription . "</BookDescription>\n";

        // author
        $result .= '<Author>' . $author . "</Author>\n";

        // rating
        $result .= '<Rating>' . $rating . "</Rating>\n";

        // recommended?
        $result .= '<Recommended>' . $recommended . "</Recommended>\n";

        $result .= '</Book>';

        $filename = 'knjiga' . date('Y_m_d_h_i_s') . '.xml';
        file_put_contents($filename, $result);
        die('Uspješno generiran XML!');

        // INSERT INTO books (book_name, book_description) VALUES ($bookName, $bookDescription);
        // SQL injection
        // --; DROP TABLE books;
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fitness & Nutrition</title>
    <style>
      body {margin: auto;}
      .container-fluid {
        max-width: 100%;
        max-height: 100%;
      }
      .body {
        background-image: url("1.jpg");
        max-width: 100%;
        max-height: 100%;
        opacity: 0.8;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -2;
      }

      body,h1, h2 {font-family: "Raleway", Arial, sans-serif}

      h1 {letter-spacing: 6px;
      opacity: 0.5;}

      .fitness {
        color: black;
        font-size: 50px;
        font-variant-caps: all-petite-caps;
        margin-bottom: 50px;
        margin-top: 50px;
      }

      .linija {
        background-color: black;
        opacity: 0.5;
        padding: 10px;
        z-index:-1;
        margin-bottom: 50px;
      }
      .a {
        padding: 10px;
        text-align: right;
        color: white;
        font-weight: 700;
        z-index: 1;
      }

      .a:hover {
        color:white;
        text-decoration: none;
        border: 1px solid white;
        z-index: 2;
      }

      h2 {
        margin-top: 50px;
        margin-bottom: 50px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 30px;
        text-align: center;
        letter-spacing: 1px;
        font-variant-caps: all-petite-caps;
        color: white;
        background-color: #ab564b;
        border: 1px solid white;
      }

      h2:hover {
        text-decoration: none;
        opacity: 0.7;
      }
      .body {
        padding-bottom: 100px;
        padding-top: 50px;
      }
      .footer {
        padding: 10px;
        font-size:15px;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: white;
        color: black;
        opacity: 0.5;
        text-align: center;
        margin-top: 20px;
}
      hr {
        width:60%;
        border: 1px solid white;
        margin-bottom: 50px;
      }

      .membership {
        margin: auto;
        width: 50%;
      }

      .forma {
        color:white;
      }
    </style>
</head>

<body>
  <div class="container-fluid">
    <header class=" text-center" >
      <h1 class="fitness">Fitness & Nutrition</h1>
      <div class="linija">
        <div class="text-center">
          <a href="#" class="a">Home</a>
          <a href="https://www.fitnessblender.com/" class="a">Fitness</a>
          <a href="https://www.bbcgoodfood.com/recipes/collection/quick-and-healthy" class="a">Food</a>
          <a href="https://www.independent.co.uk/topic/sports-fitness" class="a">News</a>
        </div>
      </div>
    </header>

    <div class="body">
        <div class="gym col-6 mx-auto">
          <div class="membership">
          <h2>Gym Membership Form </h2>
          <hr>
        </div>
            <div class="forma">
                <form action="aplikacija.php" method="POST">
                    <!-- naslov knjige -->
                    <div class="form-group">
                        <label for="book-name">Naziv knjige</label>
                        <input title="Ovo je naziv knjige" type="text" name="book_name" class="form-control" id="book-name">
                    </div>
                    <!-- autor knjige -->
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" name="author" class="form-control" id="author">
                    </div>
                    <!-- opis knjige -->
                    <div class="form-group">
                        <label for="book-description">Opis knjige</label>
                        <textarea class="form-control" name="book_description" id="book-description" rows="3"></textarea>
                    </div>
                    <!-- rating knjige -->
                    <div class="form-group">
                        <label for="rating">Vaša ocjena knjige</label>
                        <input type="range" name="rating" class="custom-range" min="1" max="5" step="1" id="rating">
                    </div>

                    <label for="rating">Predlažete li knjigu?</label>
                    <select class="custom-select" name="recommended" id="recommended">
                        <option value="yes">Da</option>
                        <option value="no">Ne</option>
                    </select>
                    <button type="submit" class="btn btn-primary float-right mt-3">Spremi kao XML</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
    <p>

      <p>Copyright &copy; 2020 Fitness&Nutrition. All rights reserved. </p>
      <p> <a href="#">Terms and Conditions</a> <a href="#">Privacy Policy</a></p>



    </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</div>
</body>

</html>
