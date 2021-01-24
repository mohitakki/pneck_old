 <select class="form-control" id="tablevalue" onchange="choosevalue()"
<option value="">Select The Table Column</option>
@foreach($columns as $column)
<option value="{{$column}}">{{$column}}</option>
@endforeach
</select>