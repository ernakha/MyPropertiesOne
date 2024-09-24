@extends('admin.master')
@section('admin')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                      {{-- hello --}}
                      <div class="card">
                          <div class="card-body">
                              <div class="row alig n-items-start">
                                  <div class="col-8">
                                      <h5 class="card-title mb-9 fw-semibold">Selamat Datang, </h5>
                                      <h4 class="fw-semibold mb-3">{{Auth::user()->name}}</h4>
                                  </div>
                                  <div class="col-4">
                                      <div class="d-flex justify-content-end">
                                          <div
                                              class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                              <i class="ti ti-user fs-6"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                        <!-- Total Properti -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold"> Total Properti </h5>
                                        <h4 class="fw-semibold mb-3">{{ $properti }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <div
                                                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-building fs-6"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Kota -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold"> Total Kota </h5>
                                        <h4 class="fw-semibold mb-3">{{ $kota }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <div
                                                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-map-pin fs-6"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Grafik Data Properti</h5>
                            </div>
                        </div>
                        <div style="width: 100%; margin: auto;">
                            <canvas id="propertyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        const labels = @json($labels);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Properti',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: @json($data),
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const propertyChart = new Chart(
            document.getElementById('propertyChart'),
            config
        );
    </script>
@endsection
