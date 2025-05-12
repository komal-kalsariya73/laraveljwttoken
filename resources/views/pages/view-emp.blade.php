@extends('layouts.master')
@section('content')


<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">All Staff</h3>
        <h6 class="op-7 mb-2">Staff-table-information</h6>
      </div>
      <div class="ms-md-auto py-2 py-md-0">

        <a href="" class="btn text-uppercase btn-round" style="background:#07193e;color:white">Add Staff</a>
      </div>
    </div>



    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Staff Details</div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="">Image</th>
                    <th scope="">First name</th>
                    <th scope="">Email</th>
                    <th scope="">Address</th>
                    <th scope="">Phone</th>

                    <th scope="">Action</th>


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
  $(document).ready(function () {
    fetchEmployees();

    function fetchEmployees() {
      let token = localStorage.getItem('auth_token');  // ✅ Get token

      $.ajax({
        url: '/api/employees/all', // Your API URL
        method: 'GET',
        headers: {
          'Authorization': "Bearer " + token  // ✅ Pass Bearer Token
        },
        success: function (response) {
          var tbody = '';
          $.each(response, function (index, emp) {
            tbody += `
              <tr>
                <td><img src="/${emp.image}" width="50" height="50" style="border-radius:50%"></td>
                <td>${emp.fname}</td>
                <td>${emp.email}</td>
                <td>${emp.address}</td>
                <td>${emp.phone ?? '-'}</td>
                <td>
      <a href="/employee/edit/${emp.id}" class="btn btn-sm btn-primary">Edit</a>
      <button class="btn btn-sm btn-danger" onclick="deleteEmployee(${emp.id})">Delete</button>
    </td>
              </tr>`;
          });
          $('#myTable tbody').html(tbody);
        },
        error: function (xhr) {
          alert('Failed to fetch employees');
        }
      });
    }
  });
</script>

@endsection