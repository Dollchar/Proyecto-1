@extends('layouts.app')

@section('title', 'Devoluciones — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header">
        <span class="info-eyebrow">Ayuda</span>
        <h1>Política de devoluciones</h1>
        <p>Tu satisfacción es nuestra prioridad. Si no estás completamente satisfecho con tu compra, estamos aquí para ayudarte.</p>
    </div>

    <div class="info-page-body">
        <div class="info-steps">
            <div class="info-step">
                <div class="step-number">01</div>
                <div class="step-content">
                    <h3>Solicita tu devolución</h3>
                    <p>Tienes <strong>30 días naturales</strong> desde la fecha de entrega para solicitar una devolución. Entra a tu cuenta o contáctanos por WhatsApp, correo o teléfono.</p>
                </div>
            </div>
            <div class="info-step">
                <div class="step-number">02</div>
                <div class="step-content">
                    <h3>Recolección a domicilio</h3>
                    <p>Nosotros nos encargamos. Enviamos una guía prepagada y coordinamos la recolección en tu casa o trabajo en un horario que te convenga. <strong>Sin costo adicional.</strong></p>
                </div>
            </div>
            <div class="info-step">
                <div class="step-number">03</div>
                <div class="step-content">
                    <h3>Recibe tu reembolso</h3>
                    <p>Una vez que recibamos y verifiquemos el producto, procesamos el reembolso completo a tu método de pago original en <strong>3 a 5 días hábiles</strong>.</p>
                </div>
            </div>
        </div>

        <div class="info-card">
            <h3>Condiciones</h3>
            <ul>
                <li>El producto debe estar sin usar, con etiquetas y en su empaque original.</li>
                <li>Los artículos en promoción o con descuento también son elegibles.</li>
                <li>No se aceptan devoluciones de productos personalizados.</li>
                <li>Si el producto llegó dañado o es incorrecto, cubrimos la devolución completa sin condiciones.</li>
            </ul>
        </div>

        <div class="info-cta">
            <p>¿Tienes dudas sobre tu devolución?</p>
            <a href="{{ route('pages.contacto') }}" class="btn-primary">Contáctanos</a>
        </div>
    </div>
</section>
@endsection
