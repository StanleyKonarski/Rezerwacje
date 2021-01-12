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
                <select class="form-control mb-3" name="place" onchange="reload(this.value)">
                    <option disabled selected value> -- Wybierz domek -- </option>
                    <option>Leśny Szałas</option>
                    <option>Fioletowa Chatka</option>
                    <option>Dom Hobbita</option>
                  </select><br>
                <input class="date form-control mb-3" type="text" name="datepicker" placeholder="Wskaż daty" />
                <div class="text-center">
                    <button type="submit" class="btn button-custom">Zarezerwuj</button>
                </div>
            </form>
        </div>
    </div>
    </body>
    <!--Skrypt odpalający bootstrapowy datepicker ktory uniemozliwia wybranie daty w przeszłości-->
    <script type="text/javascript">
        var disabledArr = ["01/23/2021", "01/24/2021"];
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
            isInvalidDate: function(arg){
                var month = arg._d.getMonth() + 1;
                if (month < 10){
                    month = "0" + month;
                }

                var date = arg._d.getDate();
                if (date < 10){
                    date = "0" + date; // Leading 0
                }
                var year = arg._d.getYear() + 1900;   // Years are 1900 based

                var compare = month + "/" + date + "/" + year;

                if($.inArray(compare, disabledArr)!=-1){
                    return arg._pf = {
                        userInvalidated: true
                    };
                }
            }
        });

        $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        //$('input[name="datepicker"]').data('daterangepicker').hide = function () {};
        //$('input[name="datepicker"]').data('daterangepicker').show();
        
        function reload(domek){
            $.ajax({
                type: "GET",
                url: "get_res?domek=" + domek,
                success: function (data) {
                    res = JSON.stringify(data);
                    console.log(res);
                }
            });
            $('#add_res > div > form > input.date').val('');
            $('#add_res > div > form > input.date').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'DD/MMM/YYYY',
                    cancelLabel: 'Clear'
                },
                minDate: today,
                autoApply: true,
                isInvalidDate: function(arg){
                    var month = arg._d.getMonth() + 1;
                    if (month < 10){
                        month = "0" + month;
                    }

                    var date = arg._d.getDate();
                    if (date < 10){
                        date = "0" + date; // Leading 0
                    }
                    var year = arg._d.getYear() + 1900;   // Years are 1900 based

                    var compare = month + "/" + date + "/" + year;

                    if($.inArray(compare, disabledArr)!=-1){
                        return arg._pf = {
                            userInvalidated: true
                        };
                    }
                }
            });
        }
    </script> 
</html>