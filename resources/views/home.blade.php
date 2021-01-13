@include('layouts.app')

@can('isAdmin')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="custom-heading">Cześć {{ Auth::user()->name }}!</h2>
    </div>
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
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-sm-none d-md-none d-lg-block d-xl-block">
                        <table class="table table-hover table-bordered table-striped table-custom">
                            <h1 class="lead">Najbliższe trzy rezerwacje:</h1>
                            <tr>
                               <td>Początek</td>
                               <td>Koniec</td>
                               <td>Domek</td>
                            </tr>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->from }}</td>
                                <td>{{ $reservation->to }}</td>
                                <td>{{ $reservation->nazwa_domku }}</td>
                            </tr>
                            @endforeach
                         </table>
                    </div>
                    <div class="d-none d-sm-block d-md-block d-lg-none d-xl-none">
                        <table class="table table-hover table-bordered table-striped table-custom">
                            <tr>
                               <td>Początek</td>
                               <td>Koniec</td>
                            </tr>
                            <tr>
    
                            </tr>
                         </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="lead mb-2">Zmień cenę domku:</h1>
                    <form action="change" method="POST">
                        @csrf
                        <select class="form-control mb-3" name="place">
                            <option>Leśny Szałas</option>
                            <option>Fioletowa Chatka</option>
                            <option>Dom Hobbita</option>
                          </select><br>
                        <input class="date form-control mb-5" type="number" name="price" value="{{ old('from') }}" placeholder="Nowa cena" autocomplete="off"><br>
                        <div class="text-center">
                            <button type="submit" class="btn button-custom">Zmień cenę</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="lead mb-2">Sczacowany przychód w tym miesiącu:</h1>
                    <h2 class="lead text-center font-weight-bold text-success">{{ $naleznosci }} PLN</h2>
                </div>
            </div>
        </div>
    </div>
    @else
</div>
<div class="btn btn-info btn-lg">
    You have User Access
  </div>
@endcan

