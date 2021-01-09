
@include('layouts.app')
   <body>
      <div class="container mt-5">
         @if(session()->has('message'))
         <div class="alert alert-success">
               {{ session()->get('message') }}
         </div>
         @endif
         <table class="table table-hover table-bordered table-striped table-custom">
            <tr>
               <td>Imie i nazwisko</td>
               <td>Początek</td>
               <td>Koniec</td>
               <td>Dokonano</td>
               <td>Usuń</td>
            </tr>
            @foreach ($reservations as $reservation)
            <tr>
               <td>{{ $reservation->name }}</td>
               <td>{{ $reservation->from }}</td>
               <td>{{ $reservation->to }}</td>
               <td>{{ $reservation->created_at }}</td>
               <td><a href='delete/{{ $reservation->reservation_id }}'>Usuń</a></td>
            </tr>
            @endforeach
         </table>
      </div>
   </body>
</html>