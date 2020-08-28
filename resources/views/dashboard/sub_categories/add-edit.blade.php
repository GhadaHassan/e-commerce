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
              <a href="{{ url('dashboard/sub_categories') }}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-angle-double-left"></i>&nbsp; BACK</a>
            </div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <div class="box-body">
              <form role="form" id="addEditUser" action="{{route('sub_categories.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="subcategoryId" value="{{ (!empty($result->id))?($result->id):('') }}">

                <div class="box-body col-md-12 ">

                  <div class="row">
                    
                    <div class="form-group col-md-6">
                      @php $input = 'name'; @endphp
                      <label for="exampleInputEmail1">NAME <span class="text-danger">*</span></label>                  
                      <input type="text" value="{{ (!empty($result->name))?($result->name):('') }}" name="{{$input}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER NAME" required>
                      @if ($errors->has($input))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group col-md-6 ">
                      @php $input = 'c_id'; @endphp
                    

                      <label for="exampleInputEmail1">SELECT CATEGORY NAME<span class="text-danger">*</span></label>
                      @if (!empty($result->id)) 
                      @php $id = $result->c_id;  @endphp
                      @endif
                      <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" required>
          
                          @if(!empty($id))
                            <option value="{{ (!empty($result->c_id))?($result->c_id):('') }}">{{ $result->categories->name }}</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}" > {{$category->name}} </option>
                              {{-- <option value="{{ $category->id }}"{{ in_array($category->id ,$selectedCategory) ? 'selected' : ''}}>{{$category->name}}</option> --}}
                            @endforeach
                          @else
                            <option  value="">SELECT CATEGORY NAME</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}"> {{$category->name}} </option>
                              {{-- <option value="{{ $category->id }}"{{ in_array($category->id ,$selectedCategory) ? 'selected' : ''}}>{{$category->name}}</option> --}}
                            @endforeach
                          @endif
                  
                          
                       
                      </select>
                      @if ($errors->has($input))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first($input) }}</strong>
                          </span>
                      @endif
                    </div>

              </form>
                <br><br><br><br>
                <div id="show-div" style="padding-left: 15px"> 
                  <div class="form-group row"> 
                    <div class=" col-md-6">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
                
            </div>
            
        </div>
    </div>
  </div>
</section>
@endsection


@section('js')
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="{{asset('plugnis/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('js/custom-script.js') }}"></script>



@endsection