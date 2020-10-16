<!-- Modal -->
<div class="modal fade" id="exampleEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			{!! Form::model($item, [
				'action' => ['CustomerController@update', $item->id],
				'method' => 'put', 
			]) !!}
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Customers</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					@include('admin.customers.form')
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
