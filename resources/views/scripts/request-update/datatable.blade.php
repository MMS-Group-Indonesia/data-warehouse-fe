

<input type="hidden" id="draw" value="1">
<input type="hidden" id="length" value="10">
<script type="text/javascript">

$(function(){

    let draw = 0;

    var dtRequestUpdate = $('#dtRequestUpdate').DataTable( {
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
            searchPlaceholder: "Search Here"
        },
        ajax: {
            url: '/api/request-update/data',
            data: {
                draw: function() {return $('#draw').val();}
            },
            dataType: "json",
            dataSrc: function (json) {
                //if data is output as a json string then add these lines
                // console.log(json.data);
                
                return json.data;                      
            },
        },
        // length: function() { return $("#length").val()},
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            { 
                extend: 'excel', 
                text: '<i class="fa fa-file-excel-o"></i> Excel', 
                className: 'btn-sm btn-info',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                } 
            },
            // {
            //     extend: 'excel', 
            //     text: '<i class="fa fa-file-excel-o"></i> Excel All', 
            //     className: 'btn-sm btn-info',
            //     exportOptions: {
            //         columns: [0, 1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
            //     },
            //     action: function (e, dt, node, config)
            //     {
            //         var dtButton= this; //we need this as param for action.call()
            //         var currentPageLen = dt.page.len();
            //         var currentPage = dt.page.info().page;
                
            //         dt.one( 'draw', function () {
            //             $.fn.DataTable.ext.buttons.excelHtml5.action.call(dtButton, e, dt, node, config); //trigger export
                
            //             //setTimeout is needed here because action.call is async call
            //             //without setTimeout, pageLength will show all
            //             setTimeout(function() {
            //                 dt.page.len(currentPageLen).draw(); //set page length
            //                 dt.page(currentPage).draw('page'); //set current page
            //             }), 500;
            //         });
                
            //         //draw all before export
            //         dt.page.len(-1).draw();
                    
            //     } 
            // },
            // { 
            //     extend: 'pdf', 
            //     text: '<i class="fa fa-file-pdf-o"></i> PDF', 
            //     className: 'btn-sm btn-warning',
            //     exportOptions: {
            //         columns: [0, 1, 2, 3, 4]
            //     } 
            // },
            // {
            //     extend: 'pdf', 
            //     text: '<i class="fa fa-file-pdf-o"></i> PDF All', 
            //     className: 'btn-sm btn-warning',
            //     exportOptions: {
            //         columns: [0, 1, 2, 3, 4]
            //     },
            //     action: function (e, dt, node, config)
            //     {
            //         var dtButton= this; //we need this as param for action.call()
            //         var currentPageLen = dt.page.len();
            //         var currentPage = dt.page.info().page;
                
            //         dt.one( 'draw', function () {
            //             $.fn.DataTable.ext.buttons.pdfHtml5.action.call(dtButton, e, dt, node, config); //trigger export
                
            //             //setTimeout is needed here because action.call is async call
            //             //without setTimeout, pageLength will show all
            //             setTimeout(function() {
            //                 dt.page.len(currentPageLen).draw(); //set page length
            //                 dt.page(currentPage).draw('page'); //set current page
            //             }), 500;
            //         });
                
            //         //draw all before export
            //         dt.page.len(-1).draw();
            //     } 
            // },
            // { 
            //     extend: 'print', 
            //     text: '<i class="fa fa-print"></i> Print', 
            //     className: 'btn-sm btn-default',
            //     exportOptions: {
            //         columns: [0, 1, 2, 3, 4]
            //     } 
            // },
            // { 
            //     extend: 'print', 
            //     text: '<i class="fa fa-print"></i> Print All', 
            //     className: 'btn-sm btn-default',
            //     exportOptions: {
            //         columns: [0, 1, 2, 3, 4]
            //     },
            //     action: function (e, dt, node, config)
            //     {
            //         var dtButton= this; //we need this as param for action.call()
            //         var currentPageLen = dt.page.len();
            //         var currentPage = dt.page.info().page;
                
            //         dt.one( 'draw', function () {
            //             $.fn.DataTable.ext.buttons.print.action.call(dtButton, e, dt, node, config); //trigger export
                
            //             //setTimeout is needed here because action.call is async call
            //             //without setTimeout, pageLength will show all
            //             setTimeout(function() {
            //                 dt.page.len(currentPageLen).draw(); //set page length
            //                 dt.page(currentPage).draw('page'); //set current page
            //             }), 500;
            //         });
                
            //         //draw all before export
            //         dt.page.len(-1).draw();
            //     } 
            // },
        ],
        order: [],
        responsive: true,
        colReorder: ($(window).width() <= 767) ? false : true,
        keys: true,
        rowReorder: ($(window).width() <= 767) ? false : true,
        select: true,
        lengthMenu: [
            [
                10, 20, 30, 40, 50, 100, -1
            ],
            [
                10, 20, 30, 40, 50, 100, 'All'
            ]
        ],
        columnDefs: [
            // {"data":"id","targets": 0},
            {"data":"request_update_id","targets": 0, 
                render: function(data, type, row, meta) {
                    return meta.row + 1
                }
            },
            {"data":"hrbp","targets": 1},
            {"data":"nik","targets": 2},
            {"data":"fullname","targets": 3},
            {"data":"nationality","targets": 4},
            {"data":"join_date","targets": 5},
            {"data":"group","targets": 6},
            {"data":"employment","targets": 7},
            {"data":"group_of_dedicated_entity","targets": 8},
            {"data":"entity_of_headcount","targets": 9},
            {"data":"chief_in_charge","targets": 10},
            {"data":"business_head","targets": 11},
            {"data":"division","targets": 12},
            {"data":"sub_division","targets": 13},
            {"data":"department","targets": 14},
            {"data":"section","targets": 15},
            {"data":"job_title","targets": 16},
            {"data":"job_position","targets": 17},
            {"data":"superior1","targets": 18},
            {"data":"superior1_nik","targets": 19},
            {"data":"work_location","targets": 20},
            {"data":"work_location_details","targets": 21},
            {"data":"grade","targets": 22},
            {"data":"employee_status","targets": 23},
            {"data":"expired_at","targets": 24},
            {"data":"upload_filename","targets": 25},
            {"data":"uploaded_at","targets": 26},
            {"data":"periode_year","targets": 27},
            {"data":"periode_month","targets": 28},
            // {"data":"expired_at","targets": 24},
            // {"data":"created_at","targets": 25},
            // {"data":"updated_at","targets": 26},
            {
                "targets": 29,
                "searchable": false,
                'orderable': false,
                "render": function ( data, type, row, meta ) {
                    return ''
                }
            }
        ],
        drawCallback: function (settings) { 
            // Here the response
            var api = this.api();
            var json = api.ajax.json();
            let vdraw = parseInt($('#draw').val()) + 1
            $('#draw').val(vdraw);
        },
    } );

    $.fn.dataTable.ext.errMode = 'none';


    $('#buttonRequestUpdateImport').on('click', function() {
        // getPeriodeExists($('#year').val(), $('#month').val());
    })

    $('#formImport').on('submit', function(e) {

        $('#modalRequestUpdate').modal('hide')
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Import it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // proccess submit import
                $('#modalRequestUpdate').modal('hide')
                e.preventDefault(); // avoid to execute the actual submit of the form.

                $('#spinner-div').show();//Load button clicked show spinner

                var formData = new FormData(this);
                var actionUrl = "/api/request-update/import";

                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    // contentType: 'multipart/form-data; boundary=---------------------------974767299852498929531610575;',
                    data: formData, // serializes the form's elements.
                    success: function(data)
                    {
                        if(data.status === 0) {
                            alertError('Error!', data.message);
                            return false
                        }
                        alertSuccess('Success', data.message);
                        $('#modalRequestUpdate').modal('hide')
                        dtRequestUpdate.ajax.reload();
                        $('#formImport').trigger('reset')
                        $('#spinner-div').hide();
                    },
                    failed: function(xhr, textStatus, errorThrown){
                        $('#spinner-div').hide();
                        alert(xhr.message);
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
                )
            }
        })

        return false;
        
    });

    $('#formRemove').on('submit', function(e) {

        $('#modalRemove').modal('hide')
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            // proccess submit remove
            e.preventDefault(); // avoid to execute the actual submit of the form.

            $('#spinner-div').show();//Load button clicked show spinner

            var formData = new FormData(this);
            var actionUrl = "/api/request-update/remove";

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: actionUrl,
                processData: false,
                contentType: false,
                dataType: 'json',
                // contentType: 'multipart/form-data; boundary=---------------------------974767299852498929531610575;',
                data: formData, // serializes the form's elements.
                success: function(data)
                {
                    if(data.status === 0) {
                        alertError('Error!', data.message);
                        return false
                    }
                    alertSuccess('Success', data.message);
                    
                    dtRequestUpdate.ajax.reload();
                    $('#formRemove').trigger('reset')
                    $('#spinner-div').hide();
                },
                failed: function(xhr, textStatus, errorThrown){
                    $('#spinner-div').hide();
                    alert(xhr.message);
                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })

        return false;


    });

    function fileUploadEvent(id, target, target_name) 
    {
        // Get a reference to the file input
        const fileInput = document.getElementById(id)

        // Listen for the change event so we can capture the file
        fileInput.addEventListener('change', (e) => {
            // Get a reference to the file
            const file = e.target.files[0];
            // console.log(file)

            document.getElementById(target_name).value = file['name']

            // Encode the file using the FileReader API
            const reader = new FileReader();
            reader.onloadend = () => {
                // Use a regex to remove data url part
                const base64String = reader.result
                    .replace('data:', '')
                    .replace(/^.+,/, '');

                // console.log(base64String);

                document.getElementById(target).value = base64String
                // Logs wL2dvYWwgbW9yZ...
            };
            reader.readAsDataURL(file);
        });
    }

    fileUploadEvent('file_upload', 'filebase64', 'filename');

    let list_year_periode = [];
    let list_month_periode = [];
    function getPeriodeExists(year, month)
    {
        $.ajax({
            type: "GET",
            url: '{{ route("index-request-update-periode-exist-api") }}',
            contentType: false,
            processData: false,
            dataType: 'json',
            data: [], 
            success: function(data)
            {
                console.log(data.year, data.month)
                
                if(jQuery.inArray(month, data.month) !== -1) {
                    console.log(month, jQuery.inArray(month, data.month));
                    Swal.fire(
                        'Periode exist',
                        'Periode Month : '+month+' is exist on database',
                        'warning'
                    )
                }
                
                if(jQuery.inArray(year, data.year) !== -1) {
                    console.log(year, jQuery.inArray(year, data.year));
                    Swal.fire(
                        'Periode exist',
                        'Periode Year : '+year+' is exist on database',
                        'warning'
                    )
                }
                
            },
            failed: function(xhr, textStatus, errorThrown){
                alertError('Error!', xhr.message);
                return false;
            }
        });
    }

    $('#select-year').on('change', function() {
        getPeriodeExists($('#select-year').val(), null);
    })

    $('#select-month').on('change', function() {
        getPeriodeExists(null, $('#select-month').val());
    })


    function alertConfirm(title = 'Are Yo Sure?', 
        text = "You won't be able to revert this!", 
        icon = 'warning', 
        confirmButtonText = 'Yes, delete it!',
        cancelButtonText = 'No, cancel!',
        ConfirmSwalWithBootstrapButtons = ['Deleted!', 'Your file has been deleted.','success'],
        DismissSwalWithBootstrapButtons = ['Cancelled','Your imaginary file is safe :)','error']
        ) {

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonText: confirmButtonText,
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // swalWithBootstrapButtons.fire(
                //     ConfirmSwalWithBootstrapButtons[0],
                //     ConfirmSwalWithBootstrapButtons[1],
                //     ConfirmSwalWithBootstrapButtons[2]
                // )
                return true;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    DismissSwalWithBootstrapButtons[0],
                    DismissSwalWithBootstrapButtons[1],
                    DismissSwalWithBootstrapButtons[2]
                )
                return false;
            }
        })
    }

    function alertSuccess(title, message){
        Swal.fire(
            title,
            message,
            'success'
        )
    }

    function alertWarning(title, message){
        Swal.fire(
            title,
            message,
            'warning'
        )
    }

    function alertError(title, message){
        Swal.fire(
            title,
            message,
            'error'
        )
    }

});

</script>
