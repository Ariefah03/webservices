<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php

$country = "kr";
$category = "science";
$apiKey = "99ca90d4d7cd4c088d5170dbed497765";
$alamatAPI = "https://newsapi.org/v2/top-headlines?country={$country}&category={$category}&apiKey={$apiKey}";

try {
    $data = @file_get_contents($alamatAPI);

    if ($data === false) {
        throw new Exception("Maaf ada yang salah dari codinganmu");
    }

    $dataBerita = json_decode($data);

    if ($dataBerita->status === "ok") {
        echo "<h1 class='text-center'>Berita Sains Terkini</h1>";
        echo "<div class='row'>";

        foreach ($dataBerita->articles as $berita) {
            echo "<div class='col-md-4 mb-3'>";
            if (!empty($berita->urlToImage)) {
                echo "<div class='card'>";
                echo "<img src='{$berita->urlToImage}' alt='{$berita->title}' class='card-img-top'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'><a href='{$berita->url}'>{$berita->title}</a></h5>";
                echo "<p class='card-text'>{$berita->description}</p>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        }

        echo "</div>";
    } else {
        throw new Exception("Maaf ada yang salah dari codinganmu");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
</body>

</html>
