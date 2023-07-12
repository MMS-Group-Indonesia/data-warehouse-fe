
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Request Update</h5>
                        </div>
                        <div class="pull-right">
                            <a href="#" id="buttonRequestUpdateImport" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#modalRequestUpdate"><i class='fa fa-upload' ></i>&nbsp; Upload</a>
                            <a href="#" class="btn btn-danger btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#modalRemove"><i class='fa fa-trash' ></i>&nbsp; Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="box box-info p-1 table-responsive">
                            <div class="box-body">
                                <table class="table table-striped table-bordered table-responsive align-items-center mb-0" id="dtRequestUpdate" style="width:100%;" >
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-bold text-xxs font-weight-bolder opacity-7">
                                                No
                                            </th>
                                            @foreach($columns as $col)
                                            <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Photo
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                role
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Creation Date
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th> -->
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {!! $col['comment'] !!}
                                            </th>
                                            @endforeach
                                            <th class="text-center text-uppercase text-bold text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
