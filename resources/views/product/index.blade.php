@extends('layout.master')
@section('css')
<link href="{{ asset('assets/vendor/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
@endsection
@section('title' , 'Product')
@section('content')

<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Product</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0);">Product</a></div>
         </div>
      </div>
      <div class="section-body">
         {{-- <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <form action="" class="form-inline">
                        <input type="text" class="form-control mr-2" placeholder="Cari Berdasarkan Judul..." name='search'>
                        <button type="submit" class='btn btn-primary'>Cari</button>
                     </form>
                  </div>
                  <div class="col-md-2 ml-auto">
                     <a class="btn btn-primary float-right" href="">Tambah Produk</a>
                  </div>
               </div>
            </div>

         </div> --}}

         <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Incoming Stock</h4>
                    </div>
                    <div class="card-body">
                      {{ number_format($totalIncomingStock) }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-minus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Outcoming Stock</h4>
                    </div>
                    <div class="card-body">
                      {{ number_format($totalOutgoingStock) }}
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-list-ol"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Stock Product</h4>
                  </div>
                  <div class="card-body">
                    {{ number_format($totalStock) }}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-box"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Product</h4>
                    </div>
                    <div class="card-body">
                      {{ number_format($totalProduct) }}
                    </div>
                  </div>
                </div>
              </div>
                 
          </div>

         <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>List Product</h4>
                  <div class="card-header-action">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tbody><tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Total Stock</th>
                        <th>Added By</th>
                        <th>Date</th>
                        <th>Manage</th>
                      </tr>
                      <tr>
                        @foreach ($products as $product)
                        <td class="font-weight-600"> {{ $product->product_id }} </td>
                        <td class="font-weight-600"> {{ $product->name }} </td>
                        <td class="font-weight-600"> {{ number_format($product->price) }} </td>
                        <td class="font-weight-600"> {{ number_format($product->total_stock) }} </td>
                        <td class="font-weight-600"> {{ $product->user->name }} </td>
                        <td class="font-weight-600"> {{ $product->created_at->diffForHumans() }} </td>
                        <td class="font-weight-600"> 
                            <div class='d-inline-flex'>
                              <a href="{{ route('products.view', ['product_id' => $product->product_id]) }}" class='btn btn-icon icon-left btn-info btn-sm mr-2'><i class="fas fa-eye"></i>View</a>
                                <a href="{{ route('products.edit', ['product_id' => $product->product_id]) }}" class='btn btn-icon icon-left btn-warning btn-sm mr-2'><i class="fas fa-edit"></i>Edit</a>
                                <form action="{{ route('products.delete', ['product_id' => $product->product_id]) }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class='btn btn-icon icon-left btn-danger btn-sm btn-delete'><i class="fas fa-trash"></i>Delete</button>
                                </form>
                             </div>    
                        </td>

                      </tr>
                      @endforeach
                      <tr>
                    </tbody></table>
                  </div>
                </div>
{{-- 
                  <div class="card">
                    <div class="card-body">
                        <ul class="pagination">
                            <li class="page-item">{{$products->links()}}</li>
                          </li>
                        </ul>
                      </nav>
                  </div>
                </div>
                 --}}
              </div>
            </div>

 
    </div>
</section>




</div>

@endsection
@section('script')
<script src="{{ asset('assets/vendor/sweet-alert2/sweetalert2.min.js')}}"></>
<script src="{{ asset('assets/scripts/sweetalert.js') }}"></script>
@if(Session::has('success'))
<script>
   toastr.success("{{Session::get('success')}}")
</script>
@endif

@endsection