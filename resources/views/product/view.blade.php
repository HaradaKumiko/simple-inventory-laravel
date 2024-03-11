@extends('layout.master')
@section('title' , 'View History Product')
@section('content')
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>View History Product</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0);">View History Product</a></div>
         </div>
        </div>
  
        <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>View History Product</h4>
        </div>
        <div class="card-body">
            <div class="row">


                <div class="col-4 col-md-4 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Statistic Incoming & Outgoing Stock</h4>
                    </div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="myChart1" width="282" height="141" style="display: block; width: 282px; height: 141px;" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                </div>               
                
                <div class="col-4 col-md-4 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Statistic Incoming</h4>
                    </div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="myChart2" width="282" height="141" style="display: block; width: 282px; height: 141px;" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                </div>    


                <div class="col-4 col-md-4 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Statistic Outcoming</h4>
                    </div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="myChart3" width="282" height="141" style="display: block; width: 282px; height: 141px;" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                </div>  
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>List History Product</h4>
              <div class="card-header-action">
                <a href="{{ route('products.history.create', ['product_id' => $product->product_id]) }}" class="btn btn-primary">Add Stock Product</a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>Product History ID</th>
                    <th> Type </th>
                    <th> Stock </th>
                    <th>Added By</th>
                    <th>Date</th>
                    {{-- <th>Manage</th> --}}
                  </tr>
                  <tr>
                    @foreach ($histories as $history)
                    <td class="font-weight-600"> {{ $history->product_stock_history_id }} </td>
                    <td class="font-weight-600">
                      @if($history->type === 'incoming')
                          <span class="badge badge-success"> {{ $history->type }} </span>
                      @else
                          <span class="badge badge-danger"> {{ $history->type }} </span>
                      @endif
                  </td>
                    <td class="font-weight-600"> {{ $history->stock }} </td>
                    <td class="font-weight-600"> {{ $product->user->name }} </td>
                    <td class="font-weight-600"> {{ $history->created_at->diffForHumans() }} </td>
                    {{-- <td class="font-weight-600"> 
                        <div class='d-inline-flex'>
                          <a href="{{ route('products.view', ['product_id' => $product->product_id]) }}" class='btn btn-icon icon-left btn-info btn-sm mr-2'><i class="fas fa-eye"></i>View</a>
                            <a href="" class='btn btn-icon icon-left btn-warning btn-sm mr-2'><i class="fas fa-edit"></i>Edit</a>
                            <form action="" method="post">
                               @csrf
                               @method('delete')
                               <button type="button" class='btn btn-icon icon-left btn-danger btn-sm btn-delete'><i class="fas fa-trash"></i>Delete</button>
                            </form>
                         </div>    
                    </td> --}}

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
  </div>
        </div>
      </div>
        </div>
      </section>
    </div>
@endsection
@section('script')
<script src="{{ asset('js/chart.js') }}"></script>
<script> 
    const product_id = '{{ $product->product_id }}';
    const port = window.location.port;

fetch(`http://127.0.0.1:${port}/api/product-history/${product_id}`)
    .then(response => response.json())
    .then(data => {

        let stockIn = 0;
        let stockOut = 0;

        let labelDateIncoming = [];
        let stockInArray = [];


        let labelDateOutgoing = []; 
        let stockOutArray = [];

        data.forEach(history => {

            if (history.type === 'incoming') {
                stockIn += history.stock;
                stockInArray.push(history.stock)
                const date = new Date(history.created_at).toLocaleDateString();
                labelDateIncoming.push(date);
            } else if (history.type === 'outgoing') {
                stockOut += history.stock;
                stockOutArray.push(history.stock)
                const date = new Date(history.created_at).toLocaleDateString();
                labelDateOutgoing.push(date);
                console.log()
            }
        });

        console.log(stockInArray)

        // Chart.js setup
        var ctx1 = document.getElementById("myChart1").getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [stockOut, stockIn], // Update data with stockOut and stockIn
                    backgroundColor: [
                        '#fc544b', // Color for Stock Out
                        '#6777ef', // Color for Stock In
                    ],
                    label: 'Type'
                }],
                labels: [
                    'Stock Out',
                    'Stock In'
                ],
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

        // Chart.js setup
        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx2, {
          type: 'bar',
          data: {
            labels: labelDateIncoming,
            datasets: [{
              label: 'Stock Incoming',
              data: stockInArray,
              borderWidth: 2,
              backgroundColor: '#6777ef',
              borderColor: '#6777ef',
              borderWidth: 2.5,
              pointBackgroundColor: '#ffffff',
              pointRadius: 4
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                gridLines: {
                  drawBorder: false,
                  color: '#f2f2f2',
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 0
                }
              }],
              xAxes: [{
                ticks: {
                  display: false
                },
                gridLines: {
                  display: false
                }
              }]
            },
          }
        });

        // Chart.js setup
        var ctx3 = document.getElementById("myChart3").getContext('2d');
        var myChart3 = new Chart(ctx3, {
          type: 'bar',
          data: {
            labels: labelDateOutgoing,
            datasets: [{
              label: 'Stock Outcoming',
              data: stockOutArray,
              borderWidth: 2,
              backgroundColor: '#fc544b',
              borderColor: '#fc544b',
              borderWidth: 2.5,
              pointBackgroundColor: '#ffffff',
              pointRadius: 4
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                gridLines: {
                  drawBorder: false,
                  color: '#fc544b',
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 0
                }
              }],
              xAxes: [{
                ticks: {
                  display: false
                },
                gridLines: {
                  display: false
                }
              }]
            },
          }
        });
      
        })
    .catch(error => {
        console.error('Error fetching data:', error);
    });


</script>
@endsection
