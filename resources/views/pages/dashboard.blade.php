
@extends('layouts.master')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
     #calendar {
    max-width: 100%;
    margin: 0 auto;
    /* FIX: force min height */
    min-height: 500px;
  }
  
</style>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Admin Dashboard</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a> -->
            </div>
        </div>
      
            <div class="row row-card-no-pd">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Staff</b></h6>
                                    <p class="text-muted">All Staff Value</p>
                                </div>
                                <h4 class="text-info fw-bold"></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-info w-75"
                                    role="progressbar"
                                    aria-valuenow="75"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">75%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Customer</b></h6>
                                    <p class="text-muted">All Customer Value</p>
                                </div>
                                <h4 class="text-success fw-bold"></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-success w-25"
                                    role="progressbar"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">25%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Project</b></h6>
                                    <p class="text-muted">All Project Amount</p>
                                </div>
                                <h4 class="text-danger fw-bold"></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-danger w-50"
                                    role="progressbar"
                                    aria-valuenow="50"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">50%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total FollowUp</b></h6>
                                    <p class="text-muted">Joined New FollowUp</p>
                                </div>
                                <h4 class="text-secondary fw-bold"></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-secondary w-25"
                                    role="progressbar"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">25%</p>
                            </div>
                        </div>
                    </div>
                </div>
      
              
            </div>

            <div class="row my-4">
            <div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Overview Chart</div>
    </div>
    <div class="card-body" style="min-height: 500px;">
      <canvas id="dashboardChart"></canvas>
    </div>
  </div>
</div>



  <div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Overview Calendar</div>
    </div>
    <div class="card-body">
      <div id="calendar"></div>
    </div>
  </div>
</div>

</div>


     

     
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Latest Customer</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Address</th>
                                            <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Top Project</div>
                                    </div>
                                    <div class="card-body pb-0">
                                         <div class="d-flex">
                      <div class="avatar">
                        <img
                          src="assets/img/logoproduct.svg"
                          alt="..."
                          class="avatar-img rounded-circle"
                        />
                      </div>
                      <div class="flex-1 pt-1 ms-2">
                        <h6 class="fw-bold mb-1">CSS</h6>
                        <small class="text-muted">Cascading Style Sheets</small>
                      </div>
                      <div class="d-flex ms-auto align-items-center">
                        <h4 class="text-info fw-bold">+$17</h4>
                      </div>
                    </div> 







                                    </div>
                                </div>
                            </div> -->
            </div>

     


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Project Details</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0 table-secondary table-striped" id="myTables">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="">Project name</th>

                                        <th scope="">Customer Project</th>
                                        <th scope="">Staff</th>
                                        <th scope="">Start Date</th>
                                        <th scope="">End Date</th>



                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
  const ctx = document.getElementById('dashboardChart').getContext('2d');
const dashboardChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Staff', 'Customer', 'Project', 'FollowUp'],
    datasets: [{
      label: 'Total Count',
      data: [120, 80, 45, 30],
      backgroundColor: [
        'rgba(54, 162, 235, 0.7)', 
        'rgba(75, 192, 192, 0.7)', 
        'rgba(255, 99, 132, 0.7)', 
        'rgba(153, 102, 255, 0.7)' 
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false, // Add this to make chart fit nicely
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});


  
</script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
      {
        title: 'Project Meeting',
        start: '2025-05-10'
      },
      {
        title: 'Follow Up Call',
        start: '2025-05-12'
      },
      {
        title: 'Deadline',
        start: '2025-05-15'
      }
    ]
  });
  calendar.render();
});



</script>



<!-- footetr -->
@endsection