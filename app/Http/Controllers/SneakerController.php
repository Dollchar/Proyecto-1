<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SneakerController extends Controller
{
    /**
     * Datos de productos centralizados.
     */
    private function getProducts(): array
    {
        return [
            // ── HOMBRE ──
            [
                'id'          => 1,
                'brand'       => 'On',
                'name'        => 'Cloudnova Form',
                'price'       => '$4,800',
                'price_num'   => 4800,
                'badge'       => 'Nueva temporada',
                'color'       => 'Blanco / Gris',
                'category'    => 'hombre',
                'description' => 'Los Cloudnova Form combinan tecnología suiza de running con un diseño urbano vanguardista. Su entresuela CloudTec® ofrece amortiguación adaptable, mientras que la parte superior de ingeniería de malla proporciona transpirabilidad y soporte durante todo el día.',
                'material'    => 'Malla de ingeniería, TPU reciclado, suela de goma Helion™',
                'sku'         => 'ON-CNF-001',
                'sizes'       => [25, 25.5, 26, 26.5, 27, 27.5, 28, 28.5, 29],
                'img'         => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                ],
            ],
            [
                'id'          => 2,
                'brand'       => 'ASICS',
                'name'        => 'Gel-Kayano 14',
                'price'       => '$3,200',
                'price_num'   => 3200,
                'badge'       => 'Nueva temporada',
                'color'       => 'Crema / Azul',
                'category'    => 'hombre',
                'description' => 'Un clásico revivido del 2008 que regresa con toda su gloria tecnológica. El sistema GEL™ trasero y delantero absorbe impactos en cada paso, mientras que la tecnología IGS® garantiza un movimiento natural del pie.',
                'material'    => 'Cuero sintético, malla, entresuela SpEVA™, suela AHAR™',
                'sku'         => 'ASC-GK14-002',
                'sizes'       => [25, 25.5, 26, 26.5, 27, 27.5, 28, 29],
                'img'         => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=900&q=80',
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
                    'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                ],
            ],
            [
                'id'          => 3,
                'brand'       => 'Axel Arigato',
                'name'        => 'Area Lo Sneaker',
                'price'       => '$6,500',
                'price_num'   => 6500,
                'badge'       => 'Destacado',
                'color'       => 'Negro / Grafito',
                'category'    => 'hombre',
                'description' => 'Los Area Lo de Axel Arigato son la quintaesencia del lujo minimalista escandinavo. Fabricados en piel premium con acabado pulido e interior de cuero, estos sneakers ofrecen una silueta limpia y sofisticada que eleva cualquier look.',
                'material'    => 'Piel de becerro, forro de piel, suela de goma vulcanizada',
                'sku'         => 'AAR-ALO-003',
                'sizes'       => [25, 26, 26.5, 27, 27.5, 28, 28.5],
                'img'         => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=900&q=80',
                    'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=900&q=80',
                    'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                ],
            ],
            [
                'id'          => 4,
                'brand'       => 'Off-White',
                'name'        => 'Out Of Office',
                'price'       => '$14,900',
                'price_num'   => 14900,
                'badge'       => 'Nueva temporada',
                'color'       => 'Blanco / Negro / Plata',
                'category'    => 'hombre',
                'description' => 'Diseñados por Virgil Abloh, los Out Of Office son el ícono contemporáneo de la moda streetwear-luxury. Su silueta inspirada en el básquet retro, con las flechas diagonales características y detalles de comillas, los hacen inconfundibles.',
                'material'    => 'Piel de becerro, piel de ternera, suela de goma con logo',
                'sku'         => 'OFW-OOO-004',
                'sizes'       => [25, 25.5, 26, 27, 27.5, 28, 29],
                'img'         => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                    'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=900&q=80',
                ],
            ],
            [
                'id'          => 5,
                'brand'       => 'New Balance',
                'name'        => '550 Heritage',
                'price'       => '$2,800',
                'price_num'   => 2800,
                'badge'       => 'Más vendido',
                'color'       => 'Blanco / Verde',
                'category'    => 'hombre',
                'description' => 'Los 550 Heritage son el modelo más cotizado de New Balance en los últimos años. Inspirados en los tenis de básquetbol de los 80s, combinan una silueta retro con materiales modernos, convirtiéndose en un básico de armario imprescindible.',
                'material'    => 'Cuero genuino, ante, entresuela de EVA, suela de goma',
                'sku'         => 'NB-550H-005',
                'sizes'       => [25, 25.5, 26, 26.5, 27, 27.5, 28, 28.5, 29, 29.5],
                'img'         => 'https://images.unsplash.com/photo-1539185441755-769473a23570?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=900&q=80',
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                ],
            ],
            [
                'id'          => 6,
                'brand'       => 'Salomon',
                'name'        => 'XT-6 Advanced',
                'price'       => '$5,400',
                'price_num'   => 5400,
                'badge'       => 'Nueva temporada',
                'color'       => 'Negro / Rojo',
                'category'    => 'hombre',
                'description' => 'Nacidos para el trail running extremo, los XT-6 Advanced han trascendido al streetwear gracias a su estética agresiva y técnica. Con chasis Advanced Chassis™, amortiguación SensiFit™ y suela Contagrip® MA, ofrecen rendimiento real.',
                'material'    => 'Malla anti-escombros, TPU, Contagrip® MA, entresuela de EVA dual',
                'sku'         => 'SAL-XT6-006',
                'sizes'       => [25.5, 26, 26.5, 27, 27.5, 28, 28.5, 29],
                'img'         => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                ],
            ],
            [
                'id'          => 7,
                'brand'       => 'Prada',
                'name'        => "America's Cup",
                'price'       => '$22,000',
                'price_num'   => 22000,
                'badge'       => 'Lujo',
                'color'       => 'Blanco / Negro',
                'category'    => 'hombre',
                'description' => 'Los America\'s Cup de Prada son un referente del lujo deportivo desde 1997. Su combinación única de piel suave y nylon técnico, con el triángulo esmaltado de Prada en la lengüeta, los convierte en una pieza de colección atemporal.',
                'material'    => 'Piel de becerro, nylon técnico, suela de goma con logo Prada',
                'sku'         => 'PRA-ACU-007',
                'sizes'       => [25, 26, 26.5, 27, 28, 29],
                'img'         => 'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=900&q=80',
                    'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=900&q=80',
                    'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                ],
            ],
            [
                'id'          => 8,
                'brand'       => 'Golden Goose',
                'name'        => 'Superstar Distressed',
                'price'       => '$16,500',
                'price_num'   => 16500,
                'badge'       => 'Icónico',
                'color'       => 'Blanco / Dorado',
                'category'    => 'hombre',
                'description' => 'Los Superstar Distressed de Golden Goose son sinónimo de lujo imperfecto. Cada par es único con su acabado artesanal deliberadamente envejecido, la estrella lateral pintada a mano y detalles vintage que los hacen verdaderas piezas de arte.',
                'material'    => 'Cuero de becerro, ante italiano, estrella pintada a mano, suela de goma vulcanizada',
                'sku'         => 'GG-SPD-008',
                'sizes'       => [25, 25.5, 26, 26.5, 27, 27.5, 28, 29],
                'img'         => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
                    'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=900&q=80',
                ],
            ],

            // ── MUJER ──
            [
                'id'          => 9,
                'brand'       => 'Nike',
                'name'        => 'Air Force 1 Shadow',
                'price'       => '$3,400',
                'price_num'   => 3400,
                'badge'       => 'Nueva temporada',
                'color'       => 'Blanco / Rosa Pastel',
                'category'    => 'mujer',
                'description' => 'Las Air Force 1 Shadow reinterpretan el clásico de Nike con capas dobles y detalles deconstructivos. El diseño lúdico de suela elevada y paneles duplicados les da una personalidad única y contemporánea, perfecta para looks casuales con actitud.',
                'material'    => 'Cuero genuino, cuero sintético, suela de goma, entresuela Air',
                'sku'         => 'NK-AFS-009',
                'sizes'       => [22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26],
                'img'         => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=900&q=80',
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                ],
            ],
            [
                'id'          => 10,
                'brand'       => 'Adidas',
                'name'        => 'Samba OG',
                'price'       => '$2,600',
                'price_num'   => 2600,
                'badge'       => 'Más vendido',
                'color'       => 'Blanco / Negro / Gum',
                'category'    => 'mujer',
                'description' => 'Las Samba OG de adidas son el fenómeno de moda del momento. Este clásico del fútbol sala de los 50s ha conquistado las calles con su silueta baja, puntera de ante en T y suela de goma translúcida que le dan un encanto retro irresistible.',
                'material'    => 'Cuero liso, ante, suela de goma caramelo, forro textil',
                'sku'         => 'ADI-SMB-010',
                'sizes'       => [22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5],
                'img'         => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?w=900&q=80',
                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=900&q=80',
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                ],
            ],
            [
                'id'          => 11,
                'brand'       => 'Veja',
                'name'        => 'Campo Chromefree',
                'price'       => '$3,800',
                'price_num'   => 3800,
                'badge'       => 'Eco',
                'color'       => 'Blanco / Rosa',
                'category'    => 'mujer',
                'description' => 'Las Campo de Veja combinan moda consciente con estética premium. Fabricadas con cuero libre de cromo, algodón orgánico y caucho silvestre del Amazonas, demuestran que la sostenibilidad y el estilo van de la mano.',
                'material'    => 'Cuero ChromeFree™, algodón orgánico, caucho silvestre amazónico',
                'sku'         => 'VJA-CMP-011',
                'sizes'       => [22, 23, 23.5, 24, 24.5, 25, 26],
                'img'         => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=900&q=80',
                    'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=900&q=80',
                    'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=900&q=80',
                ],
            ],
            [
                'id'          => 12,
                'brand'       => 'Converse',
                'name'        => 'Chuck 70 High',
                'price'       => '$1,900',
                'price_num'   => 1900,
                'badge'       => 'Clásico',
                'color'       => 'Negro / Egret',
                'category'    => 'mujer',
                'description' => 'Las Chuck 70 High son la versión premium del legendario Chuck Taylor. Con lona más gruesa, amortiguación OrthoLite® mejorada y puntera de goma vintage con borde pintado, son la evolución definitiva de un ícono cultural.',
                'material'    => 'Lona premium, puntera de goma, plantilla OrthoLite®, suela vulcanizada',
                'sku'         => 'CON-C70-012',
                'sizes'       => [22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26],
                'img'         => 'https://images.unsplash.com/photo-1494496195158-c3becb4f2475?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1494496195158-c3becb4f2475?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1494496195158-c3becb4f2475?w=900&q=80',
                    'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?w=900&q=80',
                    'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=900&q=80',
                ],
            ],
            [
                'id'          => 13,
                'brand'       => 'Golden Goose',
                'name'        => 'Super-Star Pink',
                'price'       => '$15,200',
                'price_num'   => 15200,
                'badge'       => 'Lujo',
                'color'       => 'Blanco / Rosa / Plata',
                'category'    => 'mujer',
                'description' => 'Las Super-Star Pink de Golden Goose incorporan la estética lived-in que define a la marca italiana. Con glitter rosa en la estrella lateral, acabado distressed artesanal y detalles plateados, cada par es una pieza única de lujo italiano.',
                'material'    => 'Cuero de becerro, glitter italiano, ante, suela vulcanizada a mano',
                'sku'         => 'GG-SSP-013',
                'sizes'       => [22, 22.5, 23, 24, 24.5, 25],
                'img'         => 'https://images.unsplash.com/photo-1543508282-6319a3e2f221?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1543508282-6319a3e2f221?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1543508282-6319a3e2f221?w=900&q=80',
                    'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=900&q=80',
                    'https://images.unsplash.com/photo-1494496195158-c3becb4f2475?w=900&q=80',
                ],
            ],
            [
                'id'          => 14,
                'brand'       => 'New Balance',
                'name'        => '530 Retro',
                'price'       => '$2,400',
                'price_num'   => 2400,
                'badge'       => 'Tendencia',
                'color'       => 'Blanco / Plata',
                'category'    => 'mujer',
                'description' => 'Las 530 Retro reviven la era dorada del running de los 90s con su silueta voluminosa y detalles reflectantes. La tecnología ABZORB® en el talón ofrece absorción de impacto superior, mientras que el diseño chunky se mantiene elegante.',
                'material'    => 'Malla sintética, cuero sintético, entresuela ABZORB®, suela de goma',
                'sku'         => 'NB-530R-014',
                'sizes'       => [22.5, 23, 23.5, 24, 24.5, 25, 25.5],
                'img'         => 'https://images.unsplash.com/photo-1605348532760-6753d2c43329?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1605348532760-6753d2c43329?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1605348532760-6753d2c43329?w=900&q=80',
                    'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?w=900&q=80',
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                ],
            ],

            // ── INFANTIL ──
            [
                'id'          => 15,
                'brand'       => 'Nike',
                'name'        => 'Air Max 90 LTR Kids',
                'price'       => '$1,800',
                'price_num'   => 1800,
                'badge'       => 'Nueva temporada',
                'color'       => 'Blanco / Azul Royal',
                'category'    => 'infantil',
                'description' => 'Los Air Max 90 LTR para niños traen todo el estilo icónico del modelo adulto en versión mini. Con la cápsula Air visible en el talón, cuero duradero y cierre fácil, son perfectos para los pequeños con gran personalidad.',
                'material'    => 'Cuero genuino, malla, unidad Air visible, suela de goma resistente',
                'sku'         => 'NK-AM9K-015',
                'sizes'       => [17, 17.5, 18, 18.5, 19, 19.5, 20, 21, 22],
                'img'         => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1514989940723-e8e51635b782?w=900&q=80',
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=900&q=80',
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
                ],
            ],
            [
                'id'          => 16,
                'brand'       => 'Adidas',
                'name'        => 'Superstar CF Kids',
                'price'       => '$1,400',
                'price_num'   => 1400,
                'badge'       => 'Más vendido',
                'color'       => 'Blanco / Negro',
                'category'    => 'infantil',
                'description' => 'Las Superstar CF para niños conservan la icónica puntera de concha y las tres franjas del modelo adulto. Con cierre de velcro para facilitar que los niños se las pongan solos, son un clásico que nunca falla.',
                'material'    => 'Cuero sintético, puntera de goma, cierre de velcro, suela de goma',
                'sku'         => 'ADI-SSC-016',
                'sizes'       => [17, 18, 18.5, 19, 20, 21, 22],
                'img'         => 'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?w=900&q=80',
                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=900&q=80',
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80',
                ],
            ],
            [
                'id'          => 17,
                'brand'       => 'New Balance',
                'name'        => '574 Core Kids',
                'price'       => '$1,600',
                'price_num'   => 1600,
                'badge'       => 'Clásico',
                'color'       => 'Gris / Azul Marino',
                'category'    => 'infantil',
                'description' => 'Los 574 Core para niños ofrecen la comodidad y el estilo que ha hecho legendario a este modelo. Con amortiguación ENCAP® para soporte durante todo el día y materiales duraderos para resistir las aventuras de los más pequeños.',
                'material'    => 'Ante, malla, entresuela ENCAP®, suela de goma duradera',
                'sku'         => 'NB-574K-017',
                'sizes'       => [17, 17.5, 18, 19, 19.5, 20, 21],
                'img'         => 'https://images.unsplash.com/photo-1551116198-40bc84dd7987?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1551116198-40bc84dd7987?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1551116198-40bc84dd7987?w=900&q=80',
                    'https://images.unsplash.com/photo-1514989940723-e8e51635b782?w=900&q=80',
                    'https://images.unsplash.com/photo-1539185441755-769473a23570?w=900&q=80',
                ],
            ],
            [
                'id'          => 18,
                'brand'       => 'Converse',
                'name'        => 'Chuck Taylor Kids',
                'price'       => '$1,100',
                'price_num'   => 1100,
                'badge'       => 'Icónico',
                'color'       => 'Rojo',
                'category'    => 'infantil',
                'description' => 'Los Chuck Taylor para niños son un ícono en miniatura. La lona resistente y la suela vulcanizada clásica los hacen perfectos como primer sneaker de estilo. Disponibles en el legendario rojo que ha definido a generaciones.',
                'material'    => 'Lona de algodón, ojales metálicos, suela vulcanizada, puntera de goma',
                'sku'         => 'CON-CTK-018',
                'sizes'       => [17, 18, 19, 19.5, 20, 21, 22],
                'img'         => 'https://images.unsplash.com/photo-1604671801908-6f0c6a092c05?w=600&q=80',
                'img_alt'     => 'https://images.unsplash.com/photo-1604671801908-6f0c6a092c05?w=900&q=80',
                'gallery'     => [
                    'https://images.unsplash.com/photo-1604671801908-6f0c6a092c05?w=900&q=80',
                    'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?w=900&q=80',
                    'https://images.unsplash.com/photo-1551116198-40bc84dd7987?w=900&q=80',
                ],
            ],
        ];
    }

    /**
     * Página principal del catálogo (hombre por defecto).
     */
    public function index(Request $request)
    {
        $products = $this->getProducts();
        $category = 'hombre';

        // Filtrar por categoría hombre
        $products = array_filter($products, fn($p) => $p['category'] === 'hombre');

        // Filtrado por marca (query string ?brand=ASICS)
        if ($request->filled('brand')) {
            $brand = $request->query('brand');
            $products = array_filter($products, fn($p) =>
                strtolower($p['brand']) === strtolower($brand)
            );
        }

        return view('sneakers.index', [
            'products' => array_values($products),
            'category' => $category,
        ]);
    }

    /**
     * Catálogo por categoría.
     */
    public function category(string $slug, Request $request)
    {
        $validCategories = ['hombre', 'mujer', 'infantil'];
        if (!in_array($slug, $validCategories)) {
            abort(404);
        }

        $products = $this->getProducts();
        $products = array_filter($products, fn($p) => $p['category'] === $slug);

        if ($request->filled('brand')) {
            $brand = $request->query('brand');
            $products = array_filter($products, fn($p) =>
                strtolower($p['brand']) === strtolower($brand)
            );
        }

        return view('sneakers.index', [
            'products' => array_values($products),
            'category' => $slug,
        ]);
    }

    /**
     * Página de detalle de un tenis.
     */
    public function show(int $id)
    {
        $products = $this->getProducts();
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        $related = collect($products)
            ->where('id', '!=', $id)
            ->where('category', $product['category'])
            ->shuffle()
            ->take(4)
            ->values()
            ->all();

        return view('sneakers.show', [
            'product' => $product,
            'related' => $related,
        ]);
    }

    /**
     * Búsqueda de productos.
     */
    public function search(Request $request)
    {
        $q = $request->query('q', '');
        $products = $this->getProducts();

        if ($q) {
            $q_lower = strtolower($q);
            $products = array_filter($products, fn($p) =>
                str_contains(strtolower($p['brand']), $q_lower) ||
                str_contains(strtolower($p['name']), $q_lower) ||
                str_contains(strtolower($p['color']), $q_lower) ||
                str_contains(strtolower($p['category']), $q_lower)
            );
        }

        return view('sneakers.search', [
            'products' => array_values($products),
            'query'    => $q,
        ]);
    }

    /**
     * API JSON — devuelve todos los productos (para búsqueda JS y favoritos).
     */
    public function apiProducts()
    {
        return response()->json($this->getProducts());
    }
}
