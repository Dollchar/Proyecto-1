@extends('layouts.app')

@section('title', 'Guía de tallas — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header">
        <span class="info-eyebrow">Ayuda</span>
        <h1>Guía de tallas</h1>
        <p>Encuentra tu talla perfecta con nuestra tabla de conversión. Recuerda que los tamaños pueden variar ligeramente entre marcas.</p>
    </div>

    <div class="info-page-body">
        <h2 class="info-subtitle">Hombre</h2>
        <div class="info-table-wrap">
            <table class="info-table size-table">
                <thead>
                    <tr>
                        <th>MX</th>
                        <th>US</th>
                        <th>EU</th>
                        <th>UK</th>
                        <th>CM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>25</td><td>7</td><td>40</td><td>6</td><td>25.0</td></tr>
                    <tr><td>25.5</td><td>7.5</td><td>40.5</td><td>6.5</td><td>25.5</td></tr>
                    <tr><td>26</td><td>8</td><td>41</td><td>7</td><td>26.0</td></tr>
                    <tr><td>26.5</td><td>8.5</td><td>42</td><td>7.5</td><td>26.5</td></tr>
                    <tr><td>27</td><td>9</td><td>42.5</td><td>8</td><td>27.0</td></tr>
                    <tr><td>27.5</td><td>9.5</td><td>43</td><td>8.5</td><td>27.5</td></tr>
                    <tr><td>28</td><td>10</td><td>44</td><td>9</td><td>28.0</td></tr>
                    <tr><td>28.5</td><td>10.5</td><td>44.5</td><td>9.5</td><td>28.5</td></tr>
                    <tr><td>29</td><td>11</td><td>45</td><td>10</td><td>29.0</td></tr>
                    <tr><td>29.5</td><td>11.5</td><td>45.5</td><td>10.5</td><td>29.5</td></tr>
                </tbody>
            </table>
        </div>

        <h2 class="info-subtitle">Mujer</h2>
        <div class="info-table-wrap">
            <table class="info-table size-table">
                <thead>
                    <tr>
                        <th>MX</th>
                        <th>US</th>
                        <th>EU</th>
                        <th>UK</th>
                        <th>CM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>22</td><td>5</td><td>35.5</td><td>2.5</td><td>22.0</td></tr>
                    <tr><td>22.5</td><td>5.5</td><td>36</td><td>3</td><td>22.5</td></tr>
                    <tr><td>23</td><td>6</td><td>36.5</td><td>3.5</td><td>23.0</td></tr>
                    <tr><td>23.5</td><td>6.5</td><td>37.5</td><td>4</td><td>23.5</td></tr>
                    <tr><td>24</td><td>7</td><td>38</td><td>4.5</td><td>24.0</td></tr>
                    <tr><td>24.5</td><td>7.5</td><td>38.5</td><td>5</td><td>24.5</td></tr>
                    <tr><td>25</td><td>8</td><td>39</td><td>5.5</td><td>25.0</td></tr>
                    <tr><td>25.5</td><td>8.5</td><td>40</td><td>6</td><td>25.5</td></tr>
                    <tr><td>26</td><td>9</td><td>40.5</td><td>6.5</td><td>26.0</td></tr>
                </tbody>
            </table>
        </div>

        <h2 class="info-subtitle">Infantil</h2>
        <div class="info-table-wrap">
            <table class="info-table size-table">
                <thead>
                    <tr>
                        <th>MX</th>
                        <th>US</th>
                        <th>EU</th>
                        <th>UK</th>
                        <th>CM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>17</td><td>10C</td><td>27</td><td>9.5</td><td>17.0</td></tr>
                    <tr><td>17.5</td><td>10.5C</td><td>28</td><td>10</td><td>17.5</td></tr>
                    <tr><td>18</td><td>11C</td><td>28.5</td><td>10.5</td><td>18.0</td></tr>
                    <tr><td>19</td><td>12C</td><td>30</td><td>11.5</td><td>19.0</td></tr>
                    <tr><td>20</td><td>13C</td><td>31</td><td>12.5</td><td>20.0</td></tr>
                    <tr><td>21</td><td>1Y</td><td>33</td><td>13.5</td><td>21.0</td></tr>
                    <tr><td>22</td><td>2Y</td><td>34</td><td>1</td><td>22.0</td></tr>
                </tbody>
            </table>
        </div>

        <div class="info-card">
            <h3>📐 ¿Cómo medir tu pie?</h3>
            <ol class="info-ordered-list">
                <li>Coloca tu pie sobre una hoja de papel con el talón contra la pared.</li>
                <li>Marca el punto más largo de tu pie con un lápiz.</li>
                <li>Mide la distancia del borde del papel a la marca en centímetros.</li>
                <li>Compara con la columna CM de la tabla de arriba.</li>
                <li>Si estás entre dos tallas, te recomendamos elegir la más grande.</li>
            </ol>
        </div>
    </div>
</section>
@endsection
