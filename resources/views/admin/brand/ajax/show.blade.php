@if (!empty($brand) && $brand->count() > 0)
@foreach ($brand as $key=>$row)
<tr>
    <td class="py-3">{{ $key+1 }}</td>
    <td class="py-3">
        <img src="{{ asset('storage/'.$row->logo) }}" alt="">
    </td>
    <td class="py-3">{{ $row->title }}</td>
    <td class="py-3">{{ $row->slug }}</td>
    <td class="py-3">{{ $row->updated_at->format('d-M-Y') }}</td>
    <td class="py-3">
        @if ($row->status=='enable')
        <span class="status-completed" style="cursor: pointer" id="status" brand_id="{{ $row->id }}">Enable</span>
        @else
        <span class="status-cancelled" style="cursor: pointer" id="status" brand_id="{{ $row->id }}">Disable</span>
        @endif

    </td>
    <td class="py-3">
        <a href="" data='{{ $row->id }}' brandLogo="{{ $row->logo }}" title="{{ $row->title }}" id="editBrand" class="d-inline-block">
            <span class="p-2 brand-color me-3">
                <i class="fa-regular fa-pen-to-square"></i>
            </span>
        </a>
        <a href="" class="d-inline-block" id="delete" brand_id="{{ $row->id }}">
            <span class="p-2 red-color">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </a>
    </td>
</tr>
@endforeach
@endif

