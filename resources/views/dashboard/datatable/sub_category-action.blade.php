<a style="padding-bottom: 2px" href="{{ url('dashboard/sub_categories/'.$id.'/edit') }}" data-toggle="tooltip" data-original-title="Edit" title="EDIT" class="btn btn-warning btn-xs">
	<i class="fa fa-pencil text-inverse m-r-10"> EDIT</i> 
</a>

<form action="{{ url('dashboard/sub_categories/delete/'.$id) }}" method="POST">
    @csrf
    {{ method_field('delete')}}
    <button type="submit" toggle="tooltip" title="DELETED" class="btn btn-danger btn-xs" data-original-title="Delete">
        <i class="fa fa-trash-o"> DELETED</i>
    </button>
    
</form>