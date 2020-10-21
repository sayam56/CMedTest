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

                       

                        @if (session('updated')) {{ __('Prescription Updated!') }}

                        @elseif (session('created')) {{ __('New Prescription Created!') }}

                        @elseif (session('filter')) {{ __('Prescription List Filtered!') }}
                            
                        @else {{ __('You are logged in!') }}

                        @endif
                    </div>
                </div>
                <div class="box-2">
                    <button class="signin-button pres-button" data-toggle="modal" data-target="#createModal" >Create Prescription</button>    
                </div>
                
                
            </div>
            <div class="dashboard-table">
                <div class="filter">
                    <form action="{{ route('filterList') }}" method="post">
                    {{ csrf_field() }}
                        <h6>Start Date: <input type="date" name="start_date" required style="margin-right:30px;"> </h6>
                        
                        <h6>End Date: <input type="date" required name="end_date" > </h6>
                        
                        <button type="submit" class="filter-btn" style="margin-left: 30px; margin-top: -10px;">FIlter List</button>
                        
                    
                    </form>
                </div>

                <table class="table table-hover shadow-inset rounded" style="text-align:center;">
                    <tr style="position: sticky; top: 0;">
                        <th class="border-0" scope="col" width='10%' >Date</th>
                        <th class="border-0" scope="col" width='15%' >Name</th>
                        <th class="border-0" scope="col" width='1%'>Age</th>
                        <th class="border-0" scope="col" >Gender</th>
                        <th class="border-0" scope="col" >Diagnosis</th>
                        <th class="border-0" scope="col" >Medicines</th>
                        <th class="border-0" scope="col" width='10%'>Next Visit</th>
                        <th class="border-0" scope="col" width='15%'>Action</th>
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
                            <!-- <button class="btn btn-info editItem" href="fetchEditItemInfo/{{$row->id}}">Edit</button> -->
                            <a href="fetchEditItemInfo/{{$row->id}}" class="btn btn-info">Edit</a>
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
  <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" style="color: black">
                <h5 class="modal-title" style="color: black; margin-bottom: -50px;">Create Prescription</h5>

                <div class="fields">
                    <form method="POST" action="{{ route('createPrescription') }}">
                        @csrf

                        <div class="username">
                        <svg class="svg-icon" fill="#999" viewBox="0 0 20 20">
							<path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path>
						</svg>
                           
                                <input id="date" type="date" class="user-input" name="date" required placeholder="Enter Prescription Date" autofocus>
                            
                        </div>

                        <div class="username">
                            <svg class="svg-icon" fill="#999" viewBox="0 0 20 20">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                           
                                <input id="name" type="text" class="user-input" name="name" required placeholder="Enter Patient's Name">
                            
                        </div>
                        <div class="username">
                        <svg class="svg-icon" fill="#999" viewBox="0 0 20 20">
							<path d="M10,1.75c-4.557,0-8.25,3.693-8.25,8.25c0,4.557,3.693,8.25,8.25,8.25c4.557,0,8.25-3.693,8.25-8.25C18.25,5.443,14.557,1.75,10,1.75 M10,17.382c-4.071,0-7.381-3.312-7.381-7.382c0-4.071,3.311-7.381,7.381-7.381c4.07,0,7.381,3.311,7.381,7.381C17.381,14.07,14.07,17.382,10,17.382 M7.612,10.869c-0.838,0-1.52,0.681-1.52,1.519s0.682,1.521,1.52,1.521c0.838,0,1.52-0.683,1.52-1.521S8.45,10.869,7.612,10.869 M7.612,13.039c-0.359,0-0.651-0.293-0.651-0.651c0-0.357,0.292-0.65,0.651-0.65c0.358,0,0.651,0.293,0.651,0.65C8.263,12.746,7.97,13.039,7.612,13.039 M7.629,6.11c-0.838,0-1.52,0.682-1.52,1.52c0,0.838,0.682,1.521,1.52,1.521c0.838,0,1.521-0.682,1.521-1.521C9.15,6.792,8.468,6.11,7.629,6.11M7.629,8.281c-0.358,0-0.651-0.292-0.651-0.651c0-0.358,0.292-0.651,0.651-0.651c0.359,0,0.651,0.292,0.651,0.651C8.281,7.988,7.988,8.281,7.629,8.281 M12.375,10.855c-0.838,0-1.521,0.682-1.521,1.52s0.683,1.52,1.521,1.52s1.52-0.682,1.52-1.52S13.213,10.855,12.375,10.855 M12.375,13.026c-0.358,0-0.652-0.294-0.652-0.651c0-0.358,0.294-0.652,0.652-0.652c0.357,0,0.65,0.294,0.65,0.652C13.025,12.732,12.732,13.026,12.375,13.026 M12.389,6.092c-0.839,0-1.52,0.682-1.52,1.52c0,0.838,0.681,1.52,1.52,1.52c0.838,0,1.52-0.681,1.52-1.52C13.908,6.774,13.227,6.092,12.389,6.092 M12.389,8.263c-0.36,0-0.652-0.293-0.652-0.651c0-0.359,0.292-0.651,0.652-0.651c0.357,0,0.65,0.292,0.65,0.651C13.039,7.97,12.746,8.263,12.389,8.263"></path>
						</svg>
                           
                                <input id="age" type="number" class="user-input" name="age" required placeholder="Enter Patient's Age" >
                            
                        </div>
                        <div class="username">
                        <svg class="svg-icon" fill="#999" viewBox="0 0 20 20">
							<path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
						</svg>
                           
                                <input id="gender" type="text" class="user-input" name="gender" required placeholder="Specify Gender">
                            
                        </div>
                        <div class="username">
                        <svg class="svg-icon" fill="#999" viewBox="0 0 20 20"  style="margin-top:-155px;">
							<path d="M8.749,9.934c0,0.247-0.202,0.449-0.449,0.449H4.257c-0.247,0-0.449-0.202-0.449-0.449S4.01,9.484,4.257,9.484H8.3C8.547,9.484,8.749,9.687,8.749,9.934 M7.402,12.627H4.257c-0.247,0-0.449,0.202-0.449,0.449s0.202,0.449,0.449,0.449h3.145c0.247,0,0.449-0.202,0.449-0.449S7.648,12.627,7.402,12.627 M8.3,6.339H4.257c-0.247,0-0.449,0.202-0.449,0.449c0,0.247,0.202,0.449,0.449,0.449H8.3c0.247,0,0.449-0.202,0.449-0.449C8.749,6.541,8.547,6.339,8.3,6.339 M18.631,4.543v10.78c0,0.248-0.202,0.45-0.449,0.45H2.011c-0.247,0-0.449-0.202-0.449-0.45V4.543c0-0.247,0.202-0.449,0.449-0.449h16.17C18.429,4.094,18.631,4.296,18.631,4.543 M17.732,4.993H2.46v9.882h15.272V4.993z M16.371,13.078c0,0.247-0.202,0.449-0.449,0.449H9.646c-0.247,0-0.449-0.202-0.449-0.449c0-1.479,0.883-2.747,2.162-3.299c-0.434-0.418-0.714-1.008-0.714-1.642c0-1.197,0.997-2.246,2.133-2.246s2.134,1.049,2.134,2.246c0,0.634-0.28,1.224-0.714,1.642C15.475,10.331,16.371,11.6,16.371,13.078M11.542,8.137c0,0.622,0.539,1.348,1.235,1.348s1.235-0.726,1.235-1.348c0-0.622-0.539-1.348-1.235-1.348S11.542,7.515,11.542,8.137 M15.435,12.629c-0.214-1.273-1.323-2.246-2.657-2.246s-2.431,0.973-2.644,2.246H15.435z"></path>
						</svg>
                           
                                <!-- <input id="diagnosis" type="textarea" class="user-input" name="diagnosis" required placeholder="Diagnosis"> -->
                                <textarea name="diagnosis" id="diagnosis" cols="60" rows="3" class="user-input" placeholder="Please Mention The Diagnosis" required></textarea>
                            
                        </div>
                        <div class="username">
                        <svg class="svg-icon"  fill="#999" viewBox="0 0 20 20" style="margin-top:-155px;">
							<path d="M17.283,5.549h-5.26V4.335c0-0.222-0.183-0.404-0.404-0.404H8.381c-0.222,0-0.404,0.182-0.404,0.404v1.214h-5.26c-0.223,0-0.405,0.182-0.405,0.405v9.71c0,0.223,0.182,0.405,0.405,0.405h14.566c0.223,0,0.404-0.183,0.404-0.405v-9.71C17.688,5.731,17.506,5.549,17.283,5.549 M8.786,4.74h2.428v0.809H8.786V4.74z M16.879,15.26H3.122v-4.046h5.665v1.201c0,0.223,0.182,0.404,0.405,0.404h1.618c0.222,0,0.405-0.182,0.405-0.404v-1.201h5.665V15.26z M9.595,9.583h0.81v2.428h-0.81V9.583zM16.879,10.405h-5.665V9.19c0-0.222-0.183-0.405-0.405-0.405H9.191c-0.223,0-0.405,0.183-0.405,0.405v1.215H3.122V6.358h13.757V10.405z"></path>
						</svg>
                           
                                <!-- <input id="diagnosis" type="textarea" class="user-input" name="diagnosis" required placeholder="Diagnosis"> -->
                                <textarea name="medicines" id="medicines" cols="60" rows="3" class="user-input" placeholder="Please Mention The Medications" required></textarea>
                            
                        </div>
                        <div class="username">
                        <svg class="svg-icon" fill="#999" viewBox="0 0 20 20">
							<path d="M17.728,4.419H2.273c-0.236,0-0.429,0.193-0.429,0.429v10.304c0,0.234,0.193,0.428,0.429,0.428h15.455c0.235,0,0.429-0.193,0.429-0.428V4.849C18.156,4.613,17.963,4.419,17.728,4.419 M17.298,14.721H2.702V9.57h14.596V14.721zM17.298,8.712H2.702V7.424h14.596V8.712z M17.298,6.566H2.702V5.278h14.596V6.566z M9.142,13.005c0,0.235-0.193,0.43-0.43,0.43H4.419c-0.236,0-0.429-0.194-0.429-0.43c0-0.236,0.193-0.429,0.429-0.429h4.292C8.948,12.576,9.142,12.769,9.142,13.005"></path>
						</svg>
                           
                                <input id="date" type="date" class="user-input" name="nextDate" placeholder="Enter Next Visit Date" autofocus>
                            
                        </div>

                    

                       

                        <div class="form-group row mb-0">
                            
                                <button type="submit" class="signin-button">
                                    {{ __('Create Prescription') }}
                                </button>
                            
                        </div>
                    </form>
                </div>

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
                <button class="btn btn-info cancel" data-dismiss="modal">Cancel</button>

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