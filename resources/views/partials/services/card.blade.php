<article class="expertise-card">

    <div class="expertise-icon {{ $color }}">
        <img src="images/icons/{{ $icon }}" alt="Home">
    </div>

    <h3>{{ $title }}</h3>

    <p>
        {{ $desc }}
    </p>

    <ul>
        @foreach ($items as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>


</article>