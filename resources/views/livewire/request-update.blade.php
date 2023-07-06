<main class="main-content">
    <div class="container-fluid py-4">
        {{-- Tables --}}
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css" />
        
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
    






        @include('scripts.request-update.datatable')
        @include('scripts.request-update.import')
    </div>
</main>
