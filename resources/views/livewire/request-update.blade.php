<main class="main-content">
    <div class="container-fluid py-4">
        {{-- Tables --}}
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css" rel="stylesheet">

        
        <link type="text/css" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css" rel="stylesheet" />

        <link type="text/css" href=" https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css" rel="stylesheet" />

        <style>
        div#dtRequestUpdate_length {
            font-size: 12px;;
        }
        .buttons-excel {
            display:none;
        }

        /* div#dtRequestUpdate_length tfoot {
            font-size: 12px;;
        } */

        div#dtRequestUpdate_length thead {
            font-size: 12px;;
        }

        .hide {
            display:none !important;
        }
        /* .dtRequestUpdate_wrapper row {
            margin-left:15px !important;
            margin-right: 15px !important;
        } */

        .width-30 {
            /* width:30px !important; */
        }
        tfoot .searchbar_col_0, .searchbar_col_29 {
            display:none;
        }
        tfoot .searchbar_col_2 {
            width: 100px;
        }
        tfoot .searchbar_col_27 {
            width: 50px;
        }
        tfoot .searchbar_col_28 {
            width: 100px;
        }

        tfoot .searchbar_col_5  {
            width: 100px;
        }

        tfoot {
            display: table-row-group;
        }

        th, td { white-space: nowrap; } 

        .dtfc-fixed-right {
            background-color: white !important;
            border-radius: 5px 5px;
            box-shadow: 11px 18px 20px 1px;
            text-align: center;
        }

        .dtfc-fixed-left {
            background-color: white !important;
        }


        </style>
        
        @include('components.request-update.table')
        @include('components.request-update.modal')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>


        <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>



        @include('scripts.request-update.datatable')
        @include('scripts.request-update.import')
    </div>
</main>
