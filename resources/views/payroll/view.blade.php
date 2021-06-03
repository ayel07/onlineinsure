@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Payroll Statements') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped" id="basic-datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sales Rep</th>
                            <th>Date Period</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payrolls as $payroll)
                        <tr>
                            <td>{{ $payroll->id }}</td>
                            <td>{{ $payroll->salesrep->firstname }} {{ $payroll->salesrep->lastname }}</td>
                            <td>{{ date('m/d/Y', strtotime($payroll->start_period)) . "-" . date('m/d/Y', strtotime($payroll->end_period)) }}</td>
                            <td>{{ date("m/d/Y g:i a",strtotime($payroll->created_at)) }}</td>
                            <td><a href="/payroll/{{ $payroll->id }}" class="btn btn-primary btn-xs">View PDF</a></td>

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
	</script>
@stop
