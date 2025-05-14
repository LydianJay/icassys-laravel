<x-dashboard.basecomponent>

    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Edit">
        </x-dashboard.cardheader>

        <form action="{{route('staff_create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Staff ID</label>
                        <input type="number" name="staff_id" class="form-control p-1" value="{{$info['id']}}">
                        @error('staff_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Username</label>
                        <input type="text" name="username" class="form-control p-1" value="{{$info['email']}}"
                            placeholder="juan@example.com">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Contact No.</label>
                        <input type="text" name="contactno" class="form-control p-1" value="{{$info['contactno']}}">
                        @error('contactno')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">First Name</label>
                        <input type="text" name="fname" class="form-control p-1" value="{{$info['fname']}}">
                        @error('fname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Middle Name</label>
                        <input type="text" name="mname" class="form-control p-1" value="{{$info['mname']}}">
                        @error('mname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Last Name</label>
                        <input type="text" name="lname" class="form-control p-1" value="{{$info['lname']}}">
                        @error('lname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Marital Status</label>
                        <select name="marital" class="form-select">
                            @foreach (['single', 'married', 'separated', 'widowed', 'not specified'] as $status)
                                <option value="{{ $status }}" {{ $info['marital'] === $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('marital')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Role</label>
                        <select name="role" class="form-select">
                            @foreach ($role as $r)
                                <option value="{{$r->role_id}}" {{ $info['role_id'] == $r->role_id ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Department</label>
                        <select name="dept" class="form-select">
                            @foreach ($dept as $d)
                                <option value="{{$d->dept_id}}" {{ $info['dept_id'] == $d->dept_id ? 'selected' : '' }}>
                                    {{ $d->dept_name }}</option>
                            @endforeach
                        </select>
                        @error('dept')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Date of Birth</label>
                        <input type="date" name="dob" class="form-control p-1" value="{{$info['dob']}}">
                        @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Date of Joining</label>
                        <input type="date" name="join_date" class="form-control p-1" value="{{$info['join_date']}}">
                        @error('join_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Address</label>
                        <input type="text" name="address" class="form-control p-1" value="{{$info['address']}}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Gender</label>
                        <select name="gender" class="form-select">
                            @foreach (['male', 'female', 'other'] as $gender)
                                <option value="{{ $gender }}" {{ $info['gender'] === $gender ? 'selected' : '' }}>
                                    {{ ucfirst($gender) }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Emergency Contact Person</label>
                        <input type="text" name="e_contact" class="form-control p-1" value="{{$info['e_contact']}}">
                        @error('e_contact')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-6 col-lg-3">
                        <label class="form-label mb-0">Emergency Contact No.</label>
                        <input type="text" name="e_contact_no" class="form-control p-1"
                            value="{{$info['e_contact_no']}}">
                        @error('e_contact_no')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <h5 class="my-2">Photo</h5>
                <div class="input-group my-3">
                    <input type="file" name="file" class="form-control">
                    @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <button class="btn btn-success btn-sm" type="submit">Save</button>
                </div>
            </div>
        </form>

    </x-dashboard.cardcomponent>

</x-dashboard.basecomponent>