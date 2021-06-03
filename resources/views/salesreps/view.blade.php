@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sales Representatives') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ Session::remove('status') }};
                    @endif

                    <table class="table table-bordered table-striped" id="basic-datatable">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Commission Percentage</th>
                            <th>Tax Rate</th>
                            <th>Bonuses</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salesReps as $rep)
                        <tr>
                            <td>{{ $rep->firstname }}</td>
                            <td>{{ $rep->lastname }}</td>
                            <td>{{ $rep->commission_percentage }}%</td>
                            <td>{{ $rep->tax_rate }}%</td>
                            <td>${{ $rep->bonuses }}</td>
                            <td>{{ date("d/m/Y g:i a",strtotime($rep->created_at)) }}</td>
                            <td><a href="/salesreps/{{ $rep->id }}/delete" class="btn btn-danger btn-xs delete">Delete</a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
	<script>
		$("#basic-datatable").DataTable();

        $('.delete').click(function(e) {
            e.preventDefault();
            var con = confirm("Are you sure you want to delete this sales rep?");
            if (con==true)   {
                window.location = $(this).attr('href');
            }

        });
	</script>
@stop
