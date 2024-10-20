@if (!empty($child_category) && $child_category->count() > 0)
@foreach ($child_category as $key=>$row)
<tr>
    <td class="py-3">{{ $key+1 }}</td>
    <td class="py-3">{{ $row->title }}</td>
    <td class="py-3">{{ $row->slug }}</td>
    <td class="py-3 text-bold text-primary">{{ $row->sub_category->title }}</td>
    <td class="py-3">{{ $row->updated_at->format('d-M-Y') }}</td>
    <td class="py-3">
        @if ($row->status=='enable')
        <span class="status-completed" style="cursor: pointer" id="status" child_cat_id="{{ $row->id }}">Enable</span>
        @else
        <span class="status-cancelled" style="cursor: pointer" id="status" child_cat_id="{{ $row->id }}">Disable</span>
        @endif

    </td>
    <td class="py-3">
        <a href="" class="d-inline-block" id="edit" child_cat_id="{{ $row->id }}" sub_cat_id="{{ $row->sub_category->id }}" sub_cat_title="{{ $row->sub_category->title }}" title="{{ $row->title }}" data-bs-toggle="modal" data-bs-target="#editModal">
            <span class="p-2 brand-color me-3">
                <i class="fa-regular fa-pen-to-square"></i>
            </span>
        </a>
        <a href="" class="d-inline-block" id="delete" child_cat_id="{{ $row->id }}">
            <span class="p-2 red-color">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </a>
    </td>
</tr>
@endforeach
@endif

