@include('layouts.app')
        <div class="form-group container text-center mt-5 w-55">
        <h1 class="display-4 custom-heading mb-4">Dokonaj rezerwacji</h1>
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
                <select class="form-control mb-3" name="place">
                    <option>Leśny Szałas</option>
                    <option>Fioletowa Chatka</option>
                    <option>Dom Hobbita</option>
                  </select><br>
                <input class="date form-control datepicker mb-3" type="text" name="from" value="{{ old('from') }}" placeholder="Od" autocomplete="off"><br>
                <input class="date form-control datepicker mb-3" type="text" name="to" value="{{ old('to') }}" placeholder="Do" autocomplete="off"><br>
                <div class="text-center">
                    <button type="submit" class="btn button-custom">Zarezerwuj</button>
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