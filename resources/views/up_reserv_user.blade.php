@include('layouts.app')
   <body>
      <div class="container mt-5 text-center">
         <h1 class="display-3 custom-heading">Twoje rezerwacje</h1>
      @if ($errors->any())
         <div class=”alert alert-danger”>
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
      <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
         <table class="table table-hover table-bordered table-striped table-custom">
            <tr>
               <td>Imie i nazwisko</td>
               <td>Początek</td>
               <td>Koniec</td>
               <td class="">Należność</td>
               <td>Dokonano</td>
               <td>Usuń</td>
            </tr>
            @foreach ($reservations as $reservation)
            <tr>
               <td>{{ $reservation->name }}</td>
               <td>{{ $reservation->from }}</td>
               <td>{{ $reservation->to }}</td>
               <td class="">{{ $reservation->naleznosc }} PLN</td>
               <td>{{ $reservation->created_at }}</td>
               <td><a href='delete-u/{{ $reservation->reservation_id }}'>Usuń</a></td>
            </tr>
            @endforeach
         </table>
      </div>
      <div class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
         <table class="table table-hover table-bordered table-striped table-custom">
            <tr>
               <td>Początek</td>
               <td>Koniec</td>
               <td class="">Należność</td>
               <td>Usuń</td>
            </tr>
            @foreach ($reservations as $reservation)
            <tr>
               <td>{{ $reservation->from }}</td>
               <td>{{ $reservation->to }}</td>
               <td class="">{{ $reservation->naleznosc }} PLN</td>
               <td><a href='delete-u/{{ $reservation->reservation_id }}'>Usuń</a></td>
            </tr>
            @endforeach
         </table>
      </div>
   </div>
</html>