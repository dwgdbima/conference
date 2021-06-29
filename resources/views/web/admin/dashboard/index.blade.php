@extends('web.admin.main')
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Active Users</span>
                <span class="info-box-number">{{$user['active']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-archive"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Submissions</span>
                <span class="info-box-number">{{$submission['total']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Paper Review</span>
                <span class="info-box-number">{{$review['review']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Final Papers</span>
                <span class="info-box-number">{{$final_paper['final_paper']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Recap Report</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>{{$chart['chart_range']}}</strong>
                        </p>

                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" height="270" style="height: 180px; display: block; width: 623px;"
                                width="934" class="chartjs-render-monitor"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Statistic</strong>
                        </p>

                        <div class="progress-group">
                            Active User
                            <span class="float-right"><b>{{$user['active']}}</b>/{{$user['total']}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: {{ceil($user['percentage'])}}%">
                                </div>
                            </div>
                        </div>
                        <!-- /.progress-group -->

                        <div class="progress-group">
                            Submission Payment
                            <span class="float-right"><b>{{$submission['paid']}}</b>/{{$submission['total']}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" style="width: {{ceil($submission['percentage'])}}%">
                                </div>
                            </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Reviewed Papers</span>
                            <span class="float-right"><b>{{$review['review']}}</b>/{{$review['total']}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: {{$review['percentage']}}%"></div>
                            </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                            Final Paper
                            <span
                                class="float-right"><b>{{$final_paper['final_paper']}}</b>/{{$final_paper['total']}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" style="width: {{$final_paper['percentage']}}%">
                                </div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage badge badge-secondary"><i class="fas fa-stopwatch"></i>
                                undecide
                            </span>
                            <h5 class="description-header">{{$paper_review['undecide']}}</h5>
                            <span class="description-text">UNREVIEW PAPER</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage badge badge-success"><i class="fas fa-check"></i>
                                accepted</span>
                            <h5 class="description-header">{{$paper_review['accepted']}}</h5>
                            <span class="description-text">ACCEPTED PAPERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage badge badge-warning"><i class="fas fa-exclamation"></i>
                                revise</span>
                            <h5 class="description-header">{{$paper_review['revise']}}</h5>
                            <span class="description-text">REVISE PAPERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            <span class="description-percentage badge badge-danger"><i class="fas fa-times"></i>
                                rejected</span>
                            <h5 class="description-header">{{$paper_review['rejected']}}</h5>
                            <span class="description-text">REJECTED PAPERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">New Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>Name</th>
                                <th>Institution</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($new_users as $new_user)
                            <tr>
                                <td><a
                                        href="{{route('admin.active-users.show', $new_user->id)}}">USER-{{$new_user->id}}</a>
                                </td>
                                <td>{{$new_user->salutation}} {{$new_user->first_name}} {{$new_user->last_name}}</td>
                                <td>{{$new_user->institution}}</td>
                            </tr>
                            @empty
                            <tr>
                                <h1 class="text-center">EMPTY</h1>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{route('admin.active-users.index')}}" class="btn btn-sm btn-primary float-right">View All
                    Users</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Added Papers</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @forelse ($added_papers as $added_paper)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{asset($added_paper->submission->participant->photo)}}" alt="Product Image"
                                class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a href="{{route('admin.active-users.show', $new_user->id)}}" class="product-title">
                                {{$added_paper->submission->participant->salutation}}
                                {{$added_paper->submission->participant->first_name}}
                            </a>
                            <span class="product-description">
                                <x-download-file-name path="{{$added_paper->file}}" />
                            </span>
                        </div>
                    </li>
                    @empty
                    <h1 class="text-center">EMPTY</h1>
                    @endforelse
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="{{route('admin.papers.index')}}" class="uppercase">View All Papers</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<script>
    //-----------------------
  // - MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels: {!! json_encode($chart['label']) !!},
    datasets: [
      {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  }
  )

  //---------------------------
  // - END MONTHLY SALES CHART -
  //---------------------------

</script>
@endpush