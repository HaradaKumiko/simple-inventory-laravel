@extends('layout.master')
@section('title' , 'Tambah Blog')
@section('content')
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Add Product</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0);">Add Product</a></div>
         </div>
        </div>
  
        <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Add Product</h4>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"> 
          @csrf
        <div class="card-body">

          <div class="form-group row align-items-center">
            <label class="form-control-label col-sm-3 text-md-right">Product Name</label>
            <div class="col-sm-6 col-md-9">
              <input type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
              @if($errors->has('name'))
              <div class="invalid-feedback">
                {{$errors->first('name')}}
              </div>   
              @endif  
            </div>
          </div>

          <div class="form-group row align-items-center">
            <label class="form-control-label col-sm-3 text-md-right">Product Price</label>
            <div class="col-sm-6 col-md-9">
                <input type="number" name="price" required class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}">
                @if($errors->has('price'))
              <div class="invalid-feedback">
                {{$errors->first('price')}}
              </div>   
              @endif  
            </div>
          </div>


          <div class="text-md-right">
          <button class="btn btn-primary" type="submit">Add Product</button>
          </div>


      </div>
    </form>
  </div>
        </div>
      </div>
        </div>
      </section>
    </div>
@endsection
