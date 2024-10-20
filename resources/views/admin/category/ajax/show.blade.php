@if (!empty($category) && $category->count() > 0)
@foreach ($category as $key=>$row)
<tr>
    <td class="py-3">{{ $key+1 }}</td>
    <td class="py-3">{{ $row->title }}</td>
    <td class="py-3">{{ $row->slug }}</td>
    <td class="py-3">{{ $row->updated_at->format('d-M-Y') }}</td>
    <td class="py-3">
    @if ($row->on_home=='yes')
        <span class="badge bg-success">Home Page</span>
    @else
        <span class="badge bg-secondary">None</span>
    @endif
    </td>
    <td class="py-3">
        @if ($row->status=='enable')
        <span class="status-completed" style="cursor: pointer" id="status" cat_id="{{ $row->id }}">Enable</span>
        @else
        <span class="status-cancelled" style="cursor: pointer" id="status" cat_id="{{ $row->id }}">Disable</span>
        @endif

    </td>
    <td class="py-3">
        <a href="" class="d-inline-block" id="edit" cat_id="{{ $row->id }}" title="{{ $row->title }}" on_home="{{ $row->on_home }}" data-bs-toggle="modal" data-bs-target="#editModal">
            <span class="p-2 brand-color me-3">
                <i class="fa-regular fa-pen-to-square"></i>
            </span>
        </a>
        <a href="" class="d-inline-block" id="delete" cat_id="{{ $row->id }}">
            <span class="p-2 red-color">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </a>
    </td>
</tr>
@endforeach
@endif

