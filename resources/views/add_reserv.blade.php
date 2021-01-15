@include('layouts.app')
    <div id="add_res">
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
            <form action="add" method="POST" autocomplete="off">
                @csrf
                <select class="form-control mb-3" name="place" id="place">
                    <option disabled selected value> -- Wybierz domek -- </option>
                    <option>Leśny Szałas</option>
                    <option>Fioletowa Chatka</option>
                    <option>Dom Hobbita</option>
                  </select><br>
                <input class="date form-control mb-3" type="text" name="datepicker" placeholder="Wskaż daty" />
                <div class="text-center">
                    <button type="submit" class="btn button-custom mb-5">Zarezerwuj</button>
                </div>
                <div id="calendar"></div>
            </form>
        </div>
    </div>
    </body>

    <script type="text/javascript">
    <!-- 
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear(); 
        if(dd < 10) dd = '0' + dd;
        if(mm < 10) mm = '0' + mm;
        var today = dd + '/' + mm + '/' + yyyy;
        $('input[name="datepicker"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD/MMM/YYYY',
                cancelLabel: 'Clear'
            },
            minDate: today,
            autoApply: true,
        });

        $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
        
        function reload(domek){
            $.ajax({
                type: "GET",
                url: "get_res?domek=" + domek,
                success: function (data) {
                    res = JSON.stringify(data);
                    console.log(res);
                }
            });
            $('#calendar').fullCalendar( 'refetchEvents' );
            var listEvent = calendar.getEvents();
            listEvent.forEach(event => {
                event.remove();
            });
        }

        $('#place').change( function(){
            var results;
            $.ajax({
                type: "GET",
                url: "get_res?domek=" + this.value,
                success: function (data) {
                    results = JSON.stringify(data);
                }
            });
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventBackgroundColor: '#e68f8f',
            });
            setTimeout(function(){
                var obj = JSON.parse(results); 
                var res = [];
                for(var i in obj){
                    var date = obj[i]['to'].split('-');
                    var date_to = date[0] + '-' + date[1] + '-' + (parseInt(date[2]) >= 9 ? (parseInt(date[2]) + 1) : '0' + (parseInt(date[2]) + 1));
                    var date_check = new Date(date_to);
                    if(isNaN((new Date(date_to)).getTime())){
                        // jezeli nastepny dzien tworzy nieprawidlowa date to zacznij nowy miesiac
                        date_to = date[0] + '-' + (parseInt(date[1]) >= 9 ? (parseInt(date[1]) + 1) : '0' + (parseInt(date[1]) + 1)) + '-' + '01';
                        if(isNaN((new Date(date_to)).getTime())){
                            // jezeli nastepny miesiac tworzy nieprawidlowa date to zacznij nowy rok
                            date_to = (parseInt(date[0]) + 1) + '-01-01';
                        }
                    }
                    calendar.addEvent({title: 'Termin zajęty', start: obj[i]['from'], end: date_to});
                }
            }, 1000);
            calendar.render();
        });
    //-->
    </script> 
</html>