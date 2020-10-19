@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="dashboard-header">
                <div class="box-1">
                    <div class="dash-title">{{ __('Dashboard') }}</div>

                    <div class="login-status">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <div class="box-2">
                    <button class="signin-button pres-button" data-toggle="modal" data-target="#createModal" >Create Prescrition</button>    
                </div>
                
                
            </div>
            <div class="dashboard-table">
                <table class="table table-hover shadow-inset rounded" style="text-align:center;">
                    <tr style="position: sticky; top: 0;">
                        <th class="border-0" scope="col" id="class3" width='10%' >Date</th>
                        <th class="border-0" scope="col" id="teacher3" width='15%' >Name</th>
                        <th class="border-0" scope="col" id="males3" width='1%'>Age</th>
                        <th class="border-0" scope="col" id="females3">Gender</th>
                        <th class="border-0" scope="col" id="males3">Diagnosis</th>
                        <th class="border-0" scope="col" id="females3">Medicines</th>
                        <th class="border-0" scope="col" id="females3" width='10%'>Next Visit</th>
                        <th class="border-0" scope="col" id="females3" width='15%'>Action</th>
                    </tr>
                    @foreach ($data as $row)
                    <tr id="tr_{{ $row->id }}">
                        <td>{{ $row->prescription_date }}</td>
                        <td>{{ $row->patient_name }}</td>
                        <td>{{ $row->patient_age }}</td>
                        <td>{{ $row->patient_gender }}</td>
                        <td>{{ $row->patient_diagnosis }}</td>
                        <td>{{ $row->patient_medicines }}</td>
                        <td>{{ $row->nextVisit_date }}</td>
                        <td>
                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button class="btn delBTN removeItem" pres_id="{{ $row->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
        
    </div>
</div>

<!-- modals here -->

<!-- create Modal -->
<div class="modal fade " tabindex="-1" id="createModal" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body" style="color: black">
                <h5 class="modal-title" style="color: black">Details</h5>

                <p>Modal body text goes here.</p>
                
                <table id="shipping_body">
                
                </table>
            </div>
        </div>
  </div>
</div>


<!-- edit Modal -->
<div class="modal fade " tabindex="-1" id="editModal" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body" style="color: black">
                <h5 class="modal-title" style="color: black">Edit Prescription</h5>

                <p>Modal body text goes here.</p>

                <table id="shipping_body">
                
                </table>
            </div>
        </div>   
  </div>
</div>

<!-- delete Modal -->
<div class="modal fade " tabindex="-1" id="deleteModal" role="dialog">
  <div class="modal-dialog modal-md" role="document">
         <div class="modal-content">
            <div class="modal-body" style="color: black">
                <h5 class="modal-title" style="color: black">Delete Prescription</h5>

                <p>Please Confirm Deletion</p>

                <button class="btn delBTN" id="delete-btn">Delete</button>
                <button class="btn btn-info cancel" data-dismiss="modal">Cancle</button>

                <table id="shipping_body">
                
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modalSection ends -->

@endsection


@section('page_level_js')
<script type="text/javascript">

    $('.removeItem').click( function(e) {
    var pres_id = $(this).attr('pres_id');
    console.log(pres_id);
    $('#delete-btn').attr('pres_id', pres_id);
  });

    $('#delete-btn').click( function() {
    $('#deleteModal').modal('toggle');
      var pres_id = $(this).attr('pres_id');
      console.log(pres_id);
      $.ajax({
          url: "{{ url('presItemDelete/') }}"+'/'+ pres_id,
          type: "GET",
          dataType: "html",
          success: function(data){
            if(data){
              console.log(data);
              $('#tr_'+pres_id).hide('slow');
             
            }
          }
      });
       
  });

</script>
@endsection