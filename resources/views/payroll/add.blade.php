@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Payroll') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="firstname">Sales Rep</label>
                            <select class="form-control select2" id="salesrep-select" name="salesrep_id" required>
                                <option value=""></option>
                                @foreach($salesReps as $rep)
                                    <option value="{{ $rep->id }}" data-bonus="{{ $rep->bonuses }}">
                                        {{ $rep->firstname }} {{ $rep->lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Date Period</label>
                            <div class="row">
                                <div class="col">
                                    <input name="date_period" type="text" class="form-control" id="weekPicker" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4">
                            <label for="bonuses">Bonuses</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                                </div>
                                <input id="bonuses" name="bonuses" type="text" class="form-control" readOnly >
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <label for="commission_percentage">Clients</label>
                            <input id="clients" name="clients" type="number" max="100" min="1" class="form-control" value="0" required>
                        </div>
                    </div>
                    <div id="thisBlock">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <hr/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4">
                            <label for="commission">Onlineinsure Commission</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                                </div>
                                <input id="commission" name="commission" type="number" class="form-control" min=1 required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Create Payroll">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
	<script>
    var clientsPrev = 0;
    $(function(){
        let fp = flatpickr("#weekPicker", {
            "plugins": [new weekSelect({
            })],
            "onChange": [function(){
            fp.input.value = [
                fp.weekStartDay,
                fp.weekEndDay,
                ]
            .map(d => fp.formatDate(d, 'd/m/Y'))
            .join(' - ');
            }],
            locale: {
                firstDayOfWeek: 1
            }
        });
        $('.flatpickr-input:visible').on('focus', function () {
            $(this).blur()
        })
        $('.flatpickr-input:visible').prop('readonly', false)

        $('body').on( "change", '#salesrep-select', function(e){
            var optionSelected = $("option:selected", this);
            $("#bonuses").val(optionSelected.data("bonus"));
        });

        $(document).on('focusin', '#clients', function(e){
            clientsPrev = this.value;
        })

        $(document).on('focusout', '#clients', function(e){
            clientsPrev = $("#clients").value;
        })

        $(document).on( "change", "#clients", function(e){
            var numberOfClients = this.value;

            if(clientsPrev > numberOfClients){
                var removeElements = parseInt(clientsPrev) - parseInt(numberOfClients);
                for(var el = 0; el < removeElements; el++){
                    $('.client-divs:last').remove();
                }
            } else if(clientsPrev < numberOfClients) {
                var addElements = isNaN(parseInt(clientsPrev)) ? numberOfClients : parseInt(numberOfClients) - parseInt(clientsPrev);
                var startCount = isNaN(parseInt(clientsPrev)) ? 1 : parseInt(clientsPrev) + 1;
                var clientDivs = "";
                for(var x = startCount; x <= numberOfClients; x++){
                    clientDivs += '<div class="client-divs"><hr/><div class="form-group row"><div class="col">Client '+ (parseInt(x)) +'</div></div><div class="form-group row"><div class="col-md-4"><label for="cfirstname">First Name</label><input name="cfirstname[]" type="text" class="form-control" required></div><div class="col-md-4"><label for="clastname">Last Name</label><input name="clastname[]" type="text" class="form-control" required></div><div class="col-md-4"><label for="cemail">Email</label><input name="cemail[]" type="email" class="form-control" required></div></div></div>';
                }
                $('#thisBlock').append(clientDivs);
            } else {
                consol.log('else');
                $('.client-divs').remove();
                var clientDivs = "";
                for(var x = 1; x <= numberOfClients; x++){
                    clientDivs += '<div class="client-divs"><hr/><div class="form-group row"><div class="col">Client '+ (parseInt(x)) +'</div></div><div class="form-group row"><div class="col-md-4"><label for="cfirstname">First Name</label><input name="cfirstname[]" type="text" class="form-control" required></div><div class="col-md-4"><label for="clastname">Last Name</label><input name="clastname[]" type="text" class="form-control" required></div><div class="col-md-4"><label for="cemail">Email</label><input name="cemail[]" type="email" class="form-control" required></div></div></div>';
                }
                $('#thisBlock').append(clientDivs);
            }

        });

        $('.select2').select2();
    });
	</script>
@stop
