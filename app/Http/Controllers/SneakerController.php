<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SneakerController extends Controller
{
    /**
     * Página principal del catálogo de tenis.
     */
    public function index(Request $request)
    {
        // Datos de ejemplo — reemplaza con tu modelo/DB
        $products = [
            [
                'id'    => 1,
                'brand' => 'On',
                'name'  => 'Cloudnova Form',
                'price' => '$4,800',
                'badge' => 'Nueva temporada',
                'color' => 'Blanco / Gris',
                'img'   => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&q=80',
            ],
            [
                'id'    => 2,
                'brand' => 'ASICS',
                'name'  => 'Gel-Kayano 14',
                'price' => '$3,200',
                'badge' => 'Nueva temporada',
                'color' => 'Crema / Azul',
                'img'   => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=600&q=80',
            ],
            [
                'id'    => 3,
                'brand' => 'Axel Arigato',
                'name'  => 'Area Lo Sneaker',
                'price' => '$6,500',
                'badge' => 'Destacado',
                'color' => 'Negro / Grafito',
                'img'   => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&q=80',
            ],
            [
                'id'    => 4,
                'brand' => 'Off-White',
                'name'  => 'Out Of Office',
                'price' => '$14,900',
                'badge' => 'Nueva temporada',
                'color' => 'Blanco / Negro / Plata',
                'img'   => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=600&q=80',
            ],
            [
                'id'    => 5,
                'brand' => 'New Balance',
                'name'  => '550 Heritage',
                'price' => '$2,800',
                'badge' => 'Más vendido',
                'color' => 'Blanco / Verde',
                'img'   => 'https://images.unsplash.com/photo-1539185441755-769473a23570?w=600&q=80',
            ],
            [
                'id'    => 6,
                'brand' => 'Salomon',
                'name'  => 'XT-6 Advanced',
                'price' => '$5,400',
                'badge' => 'Nueva temporada',
                'color' => 'Negro / Rojo',
                'img'   => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80',
            ],
            [
                'id'    => 7,
                'brand' => 'Prada',
                'name'  => "America's Cup",
                'price' => '$22,000',
                'badge' => 'Lujo',
                'color' => 'Blanco / Negro',
                'img'   => 'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=600&q=80',
            ],
            [
                'id'    => 8,
                'brand' => 'Golden Goose',
                'name'  => 'Superstar Distressed',
                'price' => '$16,500',
                'badge' => 'Icónico',
                'color' => 'Blanco / Dorado',
                'img'   => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&q=80',
            ],
        ];

        // Filtrado por marca (query string ?brand=ASICS)
        if ($request->filled('brand')) {
            $brand = $request->query('brand');
            $products = array_filter($products, fn($p) => 
                strtolower($p['brand']) === strtolower($brand)
            );
        }

        return view('sneakers.index', [
            'products' => array_values($products),
        ]);
    }
}
