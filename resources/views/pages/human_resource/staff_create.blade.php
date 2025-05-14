<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Basic Information" />

        <form action="{{ route('staff_create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Staff ID</label>
                        <input type="number" name="staff_id" class="form-control" value="{{ $staff_id }}">
                        @error('staff_id')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="juan@example.com"
                            value="{{ old('username') }}">
                        @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Contact No.</label>
                        <input type="text" name="contactno" class="form-control" value="{{ old('contactno') }}">
                        @error('contactno')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                        @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="fname" class="form-control" value="{{ old('fname') }}">
                        @error('fname')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="mname" class="form-control" value="{{ old('mname') }}">
                        @error('mname')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                        @error('lname')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Marital Status</label>
                        <select name="marital" class="form-select">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="separated">Separated</option>
                            <option value="widowed">Widowed</option>
                            <option value="not specified">Not specified</option>
                        </select>
                        @error('marital')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select">
                            @foreach ($role as $r)
                                <option value="{{ $r->role_id }}">{{ $r->role_name }}</option>
                            @endforeach
                        </select>
                        @error('role')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Department</label>
                        <select name="dept" class="form-select">
                            @foreach ($dept as $d)
                                <option value="{{ $d->dept_id }}">{{ $d->dept_name }}</option>
                            @endforeach
                        </select>
                        @error('dept')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date of Joining</label>
                        <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
                        @error('join_date')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Emergency Contact Person</label>
                        <input type="text" name="e_contact" class="form-control" value="{{ old('e_contact') }}">
                        @error('e_contact')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Emergency Contact No.</label>
                        <input type="text" name="e_contact_no" class="form-control" value="{{ old('e_contact_no') }}">
                        @error('e_contact_no')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <h5 class="my-3">Upload Photo</h5>
                <div class="input-group mb-3">
                    <input type="file" name="file" class="form-control">
                </div>
                @error('file')<small class="text-danger">{{ $message }}</small>@enderror

                <button class="btn btn-success mt-2" type="submit">
                    <i class="fa fa-plus-circle me-1"></i> Add Staff
                </button>
            </div>
        </form>
    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>