@extends('layout.master')
@section('title' , 'Add History Product')
@section('content')
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Add History Product</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0);">Add History Product</a></div>
         </div>
        </div>
  
        <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Add History Product</h4>
        </div>
        <form action="{{ route('products.history.store') }}" method="POST"> 
          @csrf
        <div class="card-body">

          <input type="hidden" name="product_id" value="{{ request()->route('product_id') }}">

            <div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Type</label>
                <div class="col-sm-6 col-md-9">
                    <select name="type" required class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>Select Type</option>
                        <option value="incoming" {{ old('type') === 'incoming' ? 'selected' : '' }}>Incoming</option>
                        <option value="outgoing" {{ old('type') === 'outgoing' ? 'selected' : '' }}>Outgoing</option>
                    </select>
                    @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                    @endif
                </div>
            </div>

          <div class="form-group row align-items-center">
            <label class="form-control-label col-sm-3 text-md-right">Stock</label>
            <div class="col-sm-6 col-md-9">
                <input type="number" name="stock" required class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" value="{{ old('stock') }}">
                @if($errors->has('stock'))
              <div class="invalid-feedback">
                {{$errors->first('stock')}}
              </div>   
              @endif  
            </div>
          </div>


          <div class="text-md-right">
          <button class="btn btn-primary" type="submit">Add History Product</button>
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
