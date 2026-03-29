@extends('layouts.app')

@section('title', 'Sobre nosotros — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header info-page-header--wide">
        <span class="info-eyebrow">Nuestra historia</span>
        <h1>Sobre Kuke's</h1>
        <p>Nacimos de la pasión por los sneakers y la convicción de que cada par cuenta una historia.</p>
    </div>

    <div class="info-page-body">
        <div class="about-hero">
            <img src="https://images.unsplash.com/photo-1556906781-9a412961a28c?w=1200&q=80" alt="Kuke's sneaker store">
        </div>

        <div class="about-content">
            <div class="about-block">
                <h2>Una nueva era del sneaker</h2>
                <p>Kuke's nació en 2021 en Ciudad de México con una misión clara: democratizar el acceso a los tenis más exclusivos del mundo. Lo que empezó como una pequeña tienda en línea se ha convertido en la referencia número uno de sneakers premium en México.</p>
                <p>Trabajamos directamente con marcas como Prada, Golden Goose, Off-White, Salomon y muchas más para traerte solo productos 100% originales y con garantía de autenticidad.</p>
            </div>

            <div class="about-values">
                <div class="about-value">
                    <span class="about-value-number">100%</span>
                    <h3>Autenticidad garantizada</h3>
                    <p>Cada par es verificado por nuestro equipo de especialistas antes de ser enviado.</p>
                </div>
                <div class="about-value">
                    <span class="about-value-number">50+</span>
                    <h3>Marcas exclusivas</h3>
                    <p>La curación más selecta de marcas de lujo, streetwear y performance.</p>
                </div>
                <div class="about-value">
                    <span class="about-value-number">24h</span>
                    <h3>Atención personalizada</h3>
                    <p>Nuestro equipo te ayuda a encontrar el par perfecto para ti.</p>
                </div>
            </div>

            <div class="about-block">
                <h2>Nuestra promesa</h2>
                <p>Creemos que los sneakers son más que calzado — son expresión, cultura e identidad. Por eso nos esforzamos en ofrecer la mayor variedad, los mejores precios y una experiencia de compra impecable.</p>
                <p>Envíos rápidos, devoluciones sin complicaciones y un equipo obsesionado con tu satisfacción. Eso es Kuke's.</p>
            </div>
        </div>
    </div>
</section>
@endsection
