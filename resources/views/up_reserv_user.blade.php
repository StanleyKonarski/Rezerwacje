<html>
   
   <head>
      <title>Nadchodzące rezerwacje</title>
   </head>
   
   <body>
        @if ($errors->any())
            <div class=”alert alert-danger”>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <table border = 1>
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
            <td><a href='delete-u/{{ $reservation->reservation_id }}'>Usuń</a></td>
         </tr>
         @endforeach
      </table>
   </body>
</html>