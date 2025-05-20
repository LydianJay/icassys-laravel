<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Collect Fees">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mt-2">
                <h6 class="mb-0">Fee Collection Panel</h6>
                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#search">
                    <i class="bi bi-search"></i> Browse Student
                </button>
            </div>
    
            <!-- Student Info Panel -->
            <div class="d-flex border rounded shadow-sm p-3 mt-4 bg-light">
                <div class="me-4">
                    <img src="{{ asset('storage/uploads/student/photos/' . $student->photo) }}" alt="Student Photo"
                        width="80" height="80" class="rounded-5">
                </div>
                <div class="flex-grow-1">
                    <table class="table table-sm table-striped mb-0">
                        <tbody>
                            <tr>
                                <th class="border-0">Name</th>
                                <td class="border-0">{{ $student->fname . ' ' . $student->mname . ' ' . $student->lname }}
                                </td>
                                <th class="border-0">Admission No.</th>
                                <td class="border-0">{{ $student->admission_no }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ $student->dob }}</td>
                                <th>Mobile Number</th>
                                <td>{{ $student->contactno }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-dashboard.cardheader>
    
        <!-- Fees Table + Bulk Pay -->
        <div class="card-body">
            <form action="" method="POST">
                @csrf
    
                <div class="d-flex justify-content-between align-items-center my-3">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-money-bill me-1"></i>Pay Selected
                    </button>
                    <h6 class="mb-0">Student Fees</h6>
                    
                </div>
    
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="table-light text-center">
                            <tr>
                                <th></th>
                                <th>Fee</th>
                                <th>Fees Code</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student_fees as $fee)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="fee_ids[]" value="{{ $fee->id }}" class="form-check-input">
                                    </td>
                                    <td class="text-center">{{ $fee->fee_type_name }}</td>
                                    <td class="text-center">{{ $fee->fees_code }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $fee->amount > 0 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $fee->amount > 0 ? 'Unpaid' : 'Paid' }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ number_format($fee->ammount, 2) }}</td>
                                    <td class="text-center">{{ number_format($fee->ammount - $fee->amount, 2) }}</td>
                                    <td class="text-center">{{ number_format($fee->amount, 2) }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary">Pay</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </x-dashboard.cardcomponent>
    
    
    

    <!-- Browse Student Modal -->
    <div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchLabel">Browse Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Search Field -->
                    <div class="input-group mb-3">
                        <span class="input-group-text">Search</span>
                        <input type="text" class="form-control" id="studentSearch" placeholder="Enter name or ID...">
                    </div>
    
                    <!-- Students Table -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    
                                    <th>Full Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="studentTable">
    
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const studentTable = document.getElementById('studentTable');
            const studentSearch = document.getElementById('studentSearch');

            // Function to fetch and populate student table
            function fetchStudents(query = '') {
                fetch(`{{ route('student_search') }}?search=${query}`)
                    .then(response => response.json())
                    .then(data => {

                        console.log(data);

                        studentTable.innerHTML = '';

                        if (data.length === 0) {
                            studentTable.innerHTML = `
                                    <tr><td colspan="4" class="text-center">No students found</td></tr>
                                `;
                            return;
                        }
                        // Populate rows
                        data.forEach(student => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                    <td>${student.admission_no}</td>
                                    <td>${student.fname + " " + student.mname + " " + student.lname}</td>
                                    <td>
                                        <a href="{{ route('collect_fees', ['student_id' => '']) }}${student.student_id}" class="btn btn-sm btn-primary">Collect Fee</a>
                                    </td>
                                `;
                            studentTable.appendChild(row);
                        });


                    })
                    .catch(err => {
                        console.error('Error fetching students:', err);
                        studentTable.innerHTML = `
                                <tr><td colspan="4" class="text-danger text-center">Error loading students</td></tr>
                            `;
                    });
            }



            // Initial fetch
            fetchStudents();

            // Search input handler
            studentSearch.addEventListener('input', function () {
                const query = this.value;
                fetchStudents(query);
            });

        });
    </script>

</x-dashboard.basecomponent>