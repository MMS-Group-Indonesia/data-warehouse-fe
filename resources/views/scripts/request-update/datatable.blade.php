


<script type="text/javascript">

$(function(){

    let draw = 0;

    var dtRequestUpdate = $('#dtRequestUpdate').DataTable( {
        "processing": true,
        "serverSide": true,
        language: {
            searchPlaceholder: "Search Here"
        },
        ajax: {
            url: '/api/request-update/data',
            data: {
            },
            dataType: "json",
            dataSrc: function (json) {
                //if data is output as a json string then add these lines
                // console.log(json.data);
            
                return json.data;                      
            },
        },
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
            {
                extend: 'excel', 
                text: '<i class="fa fa-file-excel-o"></i> Excel All', 
                className: 'btn-sm btn-info',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                },
                action: function (e, dt, node, config)
                {
                    var dtButton= this; //we need this as param for action.call()
                    var currentPageLen = dt.page.len();
                    var currentPage = dt.page.info().page;
                
                    dt.one( 'draw', function () {
                        $.fn.DataTable.ext.buttons.excelHtml5.action.call(dtButton, e, dt, node, config); //trigger export
                
                        //setTimeout is needed here because action.call is async call
                        //without setTimeout, pageLength will show all
                        setTimeout(function() {
                            dt.page.len(currentPageLen).draw(); //set page length
                            dt.page(currentPage).draw('page'); //set current page
                        }), 500;
                    });
                
                    //draw all before export
                    dt.page.len(-1).draw();
                } 
            },
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
        },
    } );

    $.fn.dataTable.ext.errMode = 'none';


    $('#formImport').on('submit', function(e) {

        if (confirm("Ready to Confirm this Action ?") == true) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

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
                        alert(data.message)
                        return false
                    }
                    alert(data.message)
                    $('#modalRequestUpdate').modal('hide')
                    dtRequestUpdate.ajax.reload();
                    
                },
                failed: function(xhr, textStatus, errorThrown){
                    alert(xhr.message);
                }
            });
        }
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

    // open modal add new invoice 
    $('#openModalAddNew').on('click', function () {
        let vendor_code = $(this).attr('data-vendor_code')
        let po_code = $(this).attr('data-po_code')

        $('#modalAdd #vendor_code').val(vendor_code)
        $('#modalAddNew #po_code').val(po_code)

        $('#modalAddNew').modal('show')
        return false;
    });

    // open modal approve invoice 
    $('#dtRequestUpdate').on('click', '#openModalApprove', function() {
        let vendor_code = $(this).attr('data-vendor_code')
        let po_code = $(this).attr('data-po_code')
        let invoice_number = $(this).attr('data-invoice_number')
        let invoice_id = $(this).attr('data-invoice_id')

        $('#modalApprove .vendor_code').attr('value', vendor_code)
        $('#modalApprove .po_code').attr('value', po_code)
        $('#modalApprove .invoice_number').attr('value', invoice_number)
        $('#modalApprove .invoice_id').attr('value', invoice_id)

        $('#modalApprove').modal('show')
        return false;
    });

    // open modal reject invoice 
    $('#dtRequestUpdate').on('click', '#openModalReject', function() {
        let vendor_code = $(this).attr('data-vendor_code')
        let po_code = $(this).attr('data-po_code')
        let invoice_number = $(this).attr('data-invoice_number')
        let invoice_id = $(this).attr('data-invoice_id')

        $('#modalReject .vendor_code').attr('value', vendor_code)
        $('#modalReject .po_code').attr('value', po_code)
        $('#modalReject .invoice_number').attr('value', invoice_number)
        $('#modalReject .invoice_id').attr('value', invoice_id)

        $('#modalReject').modal('show')
        return false;
    });

    $('#dtRequestUpdate').on('click', '#btn-view-attachments', function() {
        let invoice_id = $(this).attr('data-invoice_id')
        let draw = 1;

        $('#modalViewListAttachments').modal('show')

        loadDataTableAttachment(invoice_id, draw)
        
        
    })

    // trigger save on modal add new invoice
    $("#formAddNew").submit(function(e) {

        if (confirm("Ready to Save this Data ?") == true) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var formData = new FormData(this);
            var actionUrl = $(this).attr('action')

            $.ajax({
                type: "POST",
                url: actionUrl,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: formData, // serializes the form's elements.
                success: function(data)
                {
                    if(data.status === 0) {
                        alert(data.message);
                        return false
                    }
                    alert(data.message);
                    $('#modalAddNew').modal('hide')
                    if ( $.fn.dataTable.isDataTable( '#dtRequestUpdate' ) ) {
                        dtRequestUpdate.ajax.reload()
                    }
                },
                failed: function(xhr, textStatus, errorThrown){
                    alert(xhr.message);
                }
            });
        }
        return false;

    })

});

</script>
