@include('header_logged')
        <h1 class="display-4">Dokonaj rezerwacji</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="add" method="POST">
            @csrf
            <input type="date" name="from" value="{{ old('from') }}"><br>
            <input type="date" name="to" value="{{ old('to') }}">
            <button type="submit">Zarezerwuj</button>
        </form>
    </body>
</html>