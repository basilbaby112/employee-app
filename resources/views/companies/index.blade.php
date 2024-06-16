<x-app-layout>
    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-2">Add Company</a>
        <table class="table table-bordered" id="companies-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <div id="companies-pagination"></div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#companies-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('companies.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'logo', name: 'logo', orderable: false, searchable: false},
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                drawCallback: function(settings) {
                    $('#companies-pagination').html(settings.json.pagination);
                }
            });
        });
        </script>
</x-app-layout>
