<style>/* Styles généraux */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;800&display=swap");

body {
    display: flex;
    flex-flow: column;
    align-items: center;
    font-family: "Poppins", serif;
    background: rgb(238, 174, 202);
    background: radial-gradient(
        circle,
        rgba(238, 174, 202, 1) 0%,
        rgba(148, 187, 233, 1) 100%
    );
}

h1 {
    font-weight: 800;
    margin: 1rem 0 0;
}

p {
    margin-bottom: 2rem;
    font-size: 1rem;
    color: #555;
}

ul {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    max-width: 900px;
    margin: 0 auto;
}

ul li {
    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
    width: 10rem;
    height: 10rem;
    border-radius: 10px;
    padding: 1rem;
    font-weight: 300;
    font-size: 0.8rem;
    text-align: center;
    box-sizing: border-box;
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.18);
}

ul li a {
    text-decoration: none;
    color: inherit;
}

ul li time {
    font-size: 2rem;
    margin: 0.5rem 0;
    font-weight: 500;
}

ul li span {
    font-size: 0.9rem;
    font-weight: 400;
    margin-top: 0.5rem;
}

ul li.today {
    background: #ffffff70;
    border: 2px solid #ffffff;
}

ul li.today time {
    font-weight: 800;
}

</style>
<h1>Calendrier des Repas 2025</h1>
<p>Planifiez vos repas pour chaque jour de l'année</p>

@for ($month = 1; $month <= 12; $month++)
    <div class="month-container">
        <h2>{{ \Carbon\Carbon::create(null, $month, 1)->translatedFormat('F Y') }}</h2>
        <ul>
            @for ($day = 1; $day <= 31; $day++)
                @php
                    $date = sprintf('2025-%02d-%02d', $month, $day);
                @endphp
                @if (checkdate($month, $day, 2025))
                    <li class="{{ now()->toDateString() === $date ? 'today' : '' }}">
                        <a href="{{ route('meal-plans.show', $date) }}">
                            <time datetime="{{ $date }}">{{ $day }}</time>
                            @switch($day)
                                @case(14) @if($month == 2) <span>Valentine's Day</span> @endif @break
                                @case(25) @if($month == 12) <span>Christmas Day</span> @endif @break
                                @default
                            @endswitch
                        </a>
                    </li>
                @endif
            @endfor
        </ul>
    </div>
@endfor

