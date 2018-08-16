


<div class="container">
    <div class="row">
    <form method="post" action="{{url('/district/create')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">District Name</label>
            <input type="text" class="form-control" name="title"/>
        </div>
        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" class="form-control" name="region">
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
