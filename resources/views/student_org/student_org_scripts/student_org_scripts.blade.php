@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#college').change(function(event) {
                var collegeId = this.value;

                $('#program').html('');

                $.ajax({
                    url: "/api/fetch-program",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        college_id: collegeId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#program').html('<option value=""> Select Program </option>');
                        $.each(response.programs, function(index, val) {
                            $('#program').append(
                                '<option value="' + val.id +
                                '"> ' +
                                val.program_name + ' </option>');
                        });
                    }
                })
            });
        });
    </script>


    
@endsection
