<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="website icon" href="{{url("/img/logo.png")}}">
    <title>Blogger</title>
</head>
<body>
<div class="container-fluid p-2 " style="background-color: #bc382e;">
    <nav class="navbar navbar-expand-lg navbar-light" >
        <img src="{{"/img/logo.png"}}" width="25px">
        <a class="navbar-brand text-light ml-2" href="{{route("routeIndex")}}">Blogger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route("routeLogin")}}" class="nav-link text-light ">Oturum Açın</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="container-fluid">
    @yield("content")
</div>
<div class="container-fluid p-5" style="background-color: #1d2b34;">
    <footer class="container">
        <div class="row">
            <div class="col-4">
                <ul class="list-unstyled">
                    <li class="text-light mb-3"><b>Yardım</b></li>
                    <li><a href="#" class="text-light">Yardım Merkezi</a></li>
                    <li><a href="#" class="text-light">Yardım Forumu</a></li>
                    <li><a href="#" class="text-light">Eğitici Videolar</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="list-unstyled">
                    <li class="text-light mb-3"><b>Topluluk</b></li>
                    <li><a href="#" class="text-light">Blogger Buzz</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="list-unstyled">
                    <li class="text-light mb-3"><b>Geliştiriciler</b></li>
                    <li><a href="#" class="text-light">Blogger API'sı</a></li>
                    <li><a href="#" class="text-light">Geliştirici Forumu</a></li>
                </ul>
            </div>
        </div>
        <hr color="white">
        <div class="row mt-4">
            <ul class="list-unstyled ml-3">
                <li class="list-inline-item"><a href="#" class="text-light">Hizmet Şartları |</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Gizlilik |</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">İçerik Politikası</a></li>
            </ul>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
