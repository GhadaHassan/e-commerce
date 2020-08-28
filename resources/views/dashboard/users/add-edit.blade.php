@extends('dashboard.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('plugnis/fancybox/source/jquery.fancybox.css') }}">
@endsection

@section('content')
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary box-solid">
        <div class="box-header box-header-background with-border">
          <h3 class="box-title">{{ $title }}</h3>
          <div class="box-tools pull-right">
            <a href="{{ url('dashboard/users') }}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-angle-double-left"></i>&nbsp; BACK</a>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form role="form" id="addEditUser" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="userId" value="{{ (!empty($result->id))?($result->id):('') }}">

            <div class="box-body col-md-12 ">

              <div class="row">
                
                <div class="form-group col-md-6">
                  @php $input = 'name'; @endphp
                  <label for="">NAME <span class="text-danger">*</span></label>                  
                  <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER NAME" value="{{ (!empty($result->name))?($result->name):('') }}" name="{{$input}}" required>
                  @if ($errors->has($input))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($input) }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group col-md-6 ">
                    @php $input = 'phone'; @endphp
                    <label for="">PHONE <span class="text-danger">*</span></label>
                    
                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" placeholder="ENTER PHONE" value="{{ (!empty($result->phone))?($result->phone):('') }}" name="{{$input}}" required>
                    @if ($errors->has($input))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

              

              {{-- <div id="show-div"> --}}
                <div class="row">
                  <div class="form-group col-md-6">
                    @php $input = 'username'; @endphp
                    <label for="">USER NAME <span class="text-danger">*</span></label>                  
                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER USER NAME" value="{{ (!empty($result->username))?($result->username):('') }}" name="{{$input}}" required>
                    @if ($errors->has($input))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first($input) }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group col-md-6 ">
                    @php $input = 'password'; @endphp
                    <label for="">PASSWORD <span class="text-danger">*</span></label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="ENTER PASSWORD" value="{{ (!empty($result->password))?($result->password):('') }}" name="{{$input}}" required>
                    @if ($errors->has($input))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first($input) }}</strong>
                            </span>
                    @endif
                  </div>

                  <div class="form-group col-md-6 ">
                    @php $input = 'authorization'; @endphp
                    <label for="exampleInputEmail1">SELECT USER TYPE <span class="text-danger">*</span></label>
                    @if (!empty($result->id)) 
                    @php $id = $result->authorization; @endphp
                    @endif
                   
                    <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}">
                      @if(!empty($id))
                      {{-- @php dd('asd'); @endphp --}}
                        @if(isset($id) == '0')
                          <option  value="">ADMIN</option>
                        @else  
                          <option  value="">USER</option>
                        @endif  

                        <option  value="0" {{ isset($row) && $row[$input] == '0' ? 'selected' : ''}}>ADMIN</option>
                        <option  value="1" {{ isset($row) && $row[$input] == '1' ? 'selected' : ''}}>USER</option>
                      @else
                        
                        <option  value="">SELECT USER TYPE</option>
                        <option value="0" {{ isset($row) && $row[$input] == '0' ? 'selected' : ''}}>Admin</option>
                        <option value="1" {{ isset($row) && $row[$input] == '1' ? 'selected' : ''}}>User</option>
                      @endif
                        
                     
                    </select>
                    @if ($errors->has($input))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                    @endif
                  </div>
                  
                </div>
              {{-- </div> --}}
            </div>
            
            <div class="box-body col-md-12 ">
              <div class="form-group row">
                  <div class=" col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
            </div>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</section>
@endsection


@section('js')
<script type="text/javascript" src="{{asset('plugnis/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('js/custom-script.js') }}"></script>
@endsection