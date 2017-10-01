<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <style>
        .alert.parsley {
            margin-top: 5px;
            margin-bottom: 0px;
            padding: 10px 15px 10px 15px;
        }
        .check .alert {
            margin-top: 20px;
        }
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }
        .credit-card-box .display-tr {
            display: table-row;
        }
    </style>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body id="app-layout">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary text-center">
          <strong>Laravel 5 With Stripe Subscription Demo</strong>
        </h1>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table" >
            <div class="row display-tr" >
                <h3 class="panel-title display-td" >Payment Details Form</h3>
                <div class="display-td" >                            
                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                </div>
            </div>                    
        </div>
        <div class="panel-body">
            <div class="col-md-12">
              <form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('order-post') }}" id="payment-form">
                  {{ csrf_field() }}
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="form-group" id="product-group">
                    <label for="plane">Select Plan:</label>
                    <select name="plane" class="form-control" data-parsley-class-handler="#product-group" required="">
                        <option value="1" selected="selected">Test ($10)</option>
                        <option value="test2">Test2 ($20)</option>
                        <option value="movie">Movie ($15)</option>
                    </select>
                </div>
                <div class="form-group" id="cc-group">
                    <label>Credit card number:</label>
                    <input type="text" class="form-control" data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-trigger="change focusout" data-parsley-class-handler="#ccv-group" required="">
                </div>
                <div class="form-group" id="ccv-group">
                    <label>CVC (3 or 4 digit number)</label>
                    <input type="text" class="form-control" data-stripe="cvc" data-parsley-type="number" maxlength="4" data-parsley-trigger="change focusout" data-parsley-class-handler="#ccv-group" required="">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" id="exp-m-group">
                        <label>Ex. Month</label>
                        <select name="month" class="form-control" data-stripe="exp-month" required>
                            <option value="1" selected="selected">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="exp-y-group">
                        <label>Ex. Year</label>
                        <select name="year" class="form-control" data-stripe="exp-year" required>
                            <option value="2017" selected="selected">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                      <input type="submit" value="Place order" class="btn btn-lg btn-block btn-primary btn-order" id="submitBtn" style="marin-bottom: 10px">
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                    </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
    
  </div>
</div>
    
    <!-- PARSLEY -->
    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };
    </script>
    
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey("pk_test_5MTn3q57aRJkOgiz7xqkuVwB");
        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    alert();
                    return false;
                });
                $form.find('#submitBtn').prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
                return false;
            });
        });
        function stripeResponseHandler(status, response) {
            var $form = $('#payment-form');
            if (response.error) {
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').addClass('alert alert-danger');
                $form.find('#submitBtn').prop('disabled', false);
                $('#submitBtn').button('reset');
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                $form.get(0).submit();
            }
        };
    </script>
</body>
</html>