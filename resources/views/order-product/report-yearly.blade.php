@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
            <div class="card mb-4">
                    <div class="card-header">Yearly Report</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/reportyearly') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    @php
                                        $start_at = 2020;
                                    @endphp
                                    <select class="form-control" name="year" id="year" >
                                        <option value="">เลือกปี</option>
                                        @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>  
                                    <script>
                                        document.querySelector("#year").value = "{{ request('year') }}"
                                    </script>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Report yearly : {{ request('year') }}</div>
                    <div class="card-body">                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Completed At</th><th>Order Id</th><th>Product Id</th><th>Quantity</th><th>Price</th><th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderproduct as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->completed_at }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>                                            
                                            <div><img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> </div>                                            
                                            <div>{{ $item->product->title }}</div>
                                        </td>
                                        <td>{{ $item->sum_quantity }}</td>
                                        <td>{{ $item->avg_price }}</td>
                                        <td>{{ $item->sum_total }}</td>                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                           
                        </div>
                        <h2>รวมราคาสินค้า {{ number_format($orderproduct->sum('sum_total')) }} บาท</h2>

                        


                    </div>
                </div>
                <!--เพิ่ม chart จาก google chart -->
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <div id="chart_div"></div>
                

                <script >

                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawBarColors);

                function drawBarColors() {
                    var data = google.visualization.arrayToDataTable([
                        ['product', 'Quantity', 'Total'],
                       // ['Product A', 8175000, 8008000],
                       // ['Product B', 3792000, 3694000],
                        //['Product C', 2695000, 2896000],
                        //['Product D', 2099000, 1953000],
                        //['Product E', 1526000, 1517000]
                        @foreach($orderproduct as $item)
                            ['{{ $item->product->title }}',{{ $item->sum_quantity }},{{ $item->sum_total }}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'กราฟรายงานสินค้า',
                        chartArea: {width: '50%'},
                        colors: ['#b0120a', '#ffab91'],
                        hAxis: {
                        title: 'Total',
                        minValue: 0
                        },
                        vAxis: {
                        title: 'City'
                        }
                    };
                    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                    }
                </script>
                
            </div>
        </div>
    </div>
@endsection
