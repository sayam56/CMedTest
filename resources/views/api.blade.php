@extends('layouts.app')

@section('page_level_bs')
<link href="{{ asset('/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Interaction Concept
                        <table>
                            <th>mincon item
                                <table>
                                    <th>rxcui</th>
                                    <th>name</th>
                                    <th>tty</th>
                                </table>
                            </th>
                            <th>source con item
                                <table>
                                <th>id</th>
                                <th>name</th>
                                <th>url</th>
                                </table>
                            </th>
                        
                            <th>mincon item
                                <table>
                                    <th>rxcui</th>
                                    <th>name</th>
                                    <th>tty</th>
                                </table>
                            </th>
                            <th>source con item
                                <table>
                                <th>id</th>
                                <th>name</th>
                                <th>url</th>
                                </table>
                            </th>
                        </table>
                      </th>
                      <th>Severity</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Interaction Concept
                            <table>
                                <th>mincon item
                                    <table>
                                        <th>rxcui</th>
                                        <th>name</th>
                                        <th>tty</th>
                                    </table>
                                </th>
                                <th>source con item
                                    <table>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>url</th>
                                    </table>
                                </th>
                        
                            <th>mincon item
                                <table>
                                    <th>rxcui</th>
                                    <th>name</th>
                                    <th>tty</th>
                                </table>
                            </th>
                            <th>source con item
                                <table>
                                <th>id</th>
                                <th>name</th>
                                <th>url</th>
                                </table>
                            </th>
                        </table>
                        </th>
                        <th>Severity</th>
                        <th>Description</th>
                        </tr>
                  </tfoot>
                  <tbody>
                        @foreach( $array as $row )
                            @foreach ( $row as $interactionConcept=>$value ) 
                                <tr>
                                <td>
                                    <table>
                                        <!-- value 0 scope min and source pair -->                                    
                                            <td>
                                            @php $minCon= $value[0]->minConceptItem @endphp
                                                <table>
                                                    <td> {{$minCon->rxcui}}</td>
                                                    <td> {{$minCon->name}}</td>
                                                    <td> {{$minCon->tty}}</td>
                                                </table>
                                            </td>
                                        
                                        <td>
                                        @php $sourceCon= $value[0]->sourceConceptItem @endphp
                                            <table>
                                                <td>{{$sourceCon->id}}</td>
                                                <td>{{$sourceCon->name}}</td>
                                                <td>{{$sourceCon->url}}</td>
                                            </table>
                                        </td>
                                        <!-- value [1] scope min source pair -->
                                        <td>
                                        @php $minCon= $value[1]->minConceptItem @endphp
                                            <table>
                                                <td> {{$minCon->rxcui}}</td>
                                                <td> {{$minCon->name}}</td>
                                                <td> {{$minCon->tty}}</td>
                                            </table>
                                        </td>
                                        
                                        <td>
                                        @php $sourceCon= $value[1]->sourceConceptItem @endphp
                                            <table>
                                                <td>{{$sourceCon->id}}</td>
                                                <td>{{$sourceCon->name}}</td>
                                                <td>{{$sourceCon->url}}</td>
                                            </table>
                                        </td>
                                        
                                    </table>
                                </td>
                                <td>{{$row->severity}}</td>
                                <td>{{ $row->description }}</td>
                            </tr>
                            @break
                            @endforeach
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection


@section('page_level_js')
<!-- Page level plugins -->
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('/js/datatables-demo.js') }}"></script>
@endsection