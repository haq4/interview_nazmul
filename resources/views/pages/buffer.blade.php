@extends('layouts.app')
@section('content')
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <div class="container-fluid app-body settings-page">
    <h1>Buffer list</h1>
    <!-- <table class="table table-hover">  -->


        <div class="form-group pull-left" style="padding: 10px;">
            <input type="text" class="search form-control" id="myInput" onkeyup="myFunction()" placeholder="What you looking for?">
        </div>

        <div class="form-group pull-left" style="padding: 10px;">
            <!-- Datepicker as text field -->         
          <div class="input-group date" style="width: 400px;" data-date-format="dd.mm.yyyy">
            <input type="text" class="form-control" placeholder="dd.mm.yyyy">
            <div class="input-group-addon" style="display: none;">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>

        <div class="form-group pull-left" style="padding: 10px;">
            <select class="form-control">
              <option>All Group</option>
              @if($data)
                  @foreach ($data as $buffer)
                  <option>{{$buffer->name}}</option>
                  @endforeach
              @endif
            </select>
        </div>
        

            
        <span class="counter pull-right"></span>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead> 
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post text</th>
                        <th>Time</th>
                    </tr> 
                </thead> 
                <tbody> 
                @if($data)
                @foreach ($data as $buffer)
                    <tr>
                        <td width="350">
                            {{$buffer->name}}
                        </td> 

                        <td>
                            {{$buffer->type}}
                        </td> 

                            
                        <td>
                            <!-- <img src="{{$buffer->avatar}}">  -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <span class="fa fa-{{$buffer->type}} myfaico" style=""></span>
                                        <img width="50" class="media-object img-circle" src="{{$buffer->avatar}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <style type="text/css">
                                .myfaico{
                                        top: -3px;
                                        right: -10px;
                                        background: #3097d1;
                                        display: inline-block;
                                        width: 25px;
                                        height: 25px;
                                        line-height: 22px;
                                        text-align: center;
                                        color: #fff;
                                        border-radius: 50%;
                                        border: 3px solid;
                                        border-radius: 50%;
                                        position: absolute;
                                        font-size: 12px;
                                }
                            </style>
                        </td>  


                        <td>
                            {{$buffer->post_text}}
                        </td>
                            
                        <td> 
                            {{$buffer->sent_at}}
                        </td> 
                    </tr>
                @endforeach
                @endif
                </tbody> 
            </table>
    {{$data->links()}}
    </div>
    <script type="text/javascript">
        $('.input-group.date').datepicker({format: "dd.mm.yyyy"});

        // $(document).ready(function(){
        //   $("#myInput").on("keyup", function() {
        //     var value = $(this).val().toLowerCase();
        //     $("#myTable tr").filter(function() {
        //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //     });
        //   });
        // });
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>
@endsection
