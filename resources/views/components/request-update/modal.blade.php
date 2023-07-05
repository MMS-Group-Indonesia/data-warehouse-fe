<!-- Modal -->
<div class="modal fade" id="modalRequestUpdate" data-bs-backdrop="static" data-bs-keyboard="false" style="z-index:100000;" tabindex="" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xxl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Request Update Import</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formImport" method="post" action="/api/request-update/import" >
				<div class="box box-info">
					<div class="box-body">
				        <h3 class="seo-info">Event Import</h3>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Periode </label>
							<div class="row">
								<div class="col-sm-6" style="padding-top:6px;">
									<div wire:ignore>
										<select class="form-control" name="year" id="select-year" required>
											<option value="">Select Year</option>
											@foreach($series_year as $item)
												<option value="{{ $item }}">{{ $item }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-6" style="padding-top:6px;">
									<div wire:ignore>
										<select class="form-control" name="month" id="select-month" required>
											<option value="">Select Month</option>
											@foreach($series_month as $item)
												<option value="{{ $item }}">{{ $item }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
				        </div>
				        <div class="form-group">
				            <label for="" class="col-sm-2 control-label">File Upload </label>
				            <div class="col-sm-6" style="padding-top:6px;">
				                <input type="file" name="filess" id="file_upload" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
				            	<input type="hidden" class="filebase64" name="file" id="filebase64" value="" >
								<input type="hidden" class="name" name="filename" id="filename" value="" >
							</div>
				        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
							<button type="submit" class="btn btn-success pull-left" name="form1" >Submit</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</form>
      </div>
      <div class="modal-footer">
	  	
        
      </div>
    </div>
  </div>
</div>

@push('scripts')

    <script>
        $(document).ready(function () {
            $('#select-year').select2();

			$('#select-month').select2();
        });
    </script>

@endpush