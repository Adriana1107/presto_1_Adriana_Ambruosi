

<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="btn">
        <img src="{{ asset('images/flags/' . $lang . '.png') }}" width="32" height="32"/>

    </button>
</form>