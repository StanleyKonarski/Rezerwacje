@include('layouts.app')

@can('isAdmin')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2>Cześć {{ Auth::user()->name }}!</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-none d-md-none d-lg-block d-xl-block">
                        <table class="table table-hover table-bordered table-striped table-custom">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="lead">Zmień cenę domku:</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="lead">Sczacowany przychód w tym miesiącu:</h1>
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

