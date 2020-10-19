@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="login-div report-div">
                <div class="box-1">
                    <div class="dash-title" style="margin-top:-20px; margin-bottom:20px;">{{ __('Prescription Report') }}</div>
                </div>      
                <table class="table table-hover shadow-inset rounded" style="text-align:center;">
                    <tr>
                        <th class="border-0" scope="col" id="class3"  >Date</th>
                        <th class="border-0" scope="col" id="teacher3"  >Prescription Count</th>
                    </tr>
                    @foreach ($report as $row)
                    <tr>
                    <td>{{ $row->prescription_date }}</td>
                    <td>{{ $row->pres_count }}</td>
                    </tr>
                    @endforeach
                    
                </table>
            </div>
            
        
    </div>
</div>
@endsection