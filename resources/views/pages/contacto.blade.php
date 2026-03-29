@extends('layouts.app')

@section('title', 'Contacto — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header">
        <span class="info-eyebrow">Ayuda</span>
        <h1>Contáctanos</h1>
        <p>Estamos aquí para ayudarte. Escríbenos y te responderemos en menos de 24 horas.</p>
    </div>

    <div class="info-page-body">
        <div class="contact-layout">
            <div class="contact-form-wrap">
                <form class="contact-form" onsubmit="event.preventDefault(); this.querySelector('.contact-success').style.display='flex'; this.querySelector('button[type=submit]').textContent='✓ Enviado';">
                    <div class="form-group">
                        <label for="contact-name">Nombre completo</label>
                        <input type="text" id="contact-name" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Correo electrónico</label>
                        <input type="email" id="contact-email" placeholder="tu@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-subject">Asunto</label>
                        <select id="contact-subject">
                            <option>Pregunta general</option>
                            <option>Seguimiento de pedido</option>
                            <option>Devoluciones</option>
                            <option>Problema con mi producto</option>
                            <option>Tallas y medidas</option>
                            <option>Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact-order">Número de pedido (opcional)</label>
                        <input type="text" id="contact-order" placeholder="KUK-XXXXX">
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Mensaje</label>
                        <textarea id="contact-message" rows="5" placeholder="Describe tu consulta..." required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Enviar mensaje</button>
                    <div class="contact-success" style="display:none">
                        <p>✓ ¡Mensaje enviado! Te responderemos pronto.</p>
                    </div>
                </form>
            </div>

            <div class="contact-info-cards">
                <div class="info-card">
                    <h3>📧 Correo</h3>
                    <p>hola@kukes.mx</p>
                </div>
                <div class="info-card">
                    <h3>📱 WhatsApp</h3>
                    <p>+52 55 1234 5678</p>
                    <p class="info-small">Lun — Vie, 9:00 a 18:00 CST</p>
                </div>
                <div class="info-card">
                    <h3>📍 Showroom</h3>
                    <p>Av. Masaryk 123, Polanco<br>CDMX, México 11560</p>
                    <p class="info-small">Lun — Sáb, 10:00 a 20:00</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
