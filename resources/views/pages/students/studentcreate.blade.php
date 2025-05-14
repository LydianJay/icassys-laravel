<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="" />

        <form action="{{ route('student_create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- STUDENT SECTION --}}
                <h5 class="mb-3">Student Information</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Admission No.</label>
                        <input type="text" name="admission_no" class="form-control" value="{{ old('admission_no') ? old('admission_no') : strtoupper(substr(hash('sha256', rand(1000, 9999) . now()->timestamp . Str::random(5)), 0, 6)) }}">
                        @error('admission_no')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

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
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            @foreach (['pre-school', 'elementary', 'junior-high', 'senior-high', 'college'] as $cat)
                                <option value="{{ $cat }}">{{ ucwords(str_replace('-', ' ', $cat)) }}</option>
                            @endforeach
                        </select>
                        @error('category')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Level (Grade/Year)</label>
                        <input type="number" name="lvl" class="form-control" value="{{ old('lvl', 1) }}">
                        @error('lvl')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Semester</label>
                        <select name="sem" class="form-select">
                            @foreach (['none', '1st', '2nd', 'summer'] as $sem)
                                <option value="{{ $sem }}">{{ ucfirst($sem) }}</option>
                            @endforeach
                        </select>
                        @error('sem')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-2">
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

                {{-- GUARDIAN SECTION --}}
                <hr class="my-4">
                <h5 class="mb-3">Guardian Information</h5>

                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Guardian Name</label>
                        <input type="text" name="guardian_name" class="form-control" value="{{ old('guardian_name') }}">
                        @error('guardian_name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Relation</label>
                        <select name="relation" class="form-select">
                            @foreach (['parent', 'relative', 'guardian'] as $relation)
                                <option value="{{ $relation }}" {{ old('relation') == $relation ? 'selected' : '' }}>
                                    {{ ucfirst($relation) }}
                                </option>
                            @endforeach
                        </select>
                        @error('relation')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Contact No.</label>
                        <input type="text" name="g_contactno" class="form-control" value="{{ old('g_contactno') }}">
                        @error('g_contactno')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label class="form-label">Guardian Address</label>
                        <input type="text" name="guardian_address" class="form-control"
                            value="{{ old('guardian_address') }}">
                        @error('guardian_address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col">
                        <label class="form-label">Occupation</label>
                        <input type="text" name="occupation" class="form-control" value="{{ old('occupation') }}">
                        @error('occupation')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <h5 class="my-3">Upload Student Photo</h5>
                <div class="input-group mb-3">
                    <input type="file" name="file" class="form-control">
                </div>
                @error('file')<small class="text-danger">{{ $message }}</small>@enderror

                <button class="btn btn-success mt-2" type="submit">
                    <i class="fa fa-plus-circle me-1"></i> Add Student
                </button>
            </div>
        </form>
    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>