<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Assessment" />

        <div class="card-body">
            <div class="row g-3">
                <!-- Left Main Info Panel -->
                <div class="col-lg-9">
                    <div class="row g-3">
                        <!-- Student & Course Info Panel -->
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Admission Number</span>
                                <input type="text" class="form-control" disabled
                                    value="<?php echo isset($student['admission_no']) ? $student['admission_no'] : 'N/A'; ?>">
                            </div>

                            <div class="card card-body shadow-sm mt-3 bg-light">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Course</span>
                                    <input type="text" class="form-control" disabled
                                        value="<?php echo isset($class['class']) ? $class['class'] : 'N/A'; ?>">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Section</span>
                                    <input type="text" class="form-control" disabled>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">School Year</span>
                                    <input type="text" class="form-control" disabled
                                        value="<?php //echo date('Y') . ' - ' . (date('Y') + 1); ?>">
                                </div>
                            </div>

                            {{-- <div class="card card-body shadow-sm mt-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Status</span>
                                    <input type="text" class="form-control bg-success text-white" disabled
                                        value="Active">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Payment Type</span>
                                    <input type="text" class="form-control" disabled value="Regular">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Student Type</span>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div> --}}

                            {{-- <div class="card card-body shadow-sm mt-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Next OR # & OR Date</span>
                                    <input type="text" class="form-control" disabled value="OR# 123456 - 03/27/2025">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Assessment Date</span>
                                    <input type="text" class="form-control" disabled value="7/29/2025 11:40:00 AM">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Created By</span>
                                    <input type="text" class="form-control" disabled value="Rey">
                                </div>
                            </div> --}}
                        </div>

                        <!-- Table Panel -->
                        <div class="col-md-8">
                            <div class="row g-2 mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">Student Name</span>
                                        <input type="text" class="form-control" disabled
                                            value="<?php echo isset($student['fname']) ? $student['fname'] . " " . $student['mname'] . " " . $student['lname'] : 'N/A'; ?>">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn-secondary btn btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#search">Browse
                                        Student</button>

                                </div>
                            </div>

                            <div class="card card-body p-0">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Particulars</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($student_fees))
                                            @foreach ($student_fees as $f)
                                                <tr>
                                                    <td>{{ $f->fees_code}}</td>
                                                    <td>{{ $f->fee_type_name }}</td>
                                                    <td>{{ number_format($f->amount, 2) }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('remove_fee_user', array_merge(request()->query(), ['id' => $f->student_fee_id] ) ) }}" class="rounded bg-danger text-white btn btn-sm">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-center">No Fees Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Summary Panel -->
                <div class="col-lg-3">
                    <div class="card card-body mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text w-50 justify-content-end">Total Charges</span>
                            <input type="text" class="form-control bg-info text-white" disabled value="{{ isset($total) ? number_format($total, 2) : '0.00' }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text w-50 justify-content-end">Total Paid</span>
                            <input type="text" class="form-control bg-success text-white" disabled value="0.00">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text w-50 justify-content-end">Total Balance</span>
                            <input type="text" class="form-control bg-danger text-white" disabled value="0.00">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        {{-- <button class="btn btn-secondary">Payment Summary</button> --}}
                        {{-- <button class="btn btn-secondary">Balance Payment</button> --}}
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addAccountsModal">
                            Add Accounts
                        </button>
                        
                        {{-- <button class="btn btn-secondary">Delete Assessment</button> --}}
                        {{-- <button class="btn btn-secondary">Add Credit Balance</button> --}}
                        {{-- <button class="btn btn-secondary">Extra Functions</button> --}}
                        {{-- <button class="btn btn-secondary">SY & Sem Setting</button> --}}
                    </div>

                    <div class="card card-body mt-4">
                        <button class="btn btn-outline-secondary mb-2">Student Ledger</button>
                        <button class="btn btn-outline-secondary mb-2">Assessment Log</button>
                        <button class="btn btn-outline-secondary">Payment Records</button>
                    </div>
                </div>
            </div>
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


    <!-- Add Accounts Modal -->
    <div class="modal fade" id="addAccountsModal" tabindex="-1" aria-labelledby="addAccountsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Accounts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Search Field -->
                    <div class="input-group mb-3">
                        <span class="input-group-text">Search</span>
                        <input type="text" class="form-control" id="accountSearch"
                            placeholder="Enter account name or code...">
                    </div>
    
                    <!-- Accounts Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Account #</th>
                                    <th>Particular</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="accountTable">
                                
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
                        const assessmentRoute = "{{ route('assessment') }}";
                        // Populate rows
                        data.forEach(student => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                    <td>${student.admission_no}</td>
                                    <td>${student.fname + " " + student.mname + " " + student.lname}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary select-student" 
                                            href="${assessmentRoute}?id=${student.id}">Select</a>
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





            const accountTable = document.getElementById('accountTable');
            const accountSearch = document.getElementById('accountSearch');

            function fetchAccounts(query = '') {
                fetch(`{{ route('fees_get') }}?search=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        accountTable.innerHTML = '';

                        if (data.length === 0) {
                            accountTable.innerHTML = `<tr><td colspan="4" class="text-center">No accounts found</td></tr>`;
                            return;
                        }

                        let student_id = {{ isset($student_id) ? $student_id : '0'}};
                        let user_id = {{ isset($user_id) ? $user_id : '0'}};
                        data.forEach(account => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                            <td>${account.fee_type_id}</td>
                            <td>${account.fee_type_name}</td>
                            <td>${parseFloat(account.ammount).toFixed(2)}</td>
                            <td>
                                <a class="btn btn-sm btn-success add-account-btn" 
                                       href="{{ route('add_fee_user') }}?id=${student_id}&fee=${account.fee_type_id}&user_id=${user_id}">
                                    Add
                                </a>
                            </td>
                        `;
                            accountTable.appendChild(row);
                        });

                       
                       
                    })
                    .catch(err => {
                        console.error('Error fetching accounts:', err);
                        accountTable.innerHTML = `<tr><td colspan="4" class="text-danger text-center">Error loading accounts</td></tr>`;
                    });
            }

            // Initial fetch on modal show
            const addAccountsModalEl = document.getElementById('addAccountsModal');
            addAccountsModalEl.addEventListener('show.bs.modal', function () {
                fetchAccounts(); // load accounts when modal opens
            });

            // Search input
            accountSearch.addEventListener('input', function () {
                fetchAccounts(this.value);
            });
        });
    </script>
    
    

</x-dashboard.basecomponent>
  