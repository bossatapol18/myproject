<div class="row">
    <div class="form-group col-lg-6 ">
        <label>{{ 'Name' }}</label>
        <input class="form-control form-control-sm" name="name" type="text" value="{{ isset($staffs->Name) ? $staffs->Name : ''}}" > 
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Age' }}</label>
        <input class="form-control form-control-sm" name="age" type="text" value="{{ isset($staffs->Age) ? $staffs->Age : ''}}" > 
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Salary' }}</label>
        <input class="form-control form-control-sm" name="salary" type="text" value="{{ isset($staffs->Salary) ? $staffs->Salary : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Phone' }}</label>
        <input class="form-control form-control-sm" name="phone" type="text" value="{{ isset($staffs->Phone) ? $staffs->Phone : ''}}" >    
    </div>
    
</div>
