@include('header_logged')
        <div class="form-group container">
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
                <input class="date form-control datepicker" type="text" name="from" value="{{ old('from') }}" placeholder="Od" autocomplete="off"><br>
                <input class="date form-control datepicker" type="text" name="to" value="{{ old('to') }}" placeholder="Do" autocomplete="off"><br>
                <select class="form-control" name="place">
                    <option>Fioletowa Chatka</option>
                    <option>Dom Hobbita</option>
                  </select><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Zarezerwuj</button>
                </div>
            </form>
        </div>
    </body>
    <!--Skrypt odpalający bootstrapowy datepicker ktory uniemozliwia wybranie daty w przeszłości-->
    <script type="text/javascript">
        $('.datepicker').datepicker({  
           startDate: new Date(),
           format: 'yyyy-mm-dd'
         });  
    </script> 
</html>