<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Payroll">
  <title>Payroll</title>

  <style>
      body {
        font-family: 'Helvetica';
      }
      .texthead {
        text-align: center;
      }
      .borderline {
        background-color: #E9E9E9;
        padding: 10px;
        font-size: 11px;
        text-transform: uppercase;
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
  </style>

</head>

<body>
  <!-- Content -->
    <div class="container">
        <div class="texthead">
            <h2>Payroll Statement</h2>
        </div>
        <div class="borderline">
            <span class="text-left">SALES REP: {{ @$salesrep->firstname }} {{ @$salesrep->lastname }}</span>
            <span class="text-right">{{ @$date_period }}</span>
        </div>
        <div class="inline">
            <p class="underline">Produced on:</p>
        </div>
    </div>
</body>
</html>
