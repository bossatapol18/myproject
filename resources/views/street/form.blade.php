
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($street->user_id) ? $street->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
    <label for="street" class="control-label">{{ 'Street' }}</label>
    <input class="form-control" name="street" type="text" id="street" value="{{ isset($street->street) ? $street->street : ''}}" >
    {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="control-label">{{ 'City' }}</label>
    <input class="form-control" name="city" type="text" id="city" value="{{ isset($street->city) ? $street->city : ''}}" >
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input class="form-control" name="state" type="text" id="state" value="{{ isset($street->state) ? $street->state : ''}}" >
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
    <label for="zip_code" class="control-label">{{ 'Zip Code' }}</label>
    <input class="form-control" name="zip_code" type="number" id="zip_code" value="{{ isset($street->zip_code) ? $street->zip_code : ''}}" >
    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
