<div class="modal fade" id="@yield('modal-id')" tabindex="-1" role="dialog" aria-labelledby="@yield('modal-id')-label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
				<h4 class="modal-title" id="@yield('modal-id')-label">
					@yield('modal-heading')
				</h4>
			</div>
			@section('modal-body-and-footer')
				<div class="modal-body">
					@yield('modal-body')
				</div>
				<div class="modal-footer">
					@yield('modal-footer')
				</div>
			@show
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->