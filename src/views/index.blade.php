@extends("ConfigMaker::layout.app")
@section('content')
    <ul style="list-style-image: {{$data['folderIcon']}}" id="folderlist">
        @forelse($data['directories'] as $id=>$directory)
            <li class="folderclose"><a href="{{route('config-maker.insideFolder',['folderName'=>$directory,'folderid'=>$id])}}">{{$directory}}</a></li>
        @empty
        @endforelse
        <ul class="filelist">
            @forelse($data['files'] as $filename=>$fileExtention)
                <li class="fileclose"><a href="{{route('config-maker.fileContents',['filename'=>$filename])}}">{{$filename}}</a></li>
            @empty
            @endforelse
        </ul>
    </ul>
@endsection
@section('style')
    <style>
        ul#folderlist,ul.filelist {
            list-style: none;
            padding: 0;
        }
        ul#folderlist > li {
            padding-left: 1.3em;
        }
        .folderclose:before {
            content:"\e117"; /* FontAwesome Unicode */
            font-family: Glyphicons Halflings;
            display: inline-block;
            margin-left: -1.3em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }
        .folderopen:before {
            content:"\e118";
            font-family: Glyphicons Halflings;
            display: inline-block;
            margin-left: -1.3em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }
        .fileclose:before {
            content:"php"; /* FontAwesome Unicode */
            font-family: Glyphicons Halflings;
            display: inline-block;
            margin-left: 1.3em; /* same as padding-left set on li */
            margin-right: .5em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }


    </style>

@endsection
