@extends('layouts.app')

@section('title', 'Las siluetas que definen esta temporada — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header info-page-header--wide">
        <span class="info-eyebrow">Editorial</span>
        <h1>Las siluetas que definen esta temporada</h1>
        <p>Desde las plataformas chunky hasta los runners ultra-técnicos: estos son los tenis que no pueden faltar en tu clóset.</p>
    </div>

    <div class="info-page-body">
        <div class="editorial-hero-img">
            <img src="https://images.unsplash.com/photo-1556906781-9a412961a28c?w=1400&q=80" alt="Editorial sneakers temporada">
        </div>

        <article class="editorial-article">
            <h2>El regreso del runner técnico</h2>
            <p>No es casualidad que marcas como Salomon, ASICS y On estén dominando las calles. El runner técnico — ese tenis diseñado originalmente para trail running o maratones — se ha convertido en la silueta definitiva de 2025. Con sus líneas agresivas, materiales de alto rendimiento y una estética que grita funcionalidad, estos modelos conectan con una generación que valora tanto el rendimiento como el estilo.</p>
            <p>El <strong>Salomon XT-6 Advanced</strong> es quizás el ejemplo más emblemático. Nacido para la montaña, ahora se pasea por Polanco y la Condesa con la misma naturalidad. Su silueta musculosa, los paneles de malla y la suela Contagrip® lo hacen inconfundible.</p>

            <div class="editorial-inline-img">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1000&q=80" alt="Sneakers técnicos">
            </div>

            <h2>El chunky ya no es tendencia — es un clásico</h2>
            <p>Lo que empezó como una provocación de Balenciaga con las Triple S en 2017 se ha consolidado como una categoría permanente. Las suelas elevadas, las proporciones exageradas y los colores llamativos se han ganado un lugar fijo en los armarios más selectos.</p>
            <p>La <strong>New Balance 550 Heritage</strong> demuestra que el volumen controlado puede ser elegante. Su silueta de básquet retro, con paneles de cuero limpio y proporciones equilibradas, es la prueba de que el chunky ha madurado.</p>

            <h2>El lujo artesanal: Golden Goose y el "imperfecto perfecto"</h2>
            <p>En el extremo opuesto del espectro tecnológico, <strong>Golden Goose</strong> sigue reinando con su filosofía de lo deliberadamente imperfecto. Cada par de Superstar sale del taller con desgaste intencional, pintadas a mano por artesanos italianos. Es moda como arte — y el mercado no se cansa.</p>
            <p>La tendencia del "pre-loved luxury" ha encontrado en Golden Goose su máxima expresión: zapatos que nacen con historia, que cuentan algo antes de que los uses por primera vez.</p>

            <div class="editorial-inline-img">
                <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=1000&q=80" alt="Sneakers de lujo">
            </div>

            <h2>Lo que viene</h2>
            <p>La próxima temporada promete más fusiones: el cruce entre running y lujo se profundiza, los colores tierra y los tonos naturales ganan terreno sobre el blanco puro, y las colaboraciones entre marcas de moda y firmas deportivas serán más ambiciosas que nunca.</p>
            <p>En Kuke's, ya estamos preparando nuestra selección. Porque si algo hemos aprendido es que los tenis correctos no solo completan un look — lo definen.</p>
        </article>

        <div class="info-cta">
            <p>Explora nuestra colección completa</p>
            <a href="{{ url('/') }}" class="btn-primary">Ver catálogo</a>
        </div>
    </div>
</section>
@endsection
