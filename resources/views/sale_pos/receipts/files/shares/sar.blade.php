<div class="flex__item">
     <!-- Logo -->
        @if(!empty($receipt_details->logo))
            <img style="max-height: 100px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
        @endif
    </div>

      <div class="top_header">
        <div>
          <p>{{$receipt_details->show_business_name ?? ' '}}</p>
          <p>
            {{$receipt_details->show_location_name ?? ' '}} <br />
            {{$receipt_details->show_location_name ?? ' '}}
          </p>
          <p>{{$receipt_details->client_tax_label ?? ' '}}</p>
        </div>
        <div>
        </div>
      </div>
      <h2>
        إشعار مرتجع مبيعات
        <br />
        Tax Return Notice
      </h2>

      <div class="top">
        <div>
          <table class="noice_table">
            <tr>
              <td>رقم الإشعار</td>
              <td>3</td>
              <td>3</td>
              <td>Noice Number</td>
            </tr>
            <tr>
              <td>تاريخ/ وقت الإشعار</td>
              <td>{{$receipt_details->data_label ?? ' '}}</td>
              <td>Notice Date</td>
            </tr>
          </table>
        </div>
        <div>
        </div>
      </div>

      <div>
        <table class="sec_table">
          <tr>
            <td>اسم العميل</td>
            <td>{{$receipt_details->name ?? ' '}}</td>
          </tr>
          <tr>
            <td>العنوان</td>
            <td>
              {{$receipt_details->show_location_name ?? ' '}} <br />
              {{$receipt_details->show_location_name ?? ' '}}
            </td>
          </tr>
          <tr>
            <td>رقم تسجيل ضريبة القيمة المضافة</td>
            <td>{{$receipt_details->tax_label ?? ' '}}</td>
          </tr>
          <tr>
            <td>رقم الهاتف</td>
            <td>{{$receipt_details->show_mobile_name ?? ' '}}</td>
          </tr>
        </table>
      </div>

      <div>
        <table class="third_table">
          <tr>
            <th>
              Item Subtotal (Including VAT)
              <br />
              المجموع( شامل ضريبة القيمة المضافة)
            </th>
            <th>
              Tax Amount <br />
              مبلغ الضريبة
            </th>
            <th>
              Tax Rate <br />
              نسبة الضريبة
            </th>
            <th>
              Taxable Amount <br />
              المبلغ الخاضع للضريبة
            </th>
            <th>
              Quantity<br />
              الكمية
            </th>
            <th>
              Unit Price<br />
              سعر الوحدة
            </th>
            <th>
              Nature of goods or services <br />
              تفاصيل السلع او الخدمات
            </th>
            <th>
              Invoice No <br />
              رقم الفاتورة
            </th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>

      <div>
        <table class="total_table">
          <tr>
            <td class="normal">{{$receipt_details->total_label ?? ' '}}</td>
            <td class="normal">
              الإجمالي الخاضع للضريبة(غير شامل ضريبة القيمة المضافة)
            </td>
            <td class="total_eng normal">
              Total Taxable Amount (excluding VAT)
            </td>
          </tr>
          <tr>
            <td class="normal">{{$receipt_details->total_label ?? ' '}}</td>
            <td class="normal">مجموع ضريبة القيمة المضافة</td>
            <td class="total_eng normal">Total VAT</td>
          </tr>
          <tr>
            <td>{{$receipt_details->cn_amount_label ?? ' '}}</td>
            <td>إجمالي القيمة المستحقة</td>
            <td class="total_eng">Total Amount Due</td>
          </tr>
          <tr>
            <td class="total_written" colspan="3">{{$receipt_details->total_label ?? ' '}}</td>
          </tr>
        </table>
      </div>

    {{$receipt_details->invoice_no}}