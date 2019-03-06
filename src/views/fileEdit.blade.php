@extends("ConfigMaker::layout.app")
@section('content')
    {!! multiLoop($data) !!}
@endsection
@section('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click",'.content',function () {
            $(this).css('background-color','lightgreen')
        });

        $(document).on("blur",'.content',function () {
            $(this).css('background-color','')
            let url = "{{route('config-maker.updateConfig')}}";
            let selectorObject = $(this);
            let parent = selectorObject.attr('parent');
            let key = selectorObject.attr('key');
            let value = selectorObject.html();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    parent: parent,
                    key: key,
                    value: value,
                },
            }).done(function (data) {
                console.log(data)

            });
        });
    </script>

@endsection
