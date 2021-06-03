<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Payroll">
  <title>Payroll</title>

  <style>
      @page {
        margin:20;
        padding:20;
      }
      body {
        font-family: 'Helvetica';
      }
      .texthead {
        text-align: center;
      }
      .borderline {
        background-color: #E9E9E9;
        padding: 10px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        width: 100%;
      }
      .text-left {
        text-align: left;
        display: inline !important;
      }
      .text-right {
        float: right;
        display: inline !important;
      }
      .underline {
        text-decoration: underline;
      }
      .pdetail-3 {
        width: 100%;
        display: inline-block;
        font-size: 13px;
      }
      .pdetail-2 {
        width: 100%;
        display: inline-block;
      }
      .float-left {
        float: left;
      }
      .float-right {
        float: right;
      }
      .details {
        max-width: 100%;
        overflow: auto;
        float: left;
        font-size: 14px;
      }

      .details-table {
        border: 0;
        border-collapse: collapse;
      }

      .statement-table {
        border: 1px solid #ccc;
        width: 100%;
      }
      .statement-table th, td {
        padding: 10px;
        text-align: left;
      }
      .statement-table th, td {
        border-bottom: 1px solid #ddd;
      }
      .statement-table th {
        background-color: #E9E9E9;
      }

      .detail-table {
          font-size: 12px;
          padding: 0;
          margin: 0;
      }

      table.detail-table td {
          padding: 5px 0 5px 2px;
      }

      table.total-table th,td,tr{
        border: 0px;
      }

      .firstpage {
        page-break-after: always;
      }
  </style>

</head>

<body>
  <!-- Content -->
    <div class="container firstpage">
        <img src="images/logo.png" style="float:left;width:200px"><br/>
        <div class="texthead">
            <h2>Payroll Statement</h2>
        </div>
        <div class="borderline">
            <span class="text-left">SALES REP: {{ @$salesrep['firstname'] }} {{ @$salesrep['lastname'] }}</span>
            <span class="text-right">{{ @$date_period }}</span>
        </div>
        <table class="detail-table font12" style="border: 0; padding: 0">
            <tr style="border: 0">
                <td style="border: 0; vertical-align: top">
                    <table style="border: 0; padding: 0">
                        <tr style="border: 0;">
                            <td style="border: 0"><span class="underline">Produced on:</span></td>
                            <td style="border: 0">{{ date('d/m/Y', strtotime($created_at)) }}</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">&nbsp;</td>
                            <td style="border: 0">{{ @$salesrep['firstname'] }} {{ @$salesrep['lastname'] }}</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">&nbsp;</td>
                            <td style="border: 0">3G/39 Mackelvie Street, Grey Lynn,</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">&nbsp;</td>
                            <td style="border: 0">Auckland, 1021, New Zealand</td>
                        </tr>
                    </table>
                </td>
                <td style="border: 0">
                    <table style="border: 0; padding: 0">
                        <tr style="border: 0;">
                            <td style="border: 0"><span class="underline">Produced by:</span></td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0">Onlineinsure Limited</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">3G/39 Mackelvie Street, Grey Lynn,</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">Auckland, 1021, New Zealand</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">+0508 123 467</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0">https://damp-fjord-74030.herokuapp.com/</td>
                        </tr>
                    </table>
                </td>
                <td style="border: 0; vertical-align: top">
                    <table style="border: 0; padding: 0">
                        <tr style="border: 0;">
                            <td style="border: 0"><span class="underline">Statement Week:</span></td>
                            <td style="border: 0">{{ date('Y', strtotime($start_period)) }}{{ date('W', strtotime($start_period)) }}</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0"><span class="underline">Statement Date:</span></td>
                            <td style="border: 0">{{ date('m/d/Y', strtotime($end_period)) }}</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0"><span class="underline">Payment Type:</span></td>
                            <td style="border: 0">Direct Credit</td>
                        </tr>
                        <tr style="border: 0">
                            <td style="border: 0"><span class="underline">IRD:</span></td>
                            <td style="border: 0">{{ $id }}12{{ date('Y', strtotime($start_period)) }}</td>
                        </tr>
                    </table>
                </td>
            <tr>
        </table>

        <div class="details">
            <p>Detailed Invoice</p>
            <table class="statement-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($created_at)) }}</td>
                        <td>Commission</td>
                        <td>&nbsp;</td>
                        <td>${{ number_format($commission, 2) }}</td>
                    </tr>
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($created_at)) }}</td>
                        <td>Bonuses</td>
                        <td>&nbsp;</td>
                        <td>${{ number_format($salesrep['bonuses'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="total-table" style="float: right">
                <tr>
                    <td style="width:160px">Total</td>
                    <td>Nett</td>
                    <td style="width:160px">${{ number_format($nett, 2) }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Witholding Tax</td>
                    <td>${{ number_format($tax, 2) }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Payment Amount</td>
                    <td>${{ number_format($total_payment, 2) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
        <img src="images/logo.png" style="float:left;width:200px"><br/>
        <div class="texthead">
            <h2>Payroll Statement</h2>
        </div>
        <div class="borderline">
            <span class="text-left">SALES REP: {{ @$salesrep['firstname'] }} {{ @$salesrep['lastname'] }}</span>
            <span style="position:absolute; margin-left: 250px;">{{ @$date_period }}</span>
        </div>


        <div class="details">
            <p>Client Details</p>
            <table class="statement-table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client['firstname'] }}</td>
                        <td>{{ $client['lastname'] }}</td>
                        <td>{{ $client['email'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
