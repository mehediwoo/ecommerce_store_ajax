
@if (!empty($product) && $product->count() > 0)
    @foreach ($product as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >{{ $row->p_title }}</td>
        <td >{{ $row->p_code }}</td>
        <td >
            <img class="rounded-3" src="{{ asset('storage/'.$row->thumbnail) }}" style="width: 3rem; height: 3rem;">
        </td>
        <td >{{ $footer->default_currency }} {{ number_format($row->p_cost,0,'',',') }}</td>
        <td >{{ $footer->default_currency }} {{ number_format($row->p_discount_price,0,'',',') }}</td>
        <td >{{ $row->p_qty }} {{ $row->p_unit }}</td>

        <td>
            @if ($row->status != '' && $row->status=='enable')
            <span class="status-completed" data="{{ $row->id }}" id="productStatus" style="cursor: pointer">Enable</span>
            @else
            <span class="status-cancelled" data="{{ $row->id }}" id="productStatus" style="cursor: pointer">Disable</span>
            @endif

        </td>
        <td >
            <a href=""
                data='{{ $row->id }}'
                title="{{ $row->p_title }}"
                cat_name="{{ $row->category->title }}"
                cat_id="{{ $row->category->id }}"
                subCat_name="{{ $row->subcategory->title }}"
                subCat_id="{{ $row->subcategory->id }}"
                childCat_name="{{ $row->childcategory->title ?? '' }}"
                childCat_id="{{ $row->childcategory->id ?? '' }}"
                brand_id="{{ $row->brand->id }}"
                brand_name="{{ $row->brand->title }}"
                units="{{ $row->p_unit }}"
                tag="{{ $row->p_meta_tags }}"
                size="{{ $row->p_size }}"
                color="{{ $row->p_color }}"
                qty="{{ $row->p_qty }}"
                alrt_qty="{{ $row->p_alert_qty }}"
                cost="{{ $row->p_cost }}"
                price="{{ $row->p_price }}"
                d_price="{{ $row->p_discount_price }}"
                meta_desc="{{ $row->p_meta_desc }}"
                short_desc="{{ $row->p_short_desc }}"
                desc="{{ $row->p_desc }}"
                thumbnail="{{ $row->thumbnail }}"
                multipleImg="{{ $row->p_image }}"
                p_feature="{{ $row->feature }}"
                hot_deal="{{ $row->hot_deal }}"
                show_on_slider="{{ $row->slide_product }}"
                id="editProduct" class="d-inline-block">
                <span class="p-2 brand-color me-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </a>
            <a href="" data='{{ $row->id }}' id="deleteProduct" class="d-inline-block">
                <span class="p-2 red-color">
                    <i class="fa-regular fa-trash-can"></i>
                </span>
            </a>
            <a href=""
                title="{{ $row->p_title }}"
                cat_name="{{ $row->category->title }}"
                subCat_name="{{ $row->subcategory->title }}"
                childCat_name="{{ $row->childcategory->title ?? '' }}"
                brand_name="{{ $row->brand->title }}"
                units="{{ $row->p_unit }}"
                tag="{{ $row->p_meta_tags }}"
                size="{{ $row->p_size }}"
                color="{{ $row->p_color }}"
                qty="{{ $row->p_qty }}"
                alrt_qty="{{ $row->p_alert_qty }}"
                cost="{{ $row->p_cost }}"
                price="{{ $row->p_price }}"
                d_price="{{ $row->p_discount_price }}"
                short_desc="{{ $row->p_short_desc }}"
                desc="{{ $row->p_desc }}"
                thumbnail="{{ $row->thumbnail }}"
                multipleImg="{{ $row->p_image }}"
                p_feature="{{ $row->feature }}"
                hot_deal="{{ $row->hot_deal }}"
            id="viewProduct" class="d-inline-block">
                <span class="p-3 brand-color me-3">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </a>
        </td>
    </tr>
    @endforeach
@endif
