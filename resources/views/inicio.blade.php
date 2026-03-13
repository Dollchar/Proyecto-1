<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tienda de Tenis</title>

<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

<!-- Bootstrap -->
@vite(['resources/sass/inicio.scss' , 'resources/css/app.css' , 'resources/js/app.js' ])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.hero{
    background: linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
    url("https://images.unsplash.com/photo-1519741497674-611481863552");
    background-size: cover;
    background-position: center;
    color:white;
    padding:120px 0;
    text-align:center;
}

.product-card img{
    height:200px;
    object-fit:cover;
}

footer{
    background:#111;
    color:white;
    padding:20px;
    text-align:center;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
<div class="container">

<a class="navbar-brand fw-bold" href="#">TenisStore</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link active" href="#">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Productos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Contacto</a>
</li>

</ul>
</div>

</div>
</nav>


<!-- HERO -->
<section class="hero">
<div class="container">

<h1 class="display-4 fw-bold">Los mejores tenis</h1>

<p class="lead">Estilo, comodidad y calidad en cada paso</p>

<button class="btn-17">
  <span class="text-container">
    <span class="text">Ver productos</span>
  </span>
</button>


</div>
</section>

 <div class="container"> 
            <div class="slider">

                <div class="box1 box">
                    <div class="bg"></div>
                    <div class="details">
                        <h1>I'm the first Box</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing 
                            elit. Integer lacinia dui lectus. Donec scelerisque ipsum
                            diam, ac mattis orci pellentesque eget. 
                        </p>
                        <button>Check Now</button>
                    </div>

                    <div class="illustration"><div class="inner"></div></div>
                </div>
                                
                
                <div class="box2 box">
                    <div class="bg"></div>
                    <div class="details">
                        <h1>I'm the second Box</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing 
                            elit. Integer lacinia dui lectus. Donec scelerisque ipsum
                            diam, ac mattis orci pellentesque eget. 
                        </p>
                        <button>Check Now</button>
                    </div>

                    <div class="illustration"><div class="inner"></div></div>
                </div>
                                
                <div class="box3 box">
                    <div class="bg"></div>
                    <div class="details">
                        <h1>I'm the third Box</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing 
                            elit. Integer lacinia dui lectus. Donec scelerisque ipsum
                            diam, ac mattis orci pellentesque eget. 
                        </p>
                        <button>Check Now</button>
                    </div>

                    <div class="illustration"><div class="inner"></div></div>
                </div>
                                
                <div class="box4 box">
                    <div class="bg"></div>
                    <div class="details">
                        <h1>I'm the fourth Box</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing 
                            elit. Integer lacinia dui lectus. Donec scelerisque ipsum
                            diam, ac mattis orci pellentesque eget. 
                        </p>
                        <button>Check Now</button>
                    </div>

                    <div class="illustration"><div class="inner"></div></div>
                </div>
                                
                <div class="box5 box">
                    <div class="bg"></div>
                    <div class="details">
                        <h1>I'm the fifth Box</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing 
                            elit. Integer lacinia dui lectus. Donec scelerisque ipsum
                            diam, ac mattis orci pellentesque eget. 
                        </p>
                        <button>Check Now</button>
                    </div>

                    <div class="illustration"><div class="inner"></div></div>
                </div>
                                
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" class="prev" width="56.898" height="91" viewBox="0 0 56.898 91"><path d="M45.5,0,91,56.9,48.452,24.068,0,56.9Z" transform="translate(0 91) rotate(-90)" fill="#fff"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="next" width="56.898" height="91" viewBox="0 0 56.898 91"><path d="M45.5,0,91,56.9,48.452,24.068,0,56.9Z" transform="translate(56.898) rotate(90)" fill="#fff"/></svg>
            <div class="trail">
                    <div class="box1 active">1</div>
                    <div class="box2">2</div>
                    <div class="box3">3</div>
                    <div class="box4">4</div>
                    <div class="box5">5</div>
            </div>
        </div>   
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/CSSRulePlugin3.min.js"></script>
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/CSSRulePlugin.min.js"></script> -->


<!-- FOOTER -->
<footer>
<p class="mb-0">
© 2026 TenisStore - Todos los derechos reservados
</p>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>