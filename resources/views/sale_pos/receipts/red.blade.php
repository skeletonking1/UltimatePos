<!-- business information here -->

<div style="display:flex;justify-content:space-evenly;">
    <div style="text-align:right">
        <h3>مؤسسة عالم سالم البشري</h3>
        <h4>للأثاث المكتبي</h4>
        <h5>س.ت 5668455855</h5>
    </div>
    <div class="flex__item">
    	<!-- Logo -->
        @if(!empty($receipt_details->logo))
            <img style="max-height: 100px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
        @endif
    </div>
    <div style="text-align:left">
        <h3>Amer Salem Albeshri Est.</h3>
        <h4>For Office Furniture</h4>
        <h5>C.R 5668455855</h5>
    </div>
</div>

<div style="display:flex;justify-content:space-between">
	
	<div> {{$receipt_details->date_label}} : {{$receipt_details->invoice_date}}</div>
	@if(!empty($receipt_details->invoice_no_prefix))
		<div>{!! $receipt_details->invoice_no_prefix !!} : {{$receipt_details->invoice_no}}</div>
    @endif
</div>


<div style="display:flex;justify-content:space-between;padding: 10px 0">
	
	<div>اسم الموظف : {{auth()->user()->username}}</div>
	<div>رقم الاقامة : .....................................................</div>

</div>

<div style="display:flex;justify-content:space-between;padding: 10px 0">
	
	<div>رقم الجوال : .....................................................</div>
	<div>رقم اللوحة : .....................................................</div>

</div>

<div style="display:flex;justify-content:space-between;padding: 10px 0">
	
	<div>اسم العميل المرسل : ...............................................</div>
	<div>اسم العميل المرسل اليه : ..........................................</div>

</div>











<div class="row">
	<div class="col-xs-12">
		<br/>
		@php
			$p_width = 40;
		@endphp
		@if(!empty($receipt_details->item_discount_label))
			@php
				$p_width -= 15;
			@endphp
		@endif
		<table class="table table-responsive table-slim">
			<thead>
				<tr>
					<th width="{{$p_width}}%" style="border:solid 2px;text-align:center;border-radius:15px">{{$receipt_details->table_product_label}}</th>
                    <th style="border:solid 2px;text-align:center;border-radius:15px">رقم الصنف</th>
					<th class="text-right" width="15%" style="border:solid 2px;text-align:center;border-radius:15px">{{$receipt_details->table_qty_label}}</th>
					<th class="text-right" width="15%" style="border:solid 2px;text-align:center;border-radius:15px">{{$receipt_details->table_unit_price_label}}</th>
					@if(!empty($receipt_details->item_discount_label))
						<th class="text-right" style="border:solid 2px;text-align:center;border-radius:15px" width="15%">{{$receipt_details->item_discount_label}}</th>
					@endif
                    
					<th class="text-right" style="border:solid 2px;text-align:center;border-radius:15px" width="15%">{{$receipt_details->table_subtotal_label}}</th>
				</tr>
			</thead>
			<tbody>
				@forelse($receipt_details->lines as $line)
					<tr>
						<td style="border:solid 2px;text-align:center;border-radius:15px">
							@if(!empty($line['image']))
								<img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
							@endif
                            {{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
                             @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
                            @if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
                            @if(!empty($line['sell_line_note']))
                            <br>
                            <small>
                            	{{$line['sell_line_note']}}
                            </small>
                            @endif 
                            @if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
                            @if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif

                            @if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
                            @if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
                        </td>
                        <td  style="border:solid 2px;text-align:center;border-radius:15px">@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif</td>
						<td class="text-right"  style="border:solid 2px;text-align:center;border-radius:15px">{{$line['quantity']}} {{$line['units']}} </td>
						<td class="text-right" style="border:solid 2px;text-align:center;border-radius:15px">{{$line['unit_price_before_discount']}}</td>
						@if(!empty($receipt_details->item_discount_label))
							<td class="text-right" style="border:solid 2px;text-align:center;border-radius:15px">
								{{$line['line_discount'] ?? '0.00'}}
							</td>
						@endif
                        
						<td class="text-right" style="border:solid 2px;text-align:center;border-radius:15px">
                        {{$line['line_total']}}
                        </td>
					</tr>
					@if(!empty($line['modifiers']))
						@foreach($line['modifiers'] as $modifier)
							<tr>
								<td>
		                            {{$modifier['name']}} {{$modifier['variation']}} 
		                            @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
		                            @if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
		                        </td>
								<td class="text-right">{{$modifier['quantity']}} {{$modifier['units']}} </td>
								<td class="text-right">{{$modifier['unit_price_inc_tax']}}</td>
								@if(!empty($receipt_details->item_discount_label))
									<td class="text-right">0.00</td>
								@endif
								<td class="text-right">{{$modifier['line_total']}}</td>
							</tr>
						@endforeach
					@endif
				@empty
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12"><hr/></div>
	<div class="col-xs-6">

		<table class="table table-slim">

			@if(!empty($receipt_details->payments))
				@foreach($receipt_details->payments as $payment)
					<tr>
						<td>{{$payment['method']}}</td>
						<td class="text-right" >{{$payment['amount']}}</td>
						<td class="text-right">{{$payment['date']}}</td>
					</tr>
				@endforeach
			@endif

			<!-- Total Paid-->
			@if(!empty($receipt_details->total_paid))
				<tr>
					<th>
						{!! $receipt_details->total_paid_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->total_paid}}
					</td>
				</tr>
			@endif

			<!-- Total Due-->
			@if(!empty($receipt_details->total_due))
			<tr>
				<th>
					{!! $receipt_details->total_due_label !!}
				</th>
				<td class="text-right">
					{{$receipt_details->total_due}}
				</td>
			</tr>
			@endif

			@if(!empty($receipt_details->all_due))
			<tr>
				<th>
					{!! $receipt_details->all_bal_label !!}
				</th>
				<td class="text-right">
					{{$receipt_details->all_due}}
				</td>
			</tr>
			@endif
		</table>
	</div>

	<div class="col-xs-6">
        <div class="table-responsive">
          	<table class="table table-slim">
				<tbody>
					@if(!empty($receipt_details->total_quantity_label))
						<tr class="color-555">
							<th style="width:70%">
								{!! $receipt_details->total_quantity_label !!}
							</th>
							<td class="text-right">
								{{$receipt_details->total_quantity}}
							</td>
						</tr>
					@endif
					<tr>
						<th style="width:70%">
							{!! $receipt_details->subtotal_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->subtotal}}
						</td>
					</tr>
					@if(!empty($receipt_details->total_exempt_uf))
					<tr>
						<th style="width:70%">
							@lang('lang_v1.exempt')
						</th>
						<td class="text-right">
							{{$receipt_details->total_exempt}}
						</td>
					</tr>
					@endif
					<!-- Shipping Charges -->
					@if(!empty($receipt_details->shipping_charges))
						<tr>
							<th style="width:70%">
								{!! $receipt_details->shipping_charges_label !!}
							</th>
							<td class="text-right">
								{{$receipt_details->shipping_charges}}
							</td>
						</tr>
					@endif

					@if(!empty($receipt_details->packing_charge))
						<tr>
							<th style="width:70%">
								{!! $receipt_details->packing_charge_label !!}
							</th>
							<td class="text-right">
								{{$receipt_details->packing_charge}}
							</td>
						</tr>
					@endif

					<!-- Discount -->
					@if( !empty($receipt_details->discount) )
						<tr>
							<th>
								{!! $receipt_details->discount_label !!}
							</th>

							<td class="text-right">
								(-) {{$receipt_details->discount}}
							</td>
						</tr>
					@endif

					@if( !empty($receipt_details->total_line_discount) )
						<tr>
							<th>
								{!! $receipt_details->line_discount_label !!}
							</th>

							<td class="text-right">
								(-) {{$receipt_details->total_line_discount}}
							</td>
						</tr>
					@endif

					@if( !empty($receipt_details->reward_point_label) )
						<tr>
							<th>
								{!! $receipt_details->reward_point_label !!}
							</th>

							<td class="text-right">
								(-) {{$receipt_details->reward_point_amount}}
							</td>
						</tr>
					@endif

					<!-- Tax -->
					@if( !empty($receipt_details->tax) )
						<tr>
							<th>
								{!! $receipt_details->tax_label !!}
							</th>
							<td class="text-right">
								(+) {{$receipt_details->tax}}
							</td>
						</tr>
					@endif

					@if( $receipt_details->round_off_amount > 0)
						<tr>
							<th>
								{!! $receipt_details->round_off_label !!}
							</th>
							<td class="text-right">
								{{$receipt_details->round_off}}
							</td>
						</tr>
					@endif

					<!-- Total -->
					<tr>
						<th>
							{!! $receipt_details->total_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->total}}
							@if(!empty($receipt_details->total_in_words))
								<br>
								<small>({{$receipt_details->total_in_words}})</small>
							@endif
						</td>
					</tr>
				</tbody>
        	</table>
        </div>
    </div>
    <div class="col-xs-12">
    	<p>{!! nl2br($receipt_details->additional_notes) !!}</p>
    </div>
</div>


<div style="display:flex;justify-content:space-between">
	<div style="text-align:center">
		<div>أمين المستودع</div>
		<div> الاسم : ..................................... </div>
		<div> التوقيع : .................................. </div>
	</div>
	<div style="text-align:center">
		<div>توقيع السائق بما يفيد الاستلام</div>
		<div> الاسم : ...................................... </div>
		<div> التوقيع : ...................................... </div>
	</div>
</div>

<div style="text-align:center">استلمت الكميات الموضحة بعاليه الي عهدتي</div>
<div>
		<div>أمين المستودع المستلم</div>
		<div style="display:flex;justify-content:space-between">
			<div> الاسم : ..................................... </div>
			<div> التوقيع : .................................. </div>
		</div>


</div>

<div class="row" style="padding-top:15px">
	@if(!empty($receipt_details->footer_text))
	<div class="@if($receipt_details->show_barcode || $receipt_details->show_qr_code) col-xs-8 @else col-xs-12 @endif">
		{!! $receipt_details->footer_text !!}
			@if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_details))
				@php
					$qr_code_text = implode(', ', $receipt_details->qr_code_details);
				@endphp
					<img class="center-block mt-5" src="data:image/png;base64,{{DNS2D::getBarcodePNG($qr_code_text, 'QRCODE', 3, 3, [39, 48, 54])}}">
				@endif
	</div>
	@endif
	@if($receipt_details->show_barcode || $receipt_details->show_qr_code)
		<div class="@if(!empty($receipt_details->footer_text)) col-xs-4 @else col-xs-12 @endif text-center">
			@if($receipt_details->show_barcode)
				{{-- Barcode --}}
				<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
					
			
			@endif
			
			
		</div>
	@endif
</div>
