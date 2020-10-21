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
                 
                  <tbody>
                        @foreach( $array as $row ) <!-- this loops the number of elements times -->
                            @foreach ( $row as $interactionConcept=>$value ) <!-- and for each element we have this value pair -->
                            @php 
                            //these are the first minsource pair
                            $minCon= $value[0]->minConceptItem;

                            $sourceCon= $value[0]->sourceConceptItem;


                            //2nd minsoruce pair
                            $minCon2= $value[1]->minConceptItem;

                            $sourceCon2= $value[1]->sourceConceptItem;

                            @endphp
                            <tr>
                                <td>
                                    <table>
                                        <!-- value 0 scope min and source pair -->                                    
                                        <td>
                                            <table>
                                                <td> {{$minCon->rxcui}}</td>
                                                <td> {{$minCon->name}}</td>
                                                <td> {{$minCon->tty}}</td>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <td>{{$sourceCon->id}}</td>
                                                <td>{{$sourceCon->name}}</td>
                                                <td>{{$sourceCon->url}}</td>
                                            </table>
                                        </td>

                                        <!-- value [1] scope min source pair -->
                                        <td>
                                            <table>
                                                <td> {{$minCon2->rxcui}}</td>
                                                <td> {{$minCon2->name}}</td>
                                                <td> {{$minCon2->tty}}</td>
                                            </table>
                                        </td>
                                        
                                        <td>
                                            <table>
                                                <td>{{$sourceCon2->id}}</td>
                                                <td>{{$sourceCon2->name}}</td>
                                                <td>{{$sourceCon2->url}}</td>
                                            </table>
                                        </td>
                                        
                                    </table>
                                </td>
                                <td>{{$row->severity}}</td>
                                <td>{{ $row->description }}</td>
                            </tr>
                            
                            @break <!-- so we break out of the inner loop in order to avoid overwriting the values -->
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