@if (!empty($page) && $page->count() > 0)
    @foreach ($page as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >{{ $row->page_title }}</td>
        <td >{{ $row->page_slug }}</td>
        <td style="width: 50%">{!! mb_strimwidth($row->page_content,0,200) !!} </td>

        <td>
            @if ($row->status != '' && $row->status=='enable')
            <span class="status-completed" data="{{ $row->id }}" id="pageStatus" style="cursor: pointer">Enable</span>
            @else
            <span class="status-cancelled" data="{{ $row->id }}" id="pageStatus" style="cursor: pointer">Disable</span>
            @endif
        </td>
        <td >
            <a href="" data='{{ $row->id }}' title="{{ $row->page_title }}" content="{{ $row->page_content }}" id="editPage" class="d-inline-block">
                <span class="p-2 brand-color me-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </a>
            <a href="" data='{{ $row->id }}' id="deletePage" class="d-inline-block">
                <span class="p-2 red-color">
                    <i class="fa-regular fa-trash-can"></i>
                </span>
            </a>
        </td>
    </tr>
    @endforeach
@endif
