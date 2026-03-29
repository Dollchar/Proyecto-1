@extends('layouts.app')

@section('title', 'Envíos — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header">
        <span class="info-eyebrow">Ayuda</span>
        <h1>Información de envíos</h1>
        <p>Envíos rápidos y seguros a toda la República Mexicana. Tu pedido siempre protegido y asegurado.</p>
    </div>

    <div class="info-page-body">
        <div class="info-table-wrap">
            <table class="info-table">
                <thead>
                    <tr>
                        <th>Tipo de envío</th>
                        <th>Tiempo estimado</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Estándar</strong></td>
                        <td>3 — 5 días hábiles</td>
                        <td>$149 MXN</td>
                    </tr>
                    <tr>
                        <td><strong>Express</strong></td>
                        <td>1 — 2 días hábiles</td>
                        <td>$299 MXN</td>
                    </tr>
                    <tr>
                        <td><strong>Same Day</strong> <span class="info-badge">CDMX y área metro</span></td>
                        <td>Mismo día (pedidos antes de las 12pm)</td>
                        <td>$399 MXN</td>
                    </tr>
                    <tr class="info-table-highlight">
                        <td><strong>Gratis</strong></td>
                        <td>3 — 5 días hábiles</td>
                        <td>Pedidos mayores a $3,000 MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="info-grid-2">
            <div class="info-card">
                <h3>🔒 Empaque seguro</h3>
                <p>Cada par se envía en su caja original, dentro de una caja de envío reforzada con protección interior para que llegue en perfectas condiciones.</p>
            </div>
            <div class="info-card">
                <h3>📍 Rastreo en tiempo real</h3>
                <p>Recibirás un correo con tu número de rastreo al momento del envío. Podrás seguir tu pedido paso a paso hasta que llegue a tu puerta.</p>
            </div>
            <div class="info-card">
                <h3>🏠 Entrega a domicilio</h3>
                <p>Trabajamos con las mejores paqueterías del país: DHL, FedEx y Estafeta para garantizar una entrega segura y puntual.</p>
            </div>
            <div class="info-card">
                <h3>🛡️ Envío asegurado</h3>
                <p>Todos los envíos cuentan con seguro completo. Si tu paquete se pierde o daña en tránsito, te enviamos uno nuevo sin costo.</p>
            </div>
        </div>

        <div class="info-cta">
            <p>¿Necesitas ayuda con tu envío?</p>
            <a href="{{ route('pages.contacto') }}" class="btn-primary">Contáctanos</a>
        </div>
    </div>
</section>
@endsection
