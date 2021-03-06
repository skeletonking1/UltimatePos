<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      html {
        width: 1098px;
      }
      body {
        padding: 25px;
      }
      header {
        border-bottom: 4px solid #000;
      }
      .top_header {
        display: flex;
        justify-content: space-between;
      }
      img {
        width: 400px;
      }
      h2 {
        text-align: center;
        color: #747474;
      }
      main {
        padding: 20px 15px;
      }
      .top {
        display: flex;
        justify-content: space-between;
      }
      .top div:first-child {
        flex-basis: 70%;
      }
      table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 30px;
      }
      td {
        padding: 8px;
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        border: 1px solid rgb(209, 208, 208);
        font-weight: bold;
      }
      .sec_table tr td {
        padding: 5px;
        text-align: right;
      }
      .sec_table tr td:first-child {
        width: 40%;
      }
      th {
        padding: 8px;
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #6a6a6a;
        color: white;
        border: 1px solid rgb(209, 208, 208);
      }

      .total_table tr td {
        text-align: right;
      }
      .total_table tr:first-child td {
        border-top: 2px solid black;
      }
      .total_eng {
        text-align: left !important;
      }
      .total_written {
        padding: 6px;
        border-bottom: 2px solid black;
        background-color: #f4f4f4;
      }
      .normal {
        font-weight: normal;
      }
    </style>
  </head>
  <body>
    <header>
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
          <img src="" alt="logo" />
        </div>
      </div>
      <h2>
        ?????????? ?????????? ????????????
        <br />
        Tax Return Notice
      </h2>
    </header>
    <main>
      <div class="top">
        <div>
          <table class="noice_table">
            <tr>
              <td>?????? ??????????????</td>
              <td>3</td>
              <td>3</td>
              <td>Noice Number</td>
            </tr>
            <tr>
              <td>??????????/ ?????? ??????????????</td>
              <td>{{??????????}}</td>
              <td>{{$receipt_details->data_label ?? ' '}}</td>
              <td>Notice Date</td>
            </tr>
          </table>
        </div>
        <div>
          <img src="" alt="QR code" srcset="" />
        </div>
      </div>

      <div>
        <table class="sec_table">
          <tr>
            <td>?????? ????????????</td>
            <td>{{$receipt_details->name ?? ' '}}</td>
          </tr>
          <tr>
            <td>??????????????</td>
            <td>
              {{$receipt_details->show_location_name ?? ' '}} <br />
              {{$receipt_details->show_location_name ?? ' '}}
            </td>
          </tr>
          <tr>
            <td>?????? ?????????? ?????????? ???????????? ??????????????</td>
            <td>{{$receipt_details->tax_label ?? ' '}}</td>
          </tr>
          <tr>
            <td>?????? ????????????</td>
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
              ??????????????( ???????? ?????????? ???????????? ??????????????)
            </th>
            <th>
              Tax Amount <br />
              ???????? ??????????????
            </th>
            <th>
              Tax Rate <br />
              ???????? ??????????????
            </th>
            <th>
              Taxable Amount <br />
              ???????????? ???????????? ??????????????
            </th>
            <th>
              Quantity<br />
              ????????????
            </th>
            <th>
              Unit Price<br />
              ?????? ????????????
            </th>
            <th>
              Nature of goods or services <br />
              ???????????? ?????????? ???? ??????????????
            </th>
            <th>
              Invoice No <br />
              ?????? ????????????????
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
              ???????????????? ???????????? ??????????????(?????? ???????? ?????????? ???????????? ??????????????)
            </td>
            <td class="total_eng normal">
              Total Taxable Amount (excluding VAT)
            </td>
          </tr>
          <tr>
            <td class="normal">{{$receipt_details->total_label ?? ' '}}</td>
            <td class="normal">?????????? ?????????? ???????????? ??????????????</td>
            <td class="total_eng normal">Total VAT</td>
          </tr>
          <tr>
            <td>{{$receipt_details->cn_amount_label ?? ' '}}</td>
            <td>???????????? ???????????? ????????????????</td>
            <td class="total_eng">Total Amount Due</td>
          </tr>
          <tr>
            <td class="total_written" colspan="3">{{$receipt_details->total_label ?? ' '}}</td>
          </tr>
        </table>
      </div>
    </main>
  </body>
</html>
