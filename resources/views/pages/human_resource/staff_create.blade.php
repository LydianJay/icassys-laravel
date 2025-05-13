<x-dashboard.basecomponent>

    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Basic Information">

           
        </x-dashboard.cardheader>

        <div class="card-body">
            
            <div class="row">
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Staff ID</label>
                    <input type="number" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Role</label>
                    <select name="" class="form-select">
                        <option value="">Test</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Department</label>
                    <select name="" class="form-select">
                        <option value="">Test</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Date of Joining</label>
                    <input type="date" class="form-control p-1" >
                </div>        
            </div>


            <div class="row my-1">
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">First Name</label>
                    <input type="text" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Middle Name</label>
                    <input type="text" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Last Name</label>
                    <input type="text" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Date of Birth</label>
                    <input type="date" class="form-control p-1">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Address</label>
                    <input type="text" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Gender</label>
                    <select name="" class="form-select ">
                        <option value="">Test</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Emergency Contact Person</label>
                    <input type="text" class="form-control p-1">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label mb-0">Emergency Contact No.</label>
                    <input type="text" class="form-control p-1">
                </div>
                
            </div>
            
        </div>
        <div class="card-footer">

            <h5 class="my-2">Photo</h5>
            <div class="input-group mb-3">
                <input type="file" class="form-control">        
            </div>

        </div>

    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>