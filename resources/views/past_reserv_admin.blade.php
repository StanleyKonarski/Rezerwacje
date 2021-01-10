@include('layouts.app')
   <body>
      <div class="container mt-5">
         <div class="text-center">
            <h1 class="display-3 custom-heading">Archiwum rezerwacji</h1>
         </div>
            <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
               <table class="table table-hover table-bordered table-striped table-custom">
                  <tr>
                     <td>Imie i nazwisko</td>
                     <td>Początek</td>
                     <td>Koniec</td>
                     <td>Domek</td>
                     <td class="">Należność</td>
                     <td class="">Dokonano</td>
                  </tr>
                  @foreach ($reservations as $reservation)
                  <tr>
                     <td>{{ $reservation->name }}</td>
                     <td>{{ $reservation->from }}</td>
                     <td>{{ $reservation->to }}</td>
                     <td>{{ $reservation->nazwa_domku }}</td>
                     <td class="">{{ $reservation->naleznosc }} PLN</td>
                     <td class="">{{ $reservation->created_at }}</td>
                  </tr>
                  @endforeach
               </table>
            </div>
            <div class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
               <table class="table table-hover table-bordered table-striped table-custom">
                  <tr>
                     <td>Imie i nazwisko</td>
                     <td>Początek</td>
                     <td>Koniec</td>
                     <td>Domek</td>
                  </tr>
                  @foreach ($reservations as $reservation)
                  <tr>
                     <td>{{ $reservation->name }}</td>
                     <td>{{ $reservation->from }}</td>
                     <td>{{ $reservation->to }}</td>
                     <td>{{ $reservation->nazwa_domku }}</td>
                  </tr>
                  @endforeach
               </table>
            </div>
      </div>
   </body>
</html>